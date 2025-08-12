<x-layout>
  <x-slot:heading>
  Payment
  </x-slot:heading>
  <h1 class="font-bold text-red-700">Payment was canceled!</h1>
  <div class="mt-4">
    <x-button href="/ferry-tickets/{{ $ferry->id }}/create">Go Back</x-button>
  </div>
</x-layout>