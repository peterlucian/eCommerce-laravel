<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ImagePath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(  Request $request)
    {
        $filter = $request->get("search_type");
        $search_input = $request->get("search_input");
        $items = match ($filter) {
            "title" => Item::filterByTitle($search_input),
            'author' => Item::filterByAuthor($search_input),
            default => Item::query(),
        };

        return view('items.index', ['items'=> $items->paginate(15)]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Item::findOrFail($id)->delete();
        return redirect()->route('items.index')->with('success','Item deleted succefully!');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'thumbnail_path.*' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Validate multiple images
            'image_resource_path.*' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Validate multiple images
        ]);

        try {


            DB::beginTransaction();

            $path = $request->file('thumbnail_path')->store('thumbnails', 'public');
            $item = Item::create([
                'name' => $data['name'],
                'description'=> $data['description'],
                'price'=> $data['price'],
                'thumbnail_path' => 'storage/' . $path,
                'user_id' => Auth::id(),
            ]);

            if ($request->hasFile('image_resource_path')) {
                foreach ($request->file('image_resource_path') as $image) {
                    $path = $image->store('images', 'public'); // Saves in storage/app/public/products
                    ImagePath::create([
                        'image_resource_path'=> 'storage/' . $path,
                        'item_id'=> $item->id
                        ]);
                }
            }

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }



        return redirect()->route('items.index')->with('success','Item published succefully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$item = Item::with(['imagePath', 'user'])->findOrFail($id);
        return view('items.show', ["item" => Item::with(['imagePath', 'user'])->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd(Item::with(['imagePath', 'user'])->findOrFail($id));
        return view('items.edit', ["item" => Item::with(['imagePath', 'user'])->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'thumbnail_path.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validate multiple images
            'images' => 'array',
            'images.*' => 'integer|exists:image_paths,id'
        ]);

        $item = Item::findOrFail($id);

        // Update base fields
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_path')) {
            // Delete old thumbnail if exists
            if ( $item->thumbnail_path ) {
                $relativePath = Str::after($item->thumbnail_path, 'storage/');
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
            }

            $path = $request->file('thumbnail_path')->store('thumbnails', 'public');
            $item->thumbnail_path = 'storage/' . $path;
        }

        $item->save();

        // Handle carousel images
        $DeleteImageIds = $request->input('images', []); // Default to empty array if not sent

        // Delete images not in the list
        $item->imagePath()->whereIn('id', $DeleteImageIds)->get()->each(function ($image) {
            $relativePath = Str::after($image->image_resource_path, 'storage/');
            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }
            $image->delete();
        });

        if ($request->hasFile('image_resource_path')) {
            foreach ($request->file('image_resource_path') as $image) {
                $path = $image->store('images', 'public');

                $item->imagePath()->create([
                    'image_resource_path'=> 'storage/' . $path,
                ]);
            }
        }

        return redirect()->route('items.index')->with('success','Item updated succefully!');

    }

}
