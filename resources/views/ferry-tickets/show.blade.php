<x-layout>
  <x-slot:heading>
  Ferry Ticket
  </x-slot:heading>
  <div class="block h-52 w-1/2 border border-gray-300 rounded-lg flex flex-col p-2 gap-2 bg-white/30">
    <div class="block bg-indigo-100 rounded-lg flex justify-between w-full h-1/4 px-4 items-center">
      <div>
        <p class="text-slate-700 font-bold">{{ $ferryTicket->ferry->from }} >> {{ $ferryTicket->ferry->to }}</p>
      </div>
      <div>
        <p class="border-b-2 border-indigo-400 text-center text-slate-700 font-bold text-sm">Booked At</p>
        <p class="text-slate-700 font-bold">{{ $ferryTicket['created_at'] }}</p>
      </div>
    </div>
    <div class="p-3 flex justify-between border-b-2 border-gray-200">
      <div class="flex gap-2">
        <img src="http://picsum.photos/seed/{{ rand(0, 100000) }}/50" alt="ticket-image">
        <div class="flex flex-col">
          <h1 class="font-bold text-xl whitespace-nowrap">{{ $ferryTicket->ferry->name }}</h1>
          <p class="text-gray-600">{{ $ferryTicket['visitor_id'] }}</p>
        </div>
      </div>
      <div class="flex flex-col items-center">
        <p class="font-bold text-sm">Departure - <span class="text-base">{{ date('H:i A', strtotime($ferryTicket->ferry['departure_time'])) }}</span></p>
        <p class="font-bold text-sm">Arrival - <span class="text-base">{{ date('H:i A', strtotime($ferryTicket->ferry['arrival_time'])) }}</span></p>
      </div>
    </div>
    <div class="p-2 flex justify-between items-center">
      <div class="flex gap-1">
        @for ($i = 0; $i < $ferryTicket['visitor_count']; $i++)
        <div class="flex flex-col items-center text-sm">
          <p class="font-bold">O</p>
          <p class="font-bold -m-2.5">^</p>
          <p class="font-bold -m-2">|</p>
          <p class="font-bold -m-0.5">^</p>
        </div>
        @endfor
      </div>
      <h1 class="font-bold text-xl pr-4">{{ $ferryTicket['total_price'] }} rf</h1>
    </div>
  </div>
</x-layout>