<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Nieuwe Permissie</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.permissions.store') }}" method="POST" class="bg-white p-6 shadow-sm rounded max-w-lg">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Naam</label>
                <input type="text" name="name" class="border-gray-300 rounded-md w-full mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Guard</label>
                <input type="text" value="web (automatisch)" disabled class="border-gray-300 bg-gray-100 rounded-md w-full mt-1">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
        </form>
    </div>
</x-app-layout>