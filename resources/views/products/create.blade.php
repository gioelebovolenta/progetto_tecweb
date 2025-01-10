<x-layout>
    <x-page-heading>Carica Materiale</x-page-heading>

    <x-forms.form method="POST" action="/products" enctype="multipart/form-data">
        <x-forms.input label="Materia" name="title" placeholder="es. Tecnologie Web" required />
        <x-forms.textarea label="Descrizione" name="description" rows="8" placeholder="es. Appunti di tecnologie web, corso seguito all'università di Ferrara con il prof..." required />
        <x-forms.input label="Prezzo" name="price" prefix="€" type="number" step="0.01" min="0" required />
        <x-forms.input label="Facoltà" name="subject" placeholder="es. Informatica" required />
        <x-forms.select label="Tipo" name="type" placeholder="Seleziona il tipo di materiale" required>
            <option value="Libri">Libro</option>
            <option value="Appunti">Appunti</option>
            <option value="Esami">Esame</option>
        </x-forms.select>
        <x-forms.file label="Carica PDF" name="file" required />
    
        <x-forms.divider />
    
        <x-forms.button type="submit">Pubblica</x-forms.button>
    </x-forms.form>
    
</x-layout>