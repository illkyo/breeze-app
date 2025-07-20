<x-layout>
  <x-slot:heading>
  Rooms
  </x-slot:heading>
  <ul>
    @foreach ($rooms as $room)
      <li>
        <a href="/rooms/{{ $room['id'] }}" class="hover:underline">
          <strong>Room No. {{ $room['number'].$room['floor'] }}</strong> - {{ $room['price']}} >>
        </a>
      </li>
    @endforeach
  </ul>
</x-layout>