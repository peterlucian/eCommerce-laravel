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
                    <div class="space-y-5 overflow-x-auto w-125">
                    @forelse ( $items->item as $toy)
                        <div class="flex flex-row border-2 border-solid min-w-max space-x-5 p-2 items-center">
                            <p class="text-gray-500 dark:text-gray-400">{{$toy->name}}</p>
                            <p class="text-gray-500 dark:text-gray-400">{{$toy->price}} €</p>
                            <p class="text-gray-500 dark:text-gray-400">{{$toy->created_at}}</p>
                            <a href="{{route('items.edit', [$toy])}}" class="h-7 flex items-center inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Edit</a>
                            <a href="{{route('items.destroy', [$toy])}}" class="h-7  flex items-center inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Delete</a>
                        </div>
                    @empty
                        <div class="flex flex-row border-2 border-solid min-w-max space-x-5 p-2 items-center">
                            <p>You haven't created any!</p></div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
