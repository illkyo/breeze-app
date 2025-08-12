<x-layout>
  <x-slot:heading>
  Room Booking
  </x-slot:heading>
  <h2 class="font-bold">{{ $roomBooking['id'] }}</h2>
  <p>
    room_id = {{ $roomBooking['room_id'] }}
  </p>
  <p>
    visitor_id = {{ $roomBooking['visitor_id'] }}
  </p>
  <p>
    visitor_count = {{ $roomBooking['visitor_count'] }}
  </p>
  <p>
    total_price = {{ $roomBooking['total_price'] }}
  </p>
</x-layout>