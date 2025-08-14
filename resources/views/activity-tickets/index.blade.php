<x-layout>
  <x-slot:heading>
  Activity Tickets
  </x-slot:heading>
  <div class="flex flex-wrap">
    @if ($activityTickets->isEmpty())
      <p class="text-zinc-600">no tickets...</p>
    @endif  
    @foreach ($activityTickets as $activityTicket)
    <div class="block h-52 w-1/2 border border-gray-300 rounded-lg flex flex-col p-2 gap-2 bg-white/30">
      <div class="block bg-indigo-100 rounded-lg flex justify-between w-full h-1/4 px-4 items-center">
        <div>
          <p class="text-slate-700 font-bold">\\\ {{ $activityTicket->activity->type }} \\\</p>
        </div>
        <div>
          <p class="border-b-2 border-indigo-400 text-center text-slate-700 font-bold text-sm">Booked At</p>
          <p class="text-slate-700 font-bold">{{ $activityTicket['created_at'] }}</p>
        </div>
      </div>
      <div class="p-3 flex justify-between border-b-2 border-gray-200">
        <div class="flex gap-2">
          <img src="http://picsum.photos/seed/{{ rand(0, 100000) }}/50" alt="ticket-image">
          <div class="flex flex-col">
            <h1 class="font-bold text-xl whitespace-nowrap">{{ $activityTicket->activity->name }}</h1>
            <p class="text-gray-600">{{ $activityTicket['visitor_id'] }}</p>
          </div>
        </div>
      </div>
      <div class="p-2 flex justify-between items-center">
        <div class="flex gap-1">
          @for ($i = 0; $i < $activityTicket['visitor_count']; $i++)
          <div class="flex flex-col items-center text-sm">
            <p class="font-bold">O</p>
            <p class="font-bold -m-2.5">^</p>
            <p class="font-bold -m-2">|</p>
            <p class="font-bold -m-0.5">^</p>
          </div>
          @endfor
        </div>
        <h1 class="font-bold text-xl pr-4">{{ $activityTicket['total_price'] }} rf</h1>
      </div>
    </div>
    @endforeach
  </div>
</x-layout>