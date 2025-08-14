<x-layout>
  <x-slot:heading>
  Tickets
  </x-slot:heading>
  <div class="flex flex-col text-indigo-500 gap-5">
    @can('view-activity-tickets')
    <div><a href="/activity-tickets">Activity Tickets >></a></div>
    @endcan
    @can('view-ferry-tickets')
    <div><a href="/ferry-tickets">Ferry Tickets >></a></div>
    @endcan
    @can('view-room-bookings')
    <div><a href="/room-bookings">Room Bookings >></a></div>
    @endcan
  </div>
  @if (
      !Gate::allows('view-activity-tickets') &&
      !Gate::allows('view-ferry-tickets') &&
      !Gate::allows('view-room-bookings')
  )
      <p class="text-zinc-600">no tickets...</p>
  @endif
</x-layout>