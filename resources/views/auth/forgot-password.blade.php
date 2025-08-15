<x-layout>
  <x-slot:heading>
    Forgot Password
  </x-slot:heading>
  <form method="POST" action="/forgot-password">
    @csrf
    <div class="border-b border-gray-900/10 pb-8">
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="email">Email</x-form-label>
          <div class="mt-2">
            <x-form-input id="email" name="email" type="email" required/>
            <x-form-error name="email"/>
          </div>
        </x-form-field>
      </div>
    </div>
    <a class="text-xs text-zinc-400 italic">Password reset link is sent to this email</a>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/login" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <x-form-button>Send</x-form-button>
    </div>
  </form>
</x-layout>