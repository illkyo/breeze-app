<x-layout>
  <x-slot:heading>
  Users
  </x-slot:heading>
  @can('create-user')
  <div class="mb-4">
    <x-button href="/users/create">Create User</x-button>
  </div>
  @endcan
  <div class="space-y-4">
    @foreach ($users as $user)
      <a href="/users/{{ $user['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg">
        <p>{{ $user['first_name'] }} {{ $user['last_name']}} - {{ $user['email'] }}</p>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $users->links() }}
  </div>
</x-layout>