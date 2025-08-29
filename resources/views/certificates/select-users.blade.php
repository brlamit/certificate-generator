<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Generate Certificates
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('certificate.generateMultiple') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="template_id" class="block text-sm font-medium text-gray-700">Select Certificate Type</label>
                            <select name="template_id" id="template_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Select Users</label>
                            @foreach ($users as $user)
                                <div>
                                    <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" id="user-{{ $user->id }}">
                                    <label for="user-{{ $user->id }}">{{ $user->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Generate Certificates
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>