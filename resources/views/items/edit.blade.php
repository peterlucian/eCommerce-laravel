<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">
                <div class="py-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>


                    @if ($errors->any())
                        <div class="py-6 text-gray-900">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="w-full max-w-lg" action="{{route('items.update', [$item])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Name
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" name="name" value="{{ $item->name }}" placeholder="Enter product name.">
                                {{-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> --}}
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Description
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" name="description" value="{{ $item->description }}" placeholder="Enter product description.">
                                {{-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> --}}
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Price
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" name="price" value="{{ $item->price }}" placeholder="Enter price.">
                                {{-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> --}}
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label for="thumbnail_path"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Upload a new thumbnail, for main listing</label>
                                <input type="file" id="thumbnail_path" class="w-full text-slate-500 font-medium text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-slate-500 rounded" name="thumbnail_path">
                                <p class="text-xs text-slate-500 mt-2">PNG, JPG are Allowed.</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full px-3">
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Select the images u wish to delete and add the new images bellow!</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4 mb-3">
                            <!-- Example thumbnail -->
                            @forelse ($item->imagePath as $image)
                                <label class="cursor-pointer">
                                <input type="checkbox" name="images[]" value="{{$image->id}}" class="peer hidden">
                                <div class="border-2 border-transparent peer-checked:border-blue-500 rounded overflow-hidden">
                                    <img src="{{asset( $image->image_resource_path )}}" alt="Image" class="w-full h-20 object-cover">
                                </div>
                                </label>
                            @empty
                                <p>No images</p>
                            @endforelse
                          </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label for="image_resource_path"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Upload the images, for the description rail</label>
                                <input id="image_resource_path" type="file" class="w-full text-slate-500 font-medium text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-slate-500 rounded" name="image_resource_path[]" multiple>
                                <p class="text-xs text-slate-500 mt-2">PNG, JPG are Allowed.</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" name="add_item"> Update </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
