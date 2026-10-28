<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Rol aan Gebruiker koppelen</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.user-roles.store') }}" method="POST" class="bg-white p-6 shadow-sm rounded max-w-lg">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Gebruiker</label>
                <select name="user_id" class="border-gray-300 rounded-md w-full mt-1">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Rol</label>
                <select name="role_id" class="border-gray-300 rounded-md w-full mt-1">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Koppeling opslaan</button>
        </form>
    </div>
</x-app-layout>