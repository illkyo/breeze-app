<x-layout>
  <x-slot:heading>
  Create Activity
  </x-slot:heading>
  <form method="POST" action="/activities">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Create New Activity</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please enter details below</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input id="name" type="text" name="name" class="block min-w-0 grow py-1.5 text-base text-gray-900 focus:outline-none sm:text-sm/6" />
              </div>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="price" class="block text-sm/6 font-medium text-gray-900">Price</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input id="price" type="text" name="price" class="block min-w-0 grow py-1.5 text-base text-gray-900 focus:outline-none sm:text-sm/6" />
              </div>
            </div>
          </div>

          
          <div class="sm:col-span-4">
            <label for="type" class="block text-sm/6 font-medium text-gray-900">Type</label>
            <div class="mt-2">
               <input type="radio" id="event" name="type" value="event">
               <label for="event" class="text-sm/6 font-medium text-gray-900">Event</label><br>
               <input type="radio" id="show" name="type" value="show">
               <label for="show" class="text-sm/6 font-medium text-gray-900">Show</label><br>
               <input type="radio" id="ride" name="type" value="ride">
               <label for="ride" class="text-sm/6 font-medium text-gray-900">Ride</label> 
            </div>
          </div>
          
        </div>
      </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
</x-layout>