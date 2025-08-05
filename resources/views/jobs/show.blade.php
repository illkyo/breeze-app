<x-layout>
  <x-slot:heading>
  Job
  </x-slot:heading>
  <h2 class="font-bold">{{ $job->title }}</h2>
  <p>
    This job pays {{ $job->salary }} rf per month.
  </p>
  @can('edit-job', $job)
  <div class="mt-4">
    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
  </div>
  @endcan
</x-layout>