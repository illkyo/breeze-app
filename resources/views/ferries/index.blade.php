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
          <p class="font-bold text-zinc-500 text-sm">{{ $ferry['from'] }} <span class="text-indigo-400">>></span> {{ $ferry['to'] }}</p>
          <p><strong>{{ $ferry['name'] }}</strong> - {{ $ferry['price']}} rf</p>
        </div>
        <div class="space-y-2">
          <p class="text-sm"><span class="font-bold">Departure Time:</span> {{ $ferry['departure_time'] }}</p>
          <p class="text-sm"><span class="font-bold">Arrival Time:</span> {{ $ferry['arrival_time'] }}</p>
        </div>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $ferries->links() }}
  </div>
</x-layout>