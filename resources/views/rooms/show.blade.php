@php
  $number = substr($room['code'], 0, 2);
  $floor = substr($room['code'], -2);
@endphp

<x-layout>
  <x-slot:heading>
  Room
  </x-slot:heading>
  <h2 class="font-bold">Number - {{ $number }} Floor - {{ $floor }}</h2>
  <p>
    This room costs {{ $room['price'] }} rf per.
  </p>
  <div class="mt-4">
    @can('edit-room')
    <x-button href="/rooms/{{ $room->id }}/edit">Edit Room</x-button>
    @endcan
    @if (!$room->booked)
    <x-button href="/room-bookings/{{ $room->id }}/create">Book Room</x-button>
    @endif
  </div>
</x-layout>