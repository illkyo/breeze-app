<x-layout>
  <x-slot:heading>
  Ferry
  </x-slot:heading>
  <h2 class="font-bold">{{ $ferry['name'] }}</h2>
  <p>
    This ferry costs {{ $ferry['price'] }} rf for a ride.
  </p>
</x-layout>