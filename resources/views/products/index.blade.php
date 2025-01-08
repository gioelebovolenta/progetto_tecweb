<x-layout>
    <div class="w-screen flex justify-between items-center pt-20 px-4">
        <div class="w-1/5">
            <img src="{{ Vite::asset('resources/images/guys_studying.png')}}" alt="guys_studying" class="w-full h-auto">
        </div>
            
        <div class="text-center flex-1">
            <h1 class="font-bold text-6xl">Che cosa studi oggi?</h1>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Cerca materiale" class="rounded-xl px-5 py-4 border hover:border-gray-400 transition-colors duration-300 w-full max-w-2xl" />
            </x-forms.form>
        </div>
            
        <div class="w-1/5">
            <img src="{{ Vite::asset('resources/images/books.png')}}" alt="Book" class="w-full h-auto">
        </div>
    </div>
</x-layout>
