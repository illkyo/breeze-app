<x-layout>
  <x-slot:heading>
  Ferries
  </x-slot:heading>
  <ul>
    @foreach ($ferries as $ferry)
      <li>
        <a href="/ferries/{{ $ferry['id'] }}" class="hover:underline">
          <strong>{{ $ferry['name'] }}</strong> - {{ $ferry['price']}} >>
        </a>
      </li>
    @endforeach
  </ul>
</x-layout>