<x-layout>
  <x-slot:heading>
  Ferries
  </x-slot:heading>
  @can('create-ferry')
  <div class="mb-4">
    <x-button href="/ferries/create">Create Ferry</x-button>
  </div>
  @endcan
  <div class="space-y-4">
    @foreach ($ferries as $ferry)
      <a href="/ferries/{{ $ferry['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg flex justify-between">
        <div>
          <p><strong>{{ $ferry['name'] }}</strong> - {{ $ferry['price']}} rf</p>
          <p>{{ $ferry['from'] }} >> {{ $ferry['to'] }}</p>
        </div>
        <div>
          <p>Departure Time: {{ $ferry['departure_time'] }}</p>
          <p>Arrival Time: {{ $ferry['arrival_time'] }}</p>
        </div>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $ferries->links() }}
  </div>
</x-layout>