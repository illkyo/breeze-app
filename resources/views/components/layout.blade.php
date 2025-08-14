<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="h-full">
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            {{-- <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" /> --}}
            <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#FFFFFF"><path d="M760-520q33 0 56.5-23.5T840-600q0-28-13-43t-27-29v-88q0-17-11.5-28.5T760-800q-17 0-28.5 11.5T720-760v88q-14 14-27 29t-13 43q0 33 23.5 56.5T760-520Zm-560 80h108l-38-61q-6-9-14.5-14t-19.5-5h-36v80Zm0 240h324q-31 0-57.5-15T423-256l-65-104H200v160ZM40-120v-80h80v-480h80v80h36q31 0 57.5 15t43.5 41l153 245q6 9 14.5 14t19.5 5h116v80h80v-246q-52-14-86-56t-34-98q0-34 13-63.5t36-51.5q-5-11-7-22t-2-23q0-50 35-85t85-35q50 0 85 35t35 85q0 12-2 23t-7 22q23 22 36 51.5t13 63.5q0 56-34 98t-86 56v246h120v80H40Zm720-480Z"/></svg>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <x-nav-hop href="/" :active="request()->is('/')">Home</x-nav-hop>
              {{-- <x-nav-hop href="/jobs" :active="request()->is('jobs') || request()->is('jobs/*')">Jobs</x-nav-hop> --}}
              <x-nav-hop href="/ferries" :active="request()->is('ferries') || request()->is('ferries/*')">Ferries</x-nav-hop>
              <x-nav-hop href="/rooms" :active="request()->is('rooms') || request()->is('rooms/*')">Rooms</x-nav-hop>
              <x-nav-hop href="/activities" :active="request()->is('activities') || request()->is('activities/*')">Activities</x-nav-hop>
              @can('view-users')
              <x-nav-hop href="/users" :active="request()->is('users') || request()->is('users/*')">Users</x-nav-hop>
              @endcan
              <x-nav-hop href="/contact" :active="request()->is('contact')">Contact</x-nav-hop>
              {{-- <x-nav-hop type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="console.log('Button Clicked')">Button</x-nav-hop> --}}
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            @guest
              <x-nav-hop href="/login" :active="request()->is('login')">Log In</x-nav-hop>
              <x-nav-hop href="/register" :active="request()->is('register')">Register</x-nav-hop>
            @endguest
            @auth
            <form method="POST" action="/logout">
              @csrf
              <x-form-button>Log Out</x-form-button>
            </form>
            @endauth
          </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
        <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>

</body>
</html>