<x-layout>
  <x-slot:heading>
  Activities
  </x-slot:heading>
  @can('create-activity')
  <div class="mb-4">
    <x-button href="/activities/create">Create Activity</x-button>
  </div>
  @endcan
  <div class="space-y-4">
    @foreach ($activities as $activity)
      <a href="/activities/{{ $activity['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg">
        <strong>{{ $activity['name'] }}</strong> - {{ $activity['price']}} rf
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $activities->links() }}
  </div>
</x-layout>