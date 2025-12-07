<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contacts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold">Contacts</h1>
                        <a href="{{ route('contacts.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Create Contact</a>
                    </div>
                    @if($contacts->isEmpty())
                        <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded mb-4">
                            Contacts is empty.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border rounded-lg shadow">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $contact->number }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                                <a href="{{ route('contacts.show', $contact) }}" class="text-blue-600 hover:underline">Show</a>
                                                <a href="{{ route('contacts.edit', $contact) }}" class="text-yellow-600 hover:underline">Edit</a>
                                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
