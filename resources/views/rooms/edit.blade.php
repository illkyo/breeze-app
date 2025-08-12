@php
  $number = substr($room['code'], 0, 2);
  $floor = substr($room['code'], -2);
@endphp

<x-layout>
  <x-slot:heading>
  Edit Room
  </x-slot:heading>
  <form method="POST" action="/rooms/{{ $room->id }}" x-data="{ number: '{{ $number }}', floor: '{{ $floor }}' }">
    @csrf
    @method('PATCH')
    <input type="hidden" name="code" x-bind:value="`${number.trim() + floor.trim()}`">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Edit Room: {{ $room->code }}</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please enter details below</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="number">Number</x-form-label>
            <div class="mt-2">
              <x-form-input id="number" name="number" x-model="number" required/>
              <x-form-error name="number"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="floor">Floor</x-form-label>
            <div class="mt-2">
              <x-form-input id="floor" name="floor" x-model="floor" required/>
              <x-form-error name="floor"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="price">Price</x-form-label>
            <div class="mt-2">
              <x-form-input id="price" name="price" value="{{ $room->price }}" required/>
              <x-form-error name="price"/>
            </div>
          </x-form-field>

          <div class="sm:col-span-4">
            <label for="booked_status" class="block text-sm/6 font-medium text-gray-900">Booked Status</label>
            <div class="mt-2">
               <input type="radio" id="true" name="booked_status" value="1" checked>
               <label for="true" class="text-sm/6 font-medium text-gray-900">True</label><br>
               <input type="radio" id="false" name="booked_status" value="0">
               <label for="false" class="text-sm/6 font-medium text-gray-900">False</label><br> 
            </div>
          </div>

        </div>
      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
      <div class="flex items-center">
        <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
      </div>

      <div class="flex justify-center items-center gap-x-6">
        <a href="/rooms/{{ $room->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <div>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Update
          </button>
        </div>
      </div>

    </div>
  </form>


  <form method="POST" action="/rooms/{{ $room->id }}" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
  </form>

</x-layout>