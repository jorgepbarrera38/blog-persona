@extends('admin.layouts.main')
@section('title', 'Admin - Categorías')
@section('content')
    <div class="card">
        <div class="card-header">
            Nueva categoría
        </div>
        <div class="card-body">
            @include('admin.partials.messages')
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection