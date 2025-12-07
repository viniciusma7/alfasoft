@props(['contact' => null])

<form
    method="POST"
    action="{{ $contact ? route('contacts.update', $contact) : route('contacts.store') }}"
    class="max-w-lg mx-auto bg-gray-50 border border-gray-200 p-8 rounded-xl shadow-sm space-y-6"
>
    @csrf
    @if($contact)
        @method('PUT')
    @endif

    <div class="text-center space-y-2">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ $contact ? 'Edit Contact' : 'Create Contact' }}
        </h2>
        <p class="text-sm text-gray-500">
            Fill in the information below to {{ $contact ? 'update' : 'create' }} the contact.
        </p>
    </div>

    <div class="space-y-1">
        <label for="name" class="block text-sm font-medium text-gray-700">
            Name
        </label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $contact?->name) }}"
            placeholder="Name"
            required
            minlength="5"
            maxlength="255"
            autocomplete="name"
            class="
                block w-full rounded-lg px-4 py-2 shadow-sm
                border @error('name') border-red-500 @else border-gray-300 @enderror
                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
            "
        >

        @error('name')
            <p class="text-xs text-red-500">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="space-y-1">
        <label for="number" class="block text-sm font-medium text-gray-700">
            Number
        </label>

        <input
            type="text"
            name="number"
            id="number"
            value="{{ old('number', $contact?->number) }}"
            placeholder="Only Numbers (9 chars)"
            required
            pattern="\d{9}"
            maxlength="9"
            autocomplete="tel"
            class="
                block w-full rounded-lg px-4 py-2 shadow-sm
                border @error('number') border-red-500 @else border-gray-300 @enderror
                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
            "
        >

        @error('number')
            <p class="text-xs text-red-500">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="space-y-1">
        <label for="email" class="block text-sm font-medium text-gray-700">
            E-mail
        </label>

        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email', $contact?->email) }}"
            placeholder="example@email.com"
            required
            maxlength="255"
            autocomplete="email"
            class="
                block w-full rounded-lg px-4 py-2 shadow-sm
                border @error('email') border-red-500 @else border-gray-300 @enderror
                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
            "
        >

        @error('email')
            <p class="text-xs text-red-500">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
        <a
            href="{{ route('contacts.index') }}"
            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition"
        >
            Back
        </a>

        <button
            type="submit"
            class="px-5 py-2 rounded-lg bg-indigo-600 text-white font-medium
                   hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
            {{ $contact ? 'Save Changes' : 'Add Contact' }}
        </button>
    </div>

</form>
