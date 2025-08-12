<x-layout>
  @guest
    <x-slot:heading>Hello!</x-slot:heading>
  @endguest
  @auth
    <x-slot:heading>Welcome {{ Auth::user()['first_name'] }}</x-slot:heading>
  @endauth
  <section class="flex flex-col items-start">
    <h1 class="font-bold border-b-4 border-indigo-500">Featured Events<h1>
    <div class="flex gap-2">
      @foreach ($activities as $activity)
        <x-card name="{{ $activity->name }}" price="{{ $activity->price }}" />
      @endforeach
    </div>
  </section>
</x-layout>