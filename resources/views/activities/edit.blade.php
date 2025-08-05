<x-layout>
  <x-slot:heading>
  Edit Activity
  </x-slot:heading>
  <form method="POST" action="/activities/{{ $activity->id }}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Edit Activity: {{ $activity->name }}</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please enter details below</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="name">Name</x-form-label>
            <div class="mt-2">
              <x-form-input id="name" name="name" value="{{ $activity->name }}" required/>
              <x-form-error name="name"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="price">Price</x-form-label>
            <div class="mt-2">
              <x-form-input id="price" name="price" value="{{ $activity->price }}" required/>
              <x-form-error name="price"/>
            </div>
          </x-form-field>

          <div class="sm:col-span-4">
            <label for="type" class="block text-sm/6 font-medium text-gray-900">Type</label>
            <p class="mt-2 text-sm font-bold">current: {{ $activity->type }}</p>
            <div class="mt-2">
               <input type="radio" id="event" name="type" value="event" checked>
               <label for="event" class="text-sm/6 font-medium text-gray-900">Event</label><br>
               <input type="radio" id="show" name="type" value="show">
               <label for="show" class="text-sm/6 font-medium text-gray-900">Show</label><br>
               <input type="radio" id="ride" name="type" value="ride">
               <label for="ride" class="text-sm/6 font-medium text-gray-900">Ride</label> 
            </div>
          </div>

        </div>
      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
      <div class="flex items-center">
        <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
      </div>

      <div class="flex justify-center items-center gap-x-6">
        <a href="/activities/{{ $activity->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <div>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Update
          </button>
        </div>
      </div>

    </div>
  </form>


  <form method="POST" action="/activities/{{ $activity->id }}" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
  </form>

</x-layout>