@extends('layouts.layout')


@section('content')

    <!-- Header -->
    <header class="bg-sky-500/50 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4">
            <!-- Left section: Logo -->
            <a href="index.html" class="flex items-center">
              <div>
                  <img src="/images/template-white-logo.png" alt="Logo" class="h-14 w-auto mr-4">
              </div>
            </a>

            <!-- Hamburger menu (for mobile) -->
            <div class="flex lg:hidden">
                <button id="hamburger" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Center section: Menu -->
            <nav class="hidden lg:flex md:flex-grow justify-center">
              <ul class="flex justify-center space-x-4 text-white">
                  <li><a href="{{route("items.index")}}" class="hover:text-secondary font-semibold">Home</a></li>

                  <!-- Men Dropdown -->
                  {{-- <li class="relative group" x-data="{ open: false }">
                      <a href="shop.html" @mouseover="open = true" @mouseleave="open = false" href="#" class="hover:text-secondary font-semibold flex items-center">
                          Men
                          <i :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                      </a>
                      <ul
                          x-show="open"
                          @mouseover="open = true"
                          @mouseleave="open = false"
                          class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                          x-transition:enter="transition ease-out duration-100"
                          x-transition:enter-start="opacity-0 scale-90"
                          x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-100"
                          x-transition:leave-start="opacity-100 scale-100"
                          x-transition:leave-end="opacity-0 scale-90"
                      >
                          <li><a href="shop.html" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Men Item 1</a></li>
                          <li><a href="shop.html" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Men Item 2</a></li>
                          <li><a href="shop.html" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Men Item 3</a></li>
                      </ul>
                  </li> --}}

                  <!-- Women Dropdown -->
                  {{-- <li class="relative group" x-data="{ open: false }">
                      <a href="shop.html" @mouseover="open = true" @mouseleave="open = false" href="#" class="hover:text-secondary font-semibold flex items-center">
                          Women
                          <i :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                      </a>
                      <ul
                          x-show="open"
                          @mouseover="open = true"
                          @mouseleave="open = false"
                          class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                          x-transition:enter="transition ease-out duration-100"
                          x-transition:enter-start="opacity-0 scale-90"
                          x-transition:enter-end="opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-100"
                          x-transition:leave-start="opacity-100 scale-100"
                          x-transition:leave-end="opacity-0 scale-90"
                      >
                          <li><a href="shop.html" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Women Item 1</a></li>
                          <li><a href="shop.html" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Women Item 2</a></li>
                          <li><a href="shop.html" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Women Item 3</a></li>
                      </ul>
                  </li> --}}

                  <li><a href="{{route('items.index')}}" class="hover:text-secondary font-semibold">Shop</a></li>
                  <li><a href="" class="hover:text-secondary font-semibold">Product</a></li>
                  <li><a href="" class="hover:text-secondary font-semibold">404 page</a></li>
                 {{-- <li><a href="checkout.html" class="hover:text-secondary font-semibold">Checkout</a></li> --}}
              </ul>
            </nav>

            <!-- Right section: Buttons (for desktop) -->
            <div class="hidden lg:flex items-center space-x-4 relative">
            {{-- <a href="register.html"
                class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Register</a>
            <a href="register.html"
                class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Login</a> --}}
                @auth
                    <a href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <button type="submit"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"> Log out </button>

                    </form>
                @else
                    <a href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                    Log in
                    </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                            </a>
                        @endif
                @endauth

                <a id="search-icon" href="javascript:void(0);" class="dark:text-[#EDEDEC] hover:text-secondary group">
                    <img src="assets/images/search-icon.svg" alt="Search"
                        class="h-6 w-6 transition-transform transform group-hover:scale-120">
                </a>
                <!-- Search field -->
                <div id="search-field"
                    class="hidden absolute top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
                    <input type="text" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Search for products...">
                </div>
        </div>
        </div>
    </header>

    <!-- Mobile menu -->
    <nav id="mobile-menu-placeholder" class="mobile-menu hidden flex flex-col items-center space-y-8 lg:hidden">
      <ul class="w-full">
          <li><a href="{{route('items.index')}}" class="hover:text-secondary font-bold block py-2">Home</a></li>

          <!-- Men Dropdown -->
          {{-- <li class="relative group" x-data="{ open: false }">
              <a @click="open = !open; $event.preventDefault()" class="hover:text-secondary font-bold block py-2 flex justify-start items-center cursor-pointer">
                <span>Men</span>
                <span @click.stop="open = !open">
                    <i :class="open ? 'fas fa-chevron-up text-xs ml-2' : 'fas fa-chevron-down text-xs ml-2'"></i>
                </span>
              </a>
              <ul class="mobile-dropdown-menu" x-show="open" x-transition class="space-y-2">
                  <li><a href="shop.html" class="hover:text-secondary font-bold block pt-2 pb-3">Shop Men</a></li>
                  <li><a href="single-product-page.html" class="hover:text-secondary font-bold block py-2">Men item 1</a></li>
                  <li><a href="single-product-page.html" class="hover:text-secondary font-bold block py-2">Men item 2</a></li>
                  <li><a href="single-product-page.html" class="hover:text-secondary font-bold block py-2">Men item 3</a></li>
              </ul>
          </li> --}}

          <!-- Women Dropdown -->
          {{-- <li class="relative group" x-data="{ open: false }">
              <a @click="open = !open; $event.preventDefault()" class="hover:text-secondary font-bold block py-2 flex justify-start items-center cursor-pointer">
                    <span>Women</span>
                    <span @click.stop="open = !open">
                        <i :class="open ? 'fas fa-chevron-up text-xs ml-2' : 'fas fa-chevron-down text-xs ml-2'"></i>
                    </span>
              </a>
              <ul class="mobile-dropdown-menu" x-show="open" x-transition class="pl-4 space-y-2">
                  <li><a href="shop.html" class="hover:text-secondary font-bold block py-2">Shop Women</a></li>
                  <li><a href="single-product-page.html" class="hover:text-secondary font-bold block py-2">Women item 1</a></li>
                  <li><a href="single-product-page.html" class="hover:text-secondary font-bold block py-2">Women item 2</a></li>
                  <li><a href="single-product-page.html" class="hover:text-secondary font-bold block py-2">Women item 3</a></li>
              </ul>
          </li> --}}

        <li><a href="{{route('items.index')}}" class="hover:text-secondary font-bold block py-2">Shop</a></li>
          <li><a href="" class="hover:text-secondary font-bold block py-2">Product</a></li>
          <li><a href="" class="hover:text-secondary font-bold block py-2">404 page</a></li>
          {{-- <li><a href="checkout.html" class="hover:text-secondary font-bold block py-2">Checkout</a></li> --}}
      </ul>
      <div class="flex flex-col mt-6 space-y-2 items-center">
        {{-- <a href="register.html"
            class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-start min-w-[110px]">Register</a>
        <a href="register.html"
            class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-start min-w-[110px]">Login</a> --}}
       @auth
            <a href="{{ url('/dashboard') }}"
            class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-center min-w-[110px]">
            Dashboard
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
            class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-center min-w-[110px]"> Log out </button>

            </form>
        @else
            <a href="{{ route('login') }}"
            class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-center min-w-[110px]">
            Log in
            </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                    class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-center min-w-[110px]">
                    Register
                    </a>
                @endif
        @endauth
        {{-- <a href="register.html"
            class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full inline-block flex items-center justify-center min-w-[110px]">Cart -&nbsp;<span>5</span>&nbsp;items</a> --}}

        </div>

      <!-- Search field -->
      {{-- <div
          class="  top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
          <input type="text" class="w-full p-2 border border-gray-300 rounded"
              placeholder="Search for products...">
      </div> --}}
    </nav>

    <!-- Breadcrumbs -->
    {{-- <section id="breadcrumbs" class="pt-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <ol class="list-reset flex">
                <li><a href="{{route("items.index")}}" class="font-semibold hover:text-primary">Home</a></li>
                <li><span class="mx-2">&gt;</span></li>
                <li><a href="shop.html" class="font-semibold hover:text-primary">Shop</a></li>
                <li><span class="mx-2">&gt;</span></li>
                <li><a href="category.html" class="font-semibold hover:text-primary">T-shirts</a></li>
                <li><span class="mx-2">&gt;</span></li>
                <li>Preppy T-shirt</li>
            </ol>
        </div>
    </section> --}}

    <!-- Product info -->
    <section id="product-info">
        <div class="container mx-auto">
            <div class="py-6">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Image Section -->
                    <div class="w-full lg:w-1/2">
                        <div class="grid gap-4">
                            <!-- Big Image -->
                            <div id="main-image-container">
                                <img id="main-image"
                                    class="h-auto w-full max-w-full object-fill rounded-lg object-cover object-center md:h-[480px]"
                                    src=""
                                    alt="Main Product Image" />
                            </div>
                            <!-- Small Images -->
                            <div class="grid grid-cols-5 gap-4">
                                @forelse ( $item->imagePath as $image)
                                <div>
                                    <img onclick="changeImage(this)"
                                    data-full="{{ asset($image->image_resource_path)}}"
                                    src="{{ asset($image->image_resource_path)}}"
                                    class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                    alt="Gallery Image" />
                                </div>
                                @empty
                                    <p>No images available</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- Product Details Section -->
                    <div class="w-full lg:w-1/2 flex flex-col justify-between">
                        <div class="pb-8 border-b border-gray-line">
                            <h1 class="text-3xl font-bold mb-4">{{$item->name}}</h1>
                            {{-- <div class="flex items-center mb-8">
                                <span>★★★★★</span>
                                <span class="ml-2">(0 Reviews)</span>
                                <a href="#" class="ml-4 text-primary font-semibold">Write a review</a>
                            </div>
                            <div class="mb-4 pb-4 border-b border-gray-line">
                                <p class="mb-2">Brand:<strong><a href="#" class="hover:text-primary"> Nike</a></strong>
                                </p>
                                <p class="mb-2">Product code:<strong> 00123</strong></p>
                                <p class="mb-2">Availability:<strong> In Stock</strong></p>
                            </div> --}}
                            <div class="text-2xl font-semibold mb-8">{{$item->price}} €</div>
                            {{-- <div class="flex items-center mb-8">
                                <button id="decrease"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold w-10 h-10 rounded-full flex items-center justify-center focus:outline-none"
                                    disabled>-</button>
                                <input id="quantity" type="number" value="1"
                                    class="w-16 py-2 text-center focus:outline-none" readonly>
                                <button id="increase"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold  w-10 h-10 rounded-full focus:outline-none">+</button>
                            </div>
                            <button
                                class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Add
                                to Cart</button>
                        </div> --}}
                        <!-- Social sharing -->
                        <div class="flex space-x-4 my-6">
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="/images/social_icons/facebook.svg" alt="Facebook"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="/images/social_icons/instagram.svg" alt="Instagram"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="/images/social_icons/pinterest.svg" alt="Pinterest"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="/images/social_icons/twitter.svg" alt="Twitter"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="/images/social_icons/viber.svg" alt="Viber"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                        </div>
                        <!-- Additional Information -->
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Product Description</h3>
                            <p>{{$item->description}}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Seller</h3>
                            <p>{{ $item->user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product tabs description -->
    {{-- <section>
        <div class="container mx-auto">
            <div class="py-12">
                <div class="mt-10">
                    <div class="flex space-x-4" role="tablist">
                        <button id="description-tab" role="tab" aria-controls="description-content" aria-selected="true"
                            class="tab active">Description</button>
                        <button id="additional-info-tab" role="tab" aria-controls="additional-info-content"
                            aria-selected="false" class="tab">Additional information</button>
                        <button id="size-shape-tab" role="tab" aria-controls="size-shape-content" aria-selected="false"
                            class="tab">Size & Shape</button>
                        <button id="reviews-tab" role="tab" aria-controls="reviews-content" aria-selected="false"
                            class="tab">Reviews (3)</button>
                    </div>
                    <div class="mt-8">
                        <div id="description-content" role="tabpanel" aria-labelledby="description-tab"
                            class="tab-content">
                            <div class="flex flex-col lg:flex-row lg:space-x-8">
                                <div class="w-full lg:w-1/2">
                                    <h3 class="text-xl font-semibold mb-2">With the new fashion trends and all the
                                        available shopping options, you can order your clothes online and make money
                                        without even leaving your house.</h3>
                                    <p class="mb-4">These days, you can take your own inspiration and create something
                                        new for yourself. All you need to do is read books and magazines about fashion,
                                        watch videos on YouTube, keep yourself updated on social media, and, of course,
                                        shop online!</p>
                                </div>
                                <div class="w-full lg:w-1/4">
                                    <h3 class="text-xl font-semibold mb-5">Material & Washing</h3>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Material: <span
                                            class="font-semibold">100% cotton</span></p>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Fabric: <span
                                            class="font-semibold">Soft jersey</span></p>
                                    <p class="mb-2">Care instructions: <span class="font-semibold">Machine wash at 30°C,
                                            do not tumble dry, iron on low heat, do not bleach</span></p>
                                </div>
                                <div class="w-full lg:w-1/4">
                                    <h3 class="text-xl font-semibold mb-5">Size & Shape</h3>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Model height: <span
                                            class="font-semibold">Our model is 180 cm tall and is wearing size M</span>
                                    </p>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Fit: <span
                                            class="font-semibold">Regular</span></p>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Length: <span
                                            class="font-semibold">Standard</span></p>
                                    <p class="mb-2">Sleeve length: <span class="font-semibold">Short sleeves</span></p>
                                </div>
                            </div>
                        </div>
                        <div id="additional-info-content" role="tabpanel" aria-labelledby="additional-info-tab"
                            class="tab-content hidden">
                            <p>Additional information about the product.</p>
                            <div class="flex flex-col space-y-8">
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Colors</h3>
                                    <p class="text-base text-gray-700">
                                        Available colors:
                                        <a href="#" class="text-primary hover:underline">Red</a>,
                                        <a href="#" class="text-primary hover:underline">Blue</a>,
                                        <a href="#" class="text-primary hover:underline">Green</a>,
                                        <a href="#" class="text-primary hover:underline">Black</a>,
                                        <a href="#" class="text-primary hover:underline">White</a>.
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Brand</h3>
                                    <p class="text-base text-gray-700">
                                        This t-shirt is made by
                                        <a href="#" class="text-primary hover:underline">Nike</a>.
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Material & Care</h3>
                                    <p class="text-base text-gray-700">
                                        Material: 100% Cotton
                                        <br>
                                        Care instructions: Machine wash at 40 °C, do not tumble dry, iron at medium
                                        temperature, do not bleach.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="size-shape-content" role="tabpanel" aria-labelledby="size-shape-tab"
                            class="tab-content hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 border-b border-gray-line bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                                Size
                                            </th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-line bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                                Chest (inches)
                                            </th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-line bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                                Waist (inches)
                                            </th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-line bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                                Sleeve Length (inches)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                Small
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                34-36
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                28-30
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                32-33
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                Medium
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                38-40
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                32-34
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                33-34
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                Large
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                42-44
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                36-38
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                34-35
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                X-Large
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                46-48
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                40-42
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-line text-sm leading-5 text-gray-700">
                                                35-36
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab"
                            class="tab-content hidden">
                            <!-- Reviews List -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-semibold mb-4">Customer Reviews</h3>
                                <div id="reviews-list">
                                    <!-- Review 1 -->
                                    <div class="py-4">
                                        <div class="flex items-center mb-2">
                                            <span class="text-lg font-semibold text-gray-700">John Doe</span>
                                            <span class="ml-2 text-primary">★★★★★</span>
                                        </div>
                                        <p>Great quality! Fits perfectly and the material feels premium. Highly
                                            recommend this t-shirt.</p>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="border-t border-gray-line py-4">
                                        <div class="flex items-center mb-2">
                                            <span class="text-lg font-semibold text-gray-700">Jane Smith</span>
                                            <span class="ml-2 text-primary">★★★★☆</span>
                                        </div>
                                        <p>I love the design and the fabric is very comfortable. However, I wish it came
                                            in more colors.</p>
                                    </div>
                                    <!-- Review 3 -->
                                    <div class="border-t border-gray-line py-4">
                                        <div class="flex items-center mb-2">
                                            <span class="text-lg font-semibold text-gray-700">Alice Johnson</span>
                                            <span class="ml-2 text-primary">★★★★★</span>
                                        </div>
                                        <p>Excellent t-shirt! The size is perfect and it looks great. Will definitely
                                            buy again.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Review Form -->
                            <div class="mt-8">
                                <h3 class="text-lg font-semibold mb-4">Write a Review</h3>
                                <form id="review-form" class="space-y-4">
                                    <div class="space-y-4 md:flex md:space-x-4 md:space-y-0">
                                        <div class="md:flex-1">
                                            <label for="review-name"
                                                class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" id="review-name" name="review-name"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                        </div>
                                        <div class="md:flex-1">
                                            <label for="review-email"
                                                class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" id="review-email" name="review-email"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                        </div>
                                        <div class="md:flex-1">
                                            <label for="review-rating"
                                                class="block text-sm font-medium text-gray-700">Rating</label>
                                            <select id="review-rating" name="review-rating"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                                <option value="5">★★★★★</option>
                                                <option value="4">★★★★☆</option>
                                                <option value="3">★★★☆☆</option>
                                                <option value="2">★★☆☆☆</option>
                                                <option value="1">★☆☆☆☆</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="review-text"
                                            class="block text-sm font-medium text-gray-700">Review</label>
                                        <textarea id="review-text" name="review-text" rows="4"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full focus:outline-none">Submit
                                            Review</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Latest-products -->
    {{-- <section id="latest-products" class="py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Latest products</h2>
            <div class="flex flex-wrap -mx-4">
                <!-- Product 1 -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                  <div class="bg-white p-3 rounded-lg shadow-lg">
                    <img src="assets/images/products/5.jpg" alt="Product 1" class="w-full object-cover mb-4 rounded-lg">
                    <a href="#" class="text-lg font-semibold mb-2">Blue women's suit</a>
                    <p class=" my-2">Women</p>
                    <div class="flex items-center mb-4">
                      <span class="text-lg font-bold text-primary">$19.99</span>
                      <span class="text-sm line-through ml-2">$24.99</span>
                    </div>
                    <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</button>
                  </div>
                </div>
                <!-- Product 2 -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                  <div class="bg-white p-3 rounded-lg shadow-lg">
                    <img src="assets/images/products/6.jpg" alt="Product 2" class="w-full object-cover mb-4 rounded-lg">
                    <a href="#" class="text-lg font-semibold mb-2">White shirt with long sleeves</a>
                    <p class=" my-2">Women</p>
                    <div class="flex items-center mb-4">
                      <span class="text-lg font-bold text-gray-900">$29.99</span>
                    </div>
                    <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</button>
                  </div>
                </div>
                <!-- Product 3 -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                  <div class="bg-white p-3 rounded-lg shadow-lg">
                    <img src="assets/images/products/7.jpg" alt="Product 3" class="w-full object-cover mb-4 rounded-lg">
                    <a href="#" class="text-lg font-semibold mb-2">Yellow men's suit</a>
                    <p class="my-2">Men</p>
                    <div class="flex items-center mb-4">
                      <span class="text-lg font-bold text-gray-900">$15.99</span>
                      <span class="text-sm line-through  ml-2">$19.99</span>
                    </div>
                    <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</button>
                  </div>
                </div>
                <!-- Product 4 -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                  <div class="bg-white p-3 rounded-lg shadow-lg">
                    <img src="assets/images/products/8.jpg" alt="Product 4" class="w-full object-cover mb-4 rounded-lg">
                    <a href="#" class="text-lg font-semibold mb-2">Red dress</a>
                    <p class="my-2">Women</p>
                    <div class="flex items-center mb-4">
                        <span class="text-lg font-bold text-primary">$39.99</span>
                        <span class="text-sm line-through ml-2">$49.99</span>
                    </div>
                    <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</button>
                  </div>
                </div>
              </div>
        </div>
    </section> --}}

     <!-- Footer -->
     <footer class="border-t border-gray-line">
        <!-- Top part -->
        <div class="container mx-auto px-4 py-10">
        <div class="flex flex-wrap -mx-4">
            <!-- Menu 1 -->
            {{-- <div class="w-full sm:w-1/6 px-4 mb-8">
            <h3 class="text-lg font-semibold mb-4">Shop</h3>
            <ul>
                <li><a href="/shop.html" class="hover:text-primary">Shop</a></li>
                <li><a href="/single-product-page.html" class="hover:text-primary">Women</a></li>
                <li><a href="/shop.html" class="hover:text-primary">Men</a></li>
                <li><a href="/single-product-page.html" class="hover:text-primary">Shoes</a></li>
                <li><a href="/single-product-page.html" class="hover:text-primary">Accessories</a></li>
            </ul>
            </div> --}}
            <!-- Menu 2 -->
            {{-- <div class="w-full sm:w-1/6 px-4 mb-8">
            <h3 class="text-lg font-semibold mb-4">Pages</h3>
            <ul>
                <li><a href="/shop.html" class="hover:text-primary">Shop</a></li>
                <li><a href="/single-product-page.html" class="hover:text-primary">Product</a></li>
                <li><a href="/checkout.html" class="hover:text-primary">Checkout</a></li>
                <li><a href="/404.html" class="hover:text-primary">404</a></li>
            </ul>
            </div> --}}
            <!-- Menu 3 -->
            <div class="w-full sm:w-1/6 px-4 mb-8">
            <h3 class="text-lg font-semibold mb-4">Account</h3>
            <ul>
                {{-- <li><a href="/cart.html" class="hover:text-primary">Cart</a></li> --}}
                <li><a href="{{ route('register') }}" class="hover:text-primary">Registration</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-primary">Login</a></li>
            </ul>
            </div>
            <!-- Social Media -->
            <div class="w-full sm:w-1/6 px-4 mb-8">
            <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
            <ul>
                <li class="flex items-center mb-2">
                <img src="/images/social_icons/facebook.svg" alt="Facebook" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                <a href="#" class="hover:text-primary">Facebook</a>
                </li>
                {{-- <li class="flex items-center mb-2">
                <img src="/images/social_icons/twitter.svg" alt="Twitter" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                <a href="#" class="hover:text-primary">Twitter</a>
                </li>
                <li class="flex items-center mb-2">
                <img src="/images/social_icons/instagram.svg" alt="Instagram" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                <a href="#" class="hover:text-primary">Instagram</a>
                </li>
                <li class="flex items-center mb-2">
                <img src="/images/social_icons/pinterest.svg" alt="Instagram" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                <a href="#" class="hover:text-primary">Pinterest</a>
                </li> --}}
                <li class="flex items-center mb-2">
                <img src="/images/social_icons/youtube.svg" alt="Instagram" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                <a href="#" class="hover:text-primary">YouTube</a>
                </li>
            </ul>
            </div>
            <!-- Contact Information -->
            <div class="w-full sm:w-2/6 px-4 mb-8">
            <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
            <p><img src="/images/template-white-logo.png" alt="Logo" class="h-[60px] mb-4"></p>
            <p>Portugal, Madeira</p>
            <p class="text-xl font-bold my-4">Phone: </p>
            <a href="mailto:info@company.com" class="underline">Email: nasgaming92@gmail.com</a>
            </div>
        </div>
        </div>

        <!-- Bottom part -->
        <div class="py-6 border-t border-gray-line">
        <div class="container mx-auto px-4 flex flex-wrap justify-between items-center">
            <!-- Copyright and Links -->
            <div class="w-full lg:w-3/4 text-center lg:text-left mb-4 lg:mb-0">
            <p class="mb-2 font-bold">&copy; 2025 Whatcanyoudo3D Company. All rights reserved.</p>
            <ul class="flex justify-center lg:justify-start space-x-4 mb-4 lg:mb-0">
                <li><a href="#" class="hover:text-primary">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-primary">Terms of Service</a></li>
                <li><a href="#" class="hover:text-primary">FAQ</a></li>
            </ul>
            <p class="text-sm mt-4">In this website u can find your favorite 3D prints.</p>
            </div>
            <!-- Payment Icons -->
            {{-- <div class="w-full lg:w-1/4 text-center lg:text-right">
            <img src="/assets/images/social_icons/paypal.svg" alt="PayPal" class="inline-block h-8 mr-2">
            <img src="/assets/images/social_icons/stripe.svg" alt="Stripe" class="inline-block h-8 mr-2">
            <img src="/assets/images/social_icons/visa.svg" alt="Visa" class="inline-block h-8">
            </div> --}}
        </div>
        </div>
    </footer>

@endsection
