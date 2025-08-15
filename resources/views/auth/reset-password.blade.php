<x-layout>
  <x-slot:heading>
    Reset Password
  </x-slot:heading>
  <form method="POST" action="/reset-password">
    @csrf
    <div class="border-b border-gray-900/10 pb-8">
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="token">Token</x-form-label>
          <div class="mt-2">
            <x-form-input id="token" name="token" type="token" value="{{ request()->route('token') }}" required/>
            <x-form-error name="token"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="email">Email</x-form-label>
          <div class="mt-2">
            <x-form-input id="email" name="email" type="email" value="{{ request('email') }}" required/>
            <x-form-error name="email"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="password">Password</x-form-label>
          <div class="mt-2">
            <x-form-input id="password" name="password" type="password" required/>
            <x-form-error name="password"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="password_confirmation">Confirm Password</x-form-label>
          <div class="mt-2">
            <x-form-input id="password_confirmation" name="password_confirmation" type="password" required/>
            <x-form-error name="password_confirmation"/>
          </div>
        </x-form-field>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/login" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <x-form-button>Reset Password</x-form-button>
    </div>
  </form>
</x-layout>