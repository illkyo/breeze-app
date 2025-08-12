<x-layout>
  <x-slot:heading>
  Edit Ferry
  </x-slot:heading>
  <form method="POST" action="/ferries/{{ $ferry->id }}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Edit Ferry: {{ $ferry->name }}</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please enter details below</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="name">Name</x-form-label>
            <div class="mt-2">
              <x-form-input id="name" name="name" value="{{ $ferry->name }}" required/>
              <x-form-error name="name"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="price">Price</x-form-label>
            <div class="mt-2">
              <x-form-input id="price" name="price" value="{{ $ferry->price }}" required/>
              <x-form-error name="price"/>
            </div>
          </x-form-field>

          <div class="sm:col-span-4">
            <label for="from" class="block text-sm/6 font-medium text-gray-900">From</label>
            <div class="mt-2 flex gap-2">
               <input type="radio" id="male_city" name="from" value="male_city" checked>
               <label for="male_city" class="text-sm/6 font-medium text-gray-900">Male'</label><br>
               <input type="radio" id="grand_hotel" name="from" value="grand_hotel">
               <label for="grand_hotel" class="text-sm/6 font-medium text-gray-900">Grand Hotel</label><br>
               <input type="radio" id="breeze_island" name="from" value="breeze_island">
               <label for="breeze_island" class="text-sm/6 font-medium text-gray-900">Breeze Island</label> 
            </div>
          </div>
          
          <x-form-field>
            <x-form-label for="departure_time">Departure Time</x-form-label>
            <div class="mt-2">
              <x-form-input id="departure_time" name="departure_time" type="datetime-local" value="{{ $ferry['departure_time'] }}" required/>
              <x-form-error name="departure_time"/>
            </div>
          </x-form-field>

          <div class="sm:col-span-4">
            <label for="to" class="block text-sm/6 font-medium text-gray-900">To</label>
            <div class="mt-2 flex gap-2">
               <input type="radio" id="male_city" name="to" value="male_city" checked>
               <label for="male_city" class="text-sm/6 font-medium text-gray-900">Male'</label><br>
               <input type="radio" id="grand_hotel" name="to" value="grand_hotel">
               <label for="grand_hotel" class="text-sm/6 font-medium text-gray-900">Grand Hotel</label><br>
               <input type="radio" id="breeze_island" name="to" value="breeze_island">
               <label for="breeze_island" class="text-sm/6 font-medium text-gray-900">Breeze Island</label> 
            </div>
          </div>

          <x-form-field>
            <x-form-label for="arrival_time">Arrival Time</x-form-label>
            <div class="mt-2">
              <x-form-input id="arrival_time" name="arrival_time" type="datetime-local" value="{{ $ferry['arrival_time'] }}" required/>
              <x-form-error name="arrival_time"/>
            </div>
          </x-form-field>

        </div>
      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
      <div class="flex items-center">
        <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
      </div>

      <div class="flex justify-center items-center gap-x-6">
        <a href="/ferries/{{ $ferry->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <div>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Update
          </button>
        </div>
      </div>

    </div>
  </form>


  <form method="POST" action="/ferries/{{ $ferry->id }}" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
  </form>

</x-layout>