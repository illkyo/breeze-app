<x-layout>
  <x-slot:heading>
  Create Ferry
  </x-slot:heading>
  <form method="POST" action="/ferries">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Create New Ferry</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please enter details below</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input id="name" type="text" name="name" class="block min-w-0 grow py-1.5 text-base text-gray-900 focus:outline-none sm:text-sm/6" />
              </div>

              @error('name')
                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
              @enderror

            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="price" class="block text-sm/6 font-medium text-gray-900">Price</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input id="price" type="text" name="price" class="block min-w-0 grow py-1.5 text-base text-gray-900 focus:outline-none sm:text-sm/6" />
              </div>

              @error('price')
                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
              @enderror

            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="capacity" class="block text-sm/6 font-medium text-gray-900">Capacity</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input id="capacity" type="text" name="capacity" class="block min-w-0 grow py-1.5 text-base text-gray-900 focus:outline-none sm:text-sm/6" />
              </div>

              @error('capacity')
                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
              @enderror

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