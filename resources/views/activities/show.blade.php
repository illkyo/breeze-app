<x-layout>
  <x-slot:heading>
  Activity
  </x-slot:heading>
  <h2 class="font-bold">{{ $activity['name'] }}</h2>
  <p>
    This activity costs {{ $activity['price'] }} per.
  </p>
  <div class="mt-4">
    @can('edit-activity')
    <x-button href="/activities/{{ $activity->id }}/edit">Edit Activity</x-button>
    @endcan
    <x-button href="/activity-tickets/{{ $activity->id }}/create">Get Ticket</x-button>
  </div>
</x-layout>