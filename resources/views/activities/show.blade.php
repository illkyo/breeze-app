<x-layout>
  <x-slot:heading>
  Activity
  </x-slot:heading>
  <h2 class="font-bold">{{ $activity['name'] }}</h2>
  <p>
    This activity costs {{ $activity['price'] }}.
  </p>
  <div class="mt-4 flex justify-between">
    <x-button href="/activities/{{ $activity->id }}/edit">Edit Activity</x-button>
    <x-button href="/activities/create">Create Activity</x-button>
  </div>
</x-layout>