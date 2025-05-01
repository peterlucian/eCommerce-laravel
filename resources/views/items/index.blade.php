@extends('layouts.layout')

@section('content')

    <!-- Header -->
    <header class="bg-sky-500/50 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4">
            <!-- Left section: Logo -->
            <a href="{{ route('items.index') }}" class="flex items-center">
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
                  {{-- <li><a href="checkout.html" class="hover:text-secondary font-semibold">Checkout</a></li>  --}}
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
                    class="hidden absolute top-full right-0 mt-2 w-96 bg-white shadow-lg p-2 rounded">
                    <form action="{{route('items.index')}}" method="GET" class="w-150">
                    <input type="text" class="w-full p-2 border font-semibold text-opacity-60 border-gray-300 rounded" name="search_input"
                        placeholder="Search for products...">
                        <div class="flex flex-row space-x-1">
                        <select id="underline_select" name="search_type" class="inline-block w-full font-semibold px-2 py-1.5 text-opacity-60 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">
                            <option selected value="title">Title</option>
                            <option value="author">Author</option>
                        </select>
                        <button type="submit" class="inline-block font-semibold px-2 py-1.5 text-opacity-60 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">Search</button>
                        <button type="submit" class="inline-block font-semibold px-2 py-1.5 text-opacity-85 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">Reset</button>
                    </div></form>
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
        <div class="top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
            <form action="{{route('items.index')}}" method="GET">
            <input type="text" class="w-full p-2 border font-semibold border-gray-300 text-opacity-60 rounded" name="search_input"
                placeholder="Search for products...">
                <div class="flex flex-row space-x-1">
                <select id="underline_select" name="search_type" class="inline-block w-full font-semibold px-2 py-1.5 text-opacity-60 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">
                    <option selected value="title">Title</option>
                    <option value="author">Author</option>
                </select>
                <button type="submit" class="inline-block font-semibold px-2 py-1.5 text-opacity-60 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">Search</button>
                <button type="submit" class="inline-block font-semibold px-2 py-1.5 text-opacity-85 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">Reset</button>
            </div></form>
        </div>
        </nav>

        <!-- Slider -->
        <section id="product-slider">
            <div class="main-slider swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <img src="/images/main-slider/doraemon.jpg" alt="Product 1">
                        <div class="swiper-slide-content">
                        <h2 class="text-3xl md:text-7xl font-bold text-white mb-2 md:mb-4">Doraemon</h2>
                        <p class="mb-4 text-white md:text-2xl">Experience the best in 3d print with <br>our latest products.</p>
                            {{-- <a href="/"
                                class="bg-primary hover:bg-transparent text-white hover:text-white border border-transparent hover:border-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                now</a> --}}
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <img src="/images/main-slider/anime.jpg" alt="Product 2">
                        <div class="swiper-slide-content">
                        <h2 class="text-3xl md:text-7xl font-bold text-white mb-2 md:mb-4">Animel</h2>
                        <p class="mb-4 text-white md:text-2xl">Discover the latest 3d print trends <br> with our users.</p>
                            {{-- <a href="/"
                                class="bg-white hover:bg-transparent text-black hover:text-white font-semibold px-4 py-2 rounded-full inline-block border border-transparent hover:border-white">Shop
                                now</a> --}}
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <img src="/images/main-slider/dragonball.jpeg" alt="Product 3">
                        <div class="swiper-slide-content">
                        <h2 class="text-3xl md:text-7xl font-bold text-white mb-2 md:mb-4">Dragon Ball</h2>
                        <p class="mb-4 text-white md:text-2xl">Elevate your 3d prints style with our latest <br> 3d prints.</p>
                            {{-- <a href="/"
                                class="bg-primary hover:bg-transparent text-white hover:text-white border border-transparent hover:border-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider Pagination -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </section>

        <!-- Product banner section -->
        {{-- <section id="product-banners">
            <div class="container mx-auto py-10">
                <div class="flex flex-wrap -mx-4">
                    <!-- Category 1 -->
                    <div class="w-full sm:w-1/3 px-4 mb-8">
                        <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">
                            <img src="./assets/images/cat-image1.jpg" alt="Category 1" class="w-full h-auto">
                            <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>
                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4">
                                <h2 class="text-2xl md:text-3xl font-bold mb-4">Men</h2>
                                <a href="/"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Category 2 -->
                    <div class="w-full sm:w-1/3 px-4 mb-8">
                        <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">
                            <img src="./assets/images/cat-image4.jpg" alt="Category 2" class="w-full h-auto">
                            <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>
                            <div
                                class="category-text absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4 transition duration-300">
                                <h2 class="text-2xl md:text-3xl font-bold mb-4">Women</h2>
                                <a href="/"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Category 3 -->
                    <div class="w-full sm:w-1/3 px-4 mb-8">
                        <div class="category-banner relative overflow-hidden rounded-lg shadow-lg group">
                            <img src="./assets/images/cat-image5.jpg" alt="Category 3" class="w-full h-auto">
                            <div class="absolute inset-0 bg-gray-light bg-opacity-50"></div>
                            <div
                                class="category-text absolute inset-0 flex flex-col items-center justify-center text-center text-white p-4 transition duration-300">
                                <h2 class="text-2xl md:text-3xl font-bold mb-4">Accessories</h2>
                                <a href="/"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-white text-white hover:text-white font-semibold px-4 py-2 rounded-full inline-block">Shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Popular product section -->
        <section id="popular-products">
            <div class="container mx-auto px-4 mt-6">
                <h2 class="text-2xl font-bold mb-8">Popular products</h2>
                <div class="flex flex-wrap -mx-4">
                    @forelse ($items as $item)
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                        <div class="bg-white p-3 rounded-lg shadow-lg">
                            <img src="{{ asset($item->thumbnail_path)}}" alt="Product" class="w-full object-cover mb-4 rounded-lg">
                            <a href="{{route('items.show', [$item])}}" class="text-lg font-semibold mb-2">{{$item->name}}</a>
                            <p class="my-2">{{$item->description}}</p>
                            <div class="flex items-center mb-4">
                            <span class="text-lg font-bold text-primary">{{$item->price}}</span>
                            {{-- <span class="text-sm line-through ml-2">$24.99</span> --}}
                            </div>
                            <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</button>
                        </div>
                    </div>
                    @empty
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                        <div class="bg-white p-3 rounded-lg shadow-lg">
                        <p>No items.</p></div>
                    @endforelse





                    <!-- Product 1 -->
                    {{-- <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white p-3 rounded-lg shadow-lg">
                        <img src="assets/images/products/1.jpg" alt="Product 1" class="w-full object-cover mb-4 rounded-lg">
                        <a href="#" class="text-lg font-semibold mb-2">Summer black dress</a>
                        <p class="my-2">Women</p>
                        <div class="flex items-center mb-4">
                        <span class="text-lg font-bold text-primary">$19.99</span>
                        <span class="text-sm line-through ml-2">$24.99</span>
                        </div>
                        <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</button>
                    </div>
                    </div> --}}
                </div>
                <div class="mt-4">
                    {{$items->links('pagination::tailwind')}}
                </div>
            </div>
        </section>

        <!-- Brand section -->
        {{-- <section id="brands" class="bg-white py-16 px-4">
            <div class="container mx-auto max-w-screen-xl px-4 testimonials">
            <div class="text-center mb-12 lg:mb-20">
                <h2 class="text-5xl font-bold mb-4">Discover <span class="text-primary">Our Brands</span></h2>
                <p class="my-7">Explore the top brands we feature in our store</p>
            </div>
                <div class="swiper brands-swiper-slider">
                    <div class="swiper-wrapper">
                        <!-- Brand Logo 1 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                            <img src="./assets/images/brands/html.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>

                        <!-- Brand Logo 2 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                            <img src="./assets/images/brands/js.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>

                        <!-- Brand Logo 3 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                            <img src="./assets/images/brands/laravel.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>

                        <!-- Brand Logo 4 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                            <img src="./assets/images/brands/php.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>

                        <!-- Brand Logo 5 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                            <img src="./assets/images/brands/react.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>

                        <!-- Brand Logo 6 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                            <img src="./assets/images/brands/tailwind.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>

                        <!-- Brand Logo 7 -->
                        <div class="swiper-slide flex-none bg-gray-200 flex items-center justify-center rounded-md">
                        <img src="./assets/images/brands/typescript.svg" alt="Client Logo" class="max-h-full max-w-full">
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
        </section> --}}

        <!-- Banner section -->
        <section id="banner" class="relative my-16">
            <div class="container mx-auto px-4 py-20 rounded-lg relative bg-cover bg-center" style="background-image: url('/images/my3d.jpg');">
                <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
                <div class="relative flex flex-col items-center justify-center h-full text-center text-white py-20">
                    <h2 class="text-4xl font-bold mb-4">Welcome to Our website</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">Shop Now</a>
                        <a href="#" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">New Arrivals</a>
                        {{-- <a href="#" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">Sale</a> --}}
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog section -->
        <section class="py-16">
        <div class="text-center mb-12 lg:mb-20">
            <h2 class="text-5xl font-bold mb-4">Discover <span class="text-primary">Our</span> Website</h2>
            <p class="my-7">Stay updated with the latest trends, tips, and models of 3d print.</p>
        </div>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                <div class="flex flex-col p-6 bg-white rounded-xl shadow-lg">
                    <img class="object-cover object-center w-full mb-8 rounded-xl" src="/images/3dprinter.jpg" alt="blog">
                    <h2 class="mb-2 text-xs font-semibold tracking-widest text-primary uppercase">3D Print Trends</h2>
                    <h1 class="mb-4 text-2xl font-semibold leading-none tracking-tighter text-gray-dark lg:text-3xl">Latest 3D Print Trends for 2025</h1>
                    <p class="flex-grow text-base font-medium leading-relaxed text-gray-txt">Explore the hottest 3D Prints trends of 2025. From bold prints to classic styles, stay ahead of the 3D Print curve with our expert insights.</p>
                    {{-- <div class="mt-8">
                        <a href="#" class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Read more</a>
                    </div> --}}
                </div>
                {{-- <div class="flex flex-col p-6 bg-white rounded-xl shadow-lg">
                    <img class="object-cover object-center w-full mb-8 rounded-xl" src="/assets/images/stylisng-tips.jpg" alt="blog">
                    <h2 class="mb-2 text-xs font-semibold tracking-widest text-primary uppercase">Styling Tips</h2>
                    <h1 class="mb-4 text-2xl font-semibold leading-none tracking-tighter text-gray-dark lg:text-3xl">How to Style Your Shirt for Any Occasion</h1>
                    <p class="flex-grow text-base font-medium leading-relaxed text-gray-txt">Learn how to style your shirt for different occasions, whether it's a casual day out or a formal event. Get tips from fashion experts.</p>
                    <div class="mt-8">
                        <a href="#" class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Read more</a>
                    </div>
                </div>
                <div class="flex flex-col p-6 bg-white rounded-xl shadow-lg">
                    <img class="object-cover object-center w-full mb-8 rounded-xl" src="/assets/images/customer-stories.jpg" alt="blog">
                    <h2 class="mb-2 text-xs font-semibold tracking-widest text-primary uppercase">Customer Stories</h2>
                    <h1 class="mb-4 text-2xl font-semibold leading-none tracking-tighter text-gray-dark lg:text-3xl">Real Stories from Our Happy Customers</h1>
                    <p class="flex-grow text-base font-medium leading-relaxed text-gray-txt">Read about the experiences of our customers. Discover how our shirts have made a difference in their lives and their personal style.</p>
                    <div class="mt-8">
                        <a href="#" class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Read more</a>
                    </div>
                </div> --}}
            </div>
        </div>
        </section>

        <!-- Subscribe section -->
        {{-- <section id="subscribe" class="py-6 lg:py-24 bg-white border-t border-gray-line">
        <div class="container mx-auto">
            <div class="flex flex-col items-center rounded-lg p-4 sm:p-0 ">
                <div class="mb-8">
                    <h2 class="text-center text-xl font-bold sm:text-2xl lg:text-left lg:text-3xl">Join our newsletter and <span class="text-primary">get $50 discount</span> for your first order
                    </h2>
                </div>
                <div class="flex flex-col items-center w-96 ">
                    <form class="flex w-full gap-2">
                        <input placeholder="Enter your email address"
                                class="w-full flex-1 rounded-full px-3 py-2 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" />
                        <button
                            class="bg-primary border border-primary hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Subscribe</button>
                    </form>
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
                <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">Pages</h3>
                <ul>
                    <li><a href="/shop.html" class="hover:text-primary">Shop</a></li>
                    <li><a href="/single-product-page.html" class="hover:text-primary">Product</a></li>
                    <li><a href="/checkout.html" class="hover:text-primary">Checkout</a></li>
                    <li><a href="/404.html" class="hover:text-primary">404</a></li>
                </ul>
                </div>
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
