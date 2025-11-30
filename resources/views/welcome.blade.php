<x-layout>
    <p>Bienvenue sur la page d'accueil</p>

    <div
        class="mt-4 w-full bg-white rounded-xl shadow"
        x-data="{
            open: false,
            toggleAccordeon() {
                this.open = !this.open;
                console.log(this.open);
            }
        }"
    >
        <button
            type="button"
            class="btn btn-primary w-full"
            @click="toggleAccordeon()"
            @keydown.l.window="toggleAccordeon()"
        >
            Titre de l'accordéon
        </button>
        <div
            x-show="open"
            x-collapse
        >
            <div class="p-3">
                Contenu de l'accordéon
            </div>
        </div>
    </div>
</x-layout>
