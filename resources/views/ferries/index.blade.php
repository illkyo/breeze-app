<x-layout>
  <x-slot:heading>
  Ferries
  </x-slot:heading>
  <div class="mb-4">
    <x-button href="/ferries/create">Create Ferry</x-button>
  </div>
  <div class="space-y-4">
    @foreach ($ferries as $ferry)
      <a href="/ferries/{{ $ferry['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg">
        <strong>{{ $ferry['name'] }}</strong> - {{ $ferry['price']}} >>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $ferries->links() }}
  </div>
</x-layout>