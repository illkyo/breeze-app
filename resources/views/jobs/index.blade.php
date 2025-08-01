<x-layout>
  <x-slot:heading>
  Jobs
  </x-slot:heading>
  {{-- <h1>Hello from the Jobs page</h1> --}}
  <div>
    <x-button href="/jobs/create">Create Job</x-button>
  </div>
  <div class="space-y-4 mt-4">
    @foreach ($jobs as $job)
      <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
        <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
        <div>
          <strong>{{ $job['title'] }}</strong> - {{ $job['salary']}} >>
        </div>
      </a>
    @endforeach
  </div>
  <div class="mt-4">
    {{ $jobs->links() }}
  </div>
</x-layout>