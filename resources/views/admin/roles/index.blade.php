<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Rollen</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe rol</a>
        <table class="w-full mt-4 bg-white shadow-sm rounded">
            <thead><tr class="border-b"><th class="p-3 text-left">Rol</th><th class="p-3 text-left">Guard</th><th class="p-3">Acties</th></tr></thead>
            <tbody>
                @foreach($roles as $role)
                <tr class="border-b">
                    <td class="p-3">{{ $role->name }}</td>
                    <td class="p-3">{{ $role->guard_name }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-blue-600">Bewerken</a>
                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 ml-3" onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>