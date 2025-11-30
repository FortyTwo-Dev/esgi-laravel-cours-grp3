<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        <h1 class="mb-6">Créer un nouveau projet</h1>

        <form action="/projects" method="POST" class="space-y-6">
            @csrf
            <flux:input 
                label="Titre du projet" 
                placeholder="Ex : Mon nouveau projet" 
                required
                name="title"
                :value="old('title')"
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
            >{{ old('description') }}</flux:textarea>

            <flux:button type="submit">Enregistrer le projet</flux:button>
        </form>
    </div>
</x-layout>