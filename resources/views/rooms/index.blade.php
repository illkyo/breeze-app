<x-layout>
  <x-slot:heading>
  Rooms
  </x-slot:heading>
  <div class="mb-4">
    <x-button href="/rooms/create">Create Room</x-button>
  </div>
  <div class="space-y-4">
    @foreach ($rooms as $room)
      <a href="/rooms/{{ $room['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg">
        <strong>Room {{ $room['code'] }}</strong> - {{ $room['price']}} >>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $rooms->links() }}
  </div>
</x-layout>