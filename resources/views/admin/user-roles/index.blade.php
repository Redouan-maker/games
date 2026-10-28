<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Rollen per Gebruiker</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.user-roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe koppeling</a>
        <table class="w-full mt-4 bg-white shadow-sm rounded">
            <thead><tr class="border-b"><th class="p-3 text-left">Gebruiker</th><th class="p-3 text-left">E-mail</th><th class="p-3 text-left">Rol</th><th class="p-3">Acties</th></tr></thead>
            <tbody>
                @foreach($userRoles as $ur)
                <tr class="border-b">
                    <td class="p-3">{{ $ur->user_name }}</td>
                    <td class="p-3">{{ $ur->user_email }}</td>
                    <td class="p-3">{{ $ur->role_name }}</td>
                    <td class="p-3 text-center">
                        <form action="{{ route('admin.user-roles.destroy', 0) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <input type="hidden" name="user_id" value="{{ $ur->user_id }}">
                            <input type="hidden" name="role_id" value="{{ $ur->role_id }}">
                            <button type="submit" class="text-red-600" onclick="return confirm('Ontkoppelen?')">Ontkoppelen</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>