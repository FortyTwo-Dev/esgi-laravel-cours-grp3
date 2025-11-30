<x-layout>
    <h1>Bienvenue sur la page Projects</h1>

    @if(session()->has('success'))
    <flux:callout icon="check-circle" variant="success">
        <flux:callout.heading>{{ session('success') }}</flux:callout.heading>
    </flux:callout>
    @endif

    <ul class="mt-4 list-disc list-inside">
        @foreach ($projects as $project)
            <li><a href="{{ route('projects.show', $project->id) }}" class="underline text-blue-800">{{ $project['title'] }}</a></li>
        @endforeach
    </ul>
</x-layout>
