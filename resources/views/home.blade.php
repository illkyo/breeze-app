<x-layout>
  @guest
    <x-slot:heading>Hello!</x-slot:heading>
  @endguest
  @auth
    <x-slot:heading>Welcome {{ Auth::user()['first_name'] }}</x-slot:heading>
  @endauth
  <div>
    <section class="flex flex-col items-start">
      <h1 class="font-bold border-b-4 border-indigo-500 rounded-md">Featured Events<h1>
      <div class="flex gap-2">
        @foreach ($activities as $activity)
          <x-card name="{{ $activity->name }}" price="{{ $activity->price }}" linkName="Get Ticket" href="/activity-tickets/{{ $activity->id }}/create"/>
        @endforeach
      </div>
    </section>
    <section class="flex flex-col items-start">
      <h1 class="font-bold border-b-4 border-indigo-500 rounded-md">AC Ferry Rides<h1>
      <div class="flex gap-2">
        @foreach ($ferries as $ferry)
          <x-card name="{{ $ferry->name }}" price="{{ $ferry->price }}" linkName="Get Ticket" href="/ferry-tickets/{{ $ferry->id }}/create"/>
        @endforeach
      </div>
    </section>
    <section class="flex flex-col items-start">
      <h1 class="font-bold border-b-4 border-indigo-500 rounded-md">Open Rooms<h1>
      <div class="flex gap-2">
        @foreach ($rooms as $room)
          <x-card name="Room {{ $room->code }}" price="{{ $room->price }}" linkName="Book Room" href="/room-bookings/{{ $room->id }}/create"/>
        @endforeach
      </div>
    </section>
  </div>
</x-layout>