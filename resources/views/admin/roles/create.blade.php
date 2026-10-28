<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Nieuwe Rol</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.roles.store') }}" method="POST" class="bg-white p-6 shadow-sm rounded max-w-lg">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Naam</label>
                <input type="text" name="name" class="border-gray-300 rounded-md w-full mt-1" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
        </form>
    </div>
</x-app-layout>