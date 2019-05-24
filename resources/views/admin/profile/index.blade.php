@extends('admin.layouts.main')
@section('title', 'Perfil')
@section('content')
    <div class="card">
        <div class="card-header">
            Perfil
        </div>
        <div class="card-body">

            @include('admin.partials.messages')

            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Nombres:</label>
                    <input maxlength="100" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input maxlength="100" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="">Nombre de usuario:</label>
                    <input maxlength="100" type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                </div>
                <div class="form-group">
                    <label for="">Info:</label>
                    <textarea maxlength="200" class="form-control" name="info">{{ Auth::user()->info }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Imagen de perfil (Min:400, Max:650 - Cuadrada):</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Link a YouTube</label>
                    <input type="url" name="youtube" value="{{ Auth::user()->youtube }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Link a Linkedin</label>
                    <input type="url" name="linkedin" value="{{ Auth::user()->linkedin }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Link a GitHub</label>
                    <input type="url" name="github" value="{{ Auth::user()->github }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input maxlength="100" type="text" class="form-control" name="password" value="">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
            </form>

        </div>
    </div>
@endsection