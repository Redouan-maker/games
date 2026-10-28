<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Permissies</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.permissions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe permissie</a>
        <table class="w-full mt-4 bg-white shadow-sm rounded">
            <thead><tr class="border-b"><th class="p-3 text-left">Naam</th><th class="p-3 text-left">Guard</th><th class="p-3">Acties</th></tr></thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr class="border-b">
                    <td class="p-3">{{ $permission->name }}</td>
                    <td class="p-3">{{ $permission->guard_name }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="text-blue-600">Bewerken</a>
                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline">
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