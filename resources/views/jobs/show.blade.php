<x-layout>
  <x-slot:heading>
  Job
  </x-slot:heading>
  <h2 class="font-bold">{{ $job->title }}</h2>
  <p>
    This job pays {{ $job->salary }} rf per month.
  </p>
  <div class="mt-4">
    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
  </div>
</x-layout>