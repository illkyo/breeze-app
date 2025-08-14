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
      <a href="/rooms/{{ $room['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg flex justify-between items-center bg-white/20">
        <p><strong>Room {{ $room['code'] }}</strong> - {{ $room['price']}} rf</p>
        @if ($room->booked) 
          <p class="font-bold text-xs text-zinc-500">[BOOKED]</p>
        @endif
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $rooms->links() }}
  </div>
</x-layout>