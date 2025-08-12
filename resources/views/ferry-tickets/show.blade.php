<x-layout>
  <x-slot:heading>
  Ferry Ticket
  </x-slot:heading>
  <h2 class="font-bold">{{ $ferryTicket['id'] }}</h2>
  <p>
    ferry_id = {{ $ferryTicket['ferry_id'] }}
  </p>
  <p>
    visitor_id = {{ $ferryTicket['visitor_id'] }}
  </p>
  <p>
    visitor_count = {{ $ferryTicket['visitor_count'] }}
  </p>
  <p>
    total_price = {{ $ferryTicket['total_price'] }}
  </p>
</x-layout>