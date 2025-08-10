<x-layout>
  <x-slot:heading>
  Rooms
  </x-slot:heading>
  @can('create-room')
  <div class="mb-4">
    <x-button href="/rooms/create">Create Room</x-button>
  </div>
  @endcan
  <div class="space-y-4">
    @foreach ($rooms as $room)
      <a href="/rooms/{{ $room['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg flex justify-between">
        <p><strong>Room {{ $room['code'] }}</strong> - {{ $room['price']}} >></p>
        @if ($room->booked) 
          <p>booked</p>
        @endif
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $rooms->links() }}
  </div>
</x-layout>