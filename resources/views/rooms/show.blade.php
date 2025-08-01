@php
  $number = substr($room['code'], 2);
  $floor = substr($room['code'], -2);
@endphp

<x-layout>
  <x-slot:heading>
  Room
  </x-slot:heading>
  <h2 class="font-bold">Number - {{ $number }} Floor - {{ $floor }}</h2>
  <p>
    This room costs {{ $room['price'] }} rf per guest.
  </p>
  <div class="mt-4">
    <x-button href="/rooms/{{ $room->id }}/edit">Edit Room</x-button>
  </div>
</x-layout>