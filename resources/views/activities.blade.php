<x-layout>
  <x-slot:heading>
  Activities
  </x-slot:heading>
  <h2>All Available Activities</h2>
  <ul>
    @foreach ($activities as $activity)
      <li>
        <a href="/activities/{{ $activity['id'] }}" class="hover:underline">
          <strong>{{ $activity['name'] }}</strong> - {{ $activity['price']}} >>
        </a>
      </li>
    @endforeach
  </ul>
</x-layout>