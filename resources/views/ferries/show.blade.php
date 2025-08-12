<x-layout>
  <x-slot:heading>
  Ferry
  </x-slot:heading>
  <h2 class="font-bold">{{ $ferry['name'] }}</h2>
  <p>
    This ferry costs {{ $ferry['price'] }} rf for a ride.
  </p>
  <div class="mt-4">
    @can('edit-ferry')
    <x-button href="/ferries/{{ $ferry->id }}/edit">Edit Ferry</x-button>
    @endcan
    <x-button href="/ferry-tickets/{{ $ferry->id }}/create">Get Ticket</x-button>
  </div>
</x-layout>