<x-layout>
  <x-slot:heading>
  Home
  </x-slot:heading>
  <h1>{{ $greeting }} from the Home page, {{ $name }}</h1>
  <button x-data @click="alert('I\'ve been clicked!')">Click Me</button>
</x-layout>