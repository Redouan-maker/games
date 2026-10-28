<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Permissies per Rol</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.role-permissions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe koppeling</a>
        <table class="w-full mt-4 bg-white shadow-sm rounded">
            <thead><tr class="border-b"><th class="p-3 text-left">Rol</th><th class="p-3 text-left">Permissie</th><th class="p-3">Acties</th></tr></thead>
            <tbody>
                @foreach($rolePermissions as $rp)
                <tr class="border-b">
                    <td class="p-3">{{ $rp->role_name }}</td>
                    <td class="p-3">{{ $rp->permission_name }}</td>
                    <td class="p-3 text-center">
                        <form action="{{ route('admin.role-permissions.destroy', 0) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <input type="hidden" name="role_id" value="{{ $rp->role_id }}">
                            <input type="hidden" name="permission_id" value="{{ $rp->permission_id }}">
                            <button type="submit" class="text-red-600" onclick="return confirm('Ontkoppelen?')">Ontkoppelen</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>