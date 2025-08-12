<x-layout>
  <x-slot:heading>
  Ferry Ticket
  </x-slot:heading>
  <h2 class="font-bold">{{ $activityTicket['id'] }}</h2>
  <p>
    activity_id = {{ $activityTicket['activity_id'] }}
  </p>
  <p>
    visitor_id = {{ $activityTicket['visitor_id'] }}
  </p>
  <p>
    visitor_count = {{ $activityTicket['visitor_count'] }}
  </p>
  <p>
    total_price = {{ $activityTicket['total_price'] }}
  </p>
</x-layout>