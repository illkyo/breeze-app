<x-layout>
  <x-slot:heading>
  Room
  </x-slot:heading>
  <h2 class="font-bold">Number - {{ $room['number'] }} Floor - {{ $room['floor'] }}</h2>
  <p>
    This room costs {{ $room['price'] }} rf per guest.
  </p>
</x-layout>