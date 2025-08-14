<x-layout>
  <x-slot:heading>
  User ID - {{ $user['id'] }}
  </x-slot:heading>
  <p class="font-bold">Name: <span class="font-medium">{{ $user['first_name'] }} {{ $user['last_name'] }}</span></p>
  <p class="font-bold">Email: <span class="font-medium">{{ $user['email'] }}</span></p>
  <p class="font-bold">Role: <span class="font-medium">{{ $user['role'] }}</span></p>
  <div class="mt-4">
    @can('edit-user')
    <x-button href="/users/{{ $user->id }}/edit">Edit User</x-button>
    @endcan
  </div>
</x-layout>