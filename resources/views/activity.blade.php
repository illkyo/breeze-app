<x-layout>
  <x-slot:heading>
  Activity
  </x-slot:heading>
  <h2 class="font-bold">{{ $activity['name'] }}</h2>
  <p>
    This activity costs {{ $activity['price'] }}.
  </p>
</x-layout>