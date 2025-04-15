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

                    @forelse ( $items->item as $toy)
                        <p>{{$toy->name}}</p>
                        <p>{{$toy->description}}</p>
                        <p>{{$toy->price}}</p>
                        <p>{{$toy->created_at}}</p>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
