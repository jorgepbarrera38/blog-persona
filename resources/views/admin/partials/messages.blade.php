
@if (session()->has('success') || session()->has('error') || $errors->any())
    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }}">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @elseif (session('success'))
            {{ session('success') }}
        @else
            {{ session('error') }}
        @endif
    </div>
@endif