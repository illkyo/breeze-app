<x-layout>
  <x-slot:heading>
  Jobs
  </x-slot:heading>
  {{-- <h1>Hello from the Jobs page</h1> --}}
  <h2>Below are the jobs available</h2>
  <ul>
    @foreach ($jobs as $job)
      <li>
        <a href="/jobs/{{ $job['id'] }}" class="hover:underline">
          <strong>{{ $job['title'] }}</strong> - {{ $job['salary']}} >>
        </a>
      </li>
    @endforeach
  </ul>
</x-layout>