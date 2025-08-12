@props(['name', 'price'])
<div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-300 rounded-lg w-72">
  <div class="relative p-2.5 h-44 overflow-hidden rounded-xl bg-clip-border">
    <img
      src="https://picsum.photos/200/300"
      alt="card-image"
      class="h-full w-full rounded-md"
    />
  </div>
  <div class="p-4">
    <div class="mb-2 flex items-center justify-between">
      <p class="text-slate-800 text-xl font-semibold">
        {{ $name }}
      </p>
      <p class="text-indigo-500 text-xl font-semibold">
        {{ $price }}
      </p>
    </div>
    <a class="w-full mt-4 justify-center font-semibold bg-gray-100 relative inline-flex items-center px-4 py-2 text-sm border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
      Get Ticket
    </a>
  </div>
</div>