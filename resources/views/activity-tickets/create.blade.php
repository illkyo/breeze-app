<x-layout>
  <x-slot:heading>
  Activity Ticket - {{ $activity->name }}
  </x-slot:heading>
  <form method="POST" action="/activity-tickets/{{ $activity->id }}" x-data="{ price: '{{ $activity->price }}', visitor_count: '1' }">
    @csrf
    <input type="hidden" name="total_price" x-bind:value="`${price * visitor_count}`">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="visitor_count">How Many Persons?</x-form-label>
            <div class="mt-2">
              <x-form-input id="visitor_count" name="visitor_count" x-model="visitor_count" required/>
              <x-form-error name="visitor_count"/>
            </div>
          </x-form-field>

          <div class="sm:col-span-4">
            <h2>Total Price:</h2>
            <p class="font-bold text-indigo-500" x-text="`${price * visitor_count}`"></p>
            <x-form-error name="total_price"/>
          </div>

        </div>

      </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/ferries/{{ $activity->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <x-form-button>Buy</x-form-button>
    </div>
  </form>
</x-layout>