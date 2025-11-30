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
            <div>
                <flux:button href="{{ route('projects.edit', $project->id) }}">Ajouter une tâche</flux:button>
                <flux:button href="{{ route('projects.edit', $project->id) }}">Modifier</flux:button>
            </div>
        </div>
        <p class="my-4">{{ $project->description }}</p>
        @if(isset($project['technologies']) && count($project['technologies']) > 0)
        <ul class="mt-4 list-disc list-inside">
            @foreach ($project['technologies'] as $technologie)
                <li>{{ $technologie }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('task.store', $project) }}" method="POST">
            @csrf
            @method('POST')
            <section class="w-full flex gap-1 items-end">
                <flux:input 
                    {{-- label="Tâche à faire"  --}}
                    placeholder="Faire le frontend avec vuejs" 
                    required
                    name="name"
                    :value="old('name')"
                    class="w-full"
                />
                <input type="hidden" name="project_id" value="{{ $project->id }}">
    
                <flux:button type="submit">Ajouter</flux:button>
            </section>
        </form>


        @unless ($tasks->isEmpty())
            @if ($tasks->every(fn($task) => $task->is_finished))
                <p class="text-center py-2">Toutes les tâches sont terminées !</p>
            @endif
        @endunless

        @forelse ($tasks as $task)
            @if (!$task->is_finished)
                <form method="POST" action="{{ route('task.update', ['project' => $project, 'task' => $task]) }}" class="flex justify-between py-2">
                    @csrf
                    @method('PATCH')
                    <p class="py-2">{{ $task->name }}</p>
                    <input type="hidden" name="is_finished" value="1">
                    <flux:button type="submit">Fini</flux:button>
                </form>
            @endif
            @if ($task->is_finished)
                <form method="POST" action="{{ route('task.update', ['project' => $project, 'task' => $task]) }}" class="flex justify-between py-2">
                    @csrf
                    @method('PATCH')
                    <p class="line-through py-2">{{ $task->name }}</p>
                    <input type="hidden" name="is_finished" value="0">
                    <flux:button type="submit">Non Fini</flux:button>
                </form>
             @endif
        @empty
            <p class="text-center py-2">Aucune tâche à faire</p>
        @endforelse

    </div>
</x-layout>
