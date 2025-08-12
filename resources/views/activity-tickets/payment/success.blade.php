<x-layout>
  <x-slot:heading>
  Payment
  </x-slot:heading>
  <h1 class="font-bold text-green-600">Your Payment has been processed!</h1>
  <div class="mt-4">
    <x-button href="/activity-tickets/{{ $activityTicket->id }}">View Ticket</x-button>
  </div>
</x-layout>