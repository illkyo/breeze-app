<x-layout>
  <x-slot:heading>
  Edit User
  </x-slot:heading>
  <form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="first_name">First Name</x-form-label>
            <div class="mt-2">
              <x-form-input id="first_name" name="first_name" value="{{ $user['first_name'] }}" required/>
              <x-form-error name="first_name"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="last_name">Last Name</x-form-label>
            <div class="mt-2">
              <x-form-input id="last_name" name="last_name" value="{{ $user['last_name'] }}" required/>
              <x-form-error name="last_name"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
              <x-form-input id="email" name="email" type="email" value="{{ $user['email'] }}" required/>
              <x-form-error name="email"/>
            </div>
          </x-form-field>

          <div class="sm:col-span-4">
            <label for="role-select" class="block text-sm/6 font-medium text-gray-900">Role</label>
            <select name="role" id="role-select">
              <option value="visitor">visitor</option>
              <option value="ferry_admin">ferry_admin</option>
              <option value="hotel_admin">hotel_admin</option>
              <option value="park_admin">park_admin</option>
              <option value="super_admin">super_admin</option>
            </select>
          </div>

        </div>

      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">

      <div class="flex items-center">
        <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
      </div>

      <div class="flex justify-center items-center gap-x-6">
        <a href="/users/{{ $user->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <div>
          <x-form-button>Update</x-form-button>
        </div>
      </div>

    </div>

  </form>

  <form method="POST" action="/users/{{ $user->id }}" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
  </form>
</x-layout>