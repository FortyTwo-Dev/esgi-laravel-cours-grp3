<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        <a
            href="{{ route('projects.show', $project->id) }}"
            class="italic text-slate-500"
        >← Quitter l'édition</a>
        <h1 class="mb-6">Modifier le projet</h1>
        <form action="/projects/{{ $project->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <flux:input 
                label="Titre du projet" 
                placeholder="Ex : Mon nouveau projet" 
                required
                name="title"
                :value="old('title', $project->title)"
            />
            {{-- <flux:input
                label="URL du projet"
                placeholder="Ex: mon-nouveau-projet"
                required
                name="url"
            /> --}}
            <flux:textarea 
                label="Description du projet" 
                placeholder="Ex : Mon projet porte sur..."
                name="description"
            >{{ old('description', $project->description) }}</flux:textarea>

            <flux:button type="submit">Enregistrer le projet</flux:button>
        </form>

        <flux:separator class="my-8" />

        <form action="/projects/{{ $project->id }}" method="POST"
            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
            @csrf
            @method('DELETE')

            <flux:button variant="danger" type="submit">
                Supprimer
            </flux:button>
        </form>
    </div>
</x-layout>