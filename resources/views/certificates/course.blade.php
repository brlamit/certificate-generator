<form action="{{ route('certificate.generate') }}" method="POST">
    @csrf
    @php
        $users = \App\Models\User::where('id', '!=', auth()->id())->get();
    @endphp
    <label>Select User:</label>
    <select name="user_id" required>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <label>Select Template:</label>
    <select name="template_id" required>
        @foreach($templates as $template)
            <option value="{{ $template->id }}">{{ $template->name }}</option>
        @endforeach
    </select>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Generate Certificate</button>
</form>
