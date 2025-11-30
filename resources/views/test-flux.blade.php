<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        <h1 class="text-2xl font-bold mb-6">Test FluxUI</h1>

        <form class="space-y-6">
            <flux:input label="Username" description="This will be publicly displayed." />
            <flux:textarea
                label="Order notes"
                placeholder="No lettuce, tomato, or onion..."
            />
            <flux:select wire:model="industry" placeholder="Choose industry...">
                <flux:select.option>Photography</flux:select.option>
                <flux:select.option>Design services</flux:select.option>
                <flux:select.option>Web development</flux:select.option>
                <flux:select.option>Accounting</flux:select.option>
                <flux:select.option>Legal services</flux:select.option>
                <flux:select.option>Consulting</flux:select.option>
                <flux:select.option>Other</flux:select.option>
            </flux:select>
            <flux:checkbox checked label="Newsletter"/>
            <flux:button variant="primary">Button</flux:button>
        </form>
    </div>
</x-layout>