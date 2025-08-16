@php
  use App\Enums\Type;
@endphp
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
      <a href="/activities/{{ $activity['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg bg-white/20 space-y-1">
        <p><strong>{{ $activity['name'] }}</strong> - {{ $activity['price']}} rf</p>
        <div>
          <p @class([
            'italic',
            'text-sm',
            'text-cyan-500' => $activity->type === Type::RIDE,
            'text-indigo-500' => $activity->type === Type::EVENT,
            'text-blue-500' => $activity->type === Type::SHOW,
          ])>{{ $activity->type }}</p>
        </div>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $activities->links() }}
  </div>
</x-layout>