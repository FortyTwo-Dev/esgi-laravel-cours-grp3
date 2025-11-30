<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        @if(session()->has('success'))
            <flux:callout icon="check-circle" variant="success" class="mb-4">
                <flux:callout.heading>{{ session('success') }}</flux:callout.heading>
            </flux:callout>
        @endif

        <a
            href="{{ route('projects.index') }}"
            class="italic text-slate-500"
        >← Retour aux projets</a>
        <div class="w-full flex justify-between gap-4">
            <h1>{{ $project->title }}</h1>
            <flux:button href="{{ route('projects.edit', $project->id) }}">Modifier</flux:button>
        </div>
        <p class="my-4">{{ $project->description }}</p>
        @if(isset($project['technologies']) && count($project['technologies']) > 0)
        <ul class="mt-4 list-disc list-inside">
            @foreach ($project['technologies'] as $technologie)
                <li>{{ $technologie }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</x-layout>
