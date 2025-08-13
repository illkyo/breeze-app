<x-layout>
  <x-slot:heading>
  Ferry
  </x-slot:heading>
  <div class="space-y-4">
    <div class="flex flex-row gap-4">
      <h2 class="font-bold">{{ $ferry['name'] }}</h2>
      <p>from - {{ $ferry['from'] }}</p>
      <p>to - {{ $ferry['to'] }}</P>
    </div>
    <p>
      This ferry costs {{ $ferry['price'] }} rf per.
    </p>
    <div>
      <p>Departure Time: {{ $ferry['departure_time'] }}</p>
      <p>Arrival Time: {{ $ferry['arrival_time'] }}</p>
    </div>
  </div>
  <div class="mt-4">
    @can('edit-ferry')
    <x-button href="/ferries/{{ $ferry->id }}/edit">Edit Ferry</x-button>
    @endcan
    <x-button href="/ferry-tickets/{{ $ferry->id }}/create">Get Ticket</x-button>
  </div>
</x-layout>