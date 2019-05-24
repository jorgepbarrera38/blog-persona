@extends('admin.layouts.main')
@section('title', 'Admin - Categorías')
@section('content')
    <div class="card">
        <div class="card-header">
            Categorías
            <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm float-right">Crear categoría</a>
        </div>
        <div class="card-body">
            
            @include('admin.partials.messages')

            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>

                                    <a href="{{ route('categories.edit', $category->slug) }}" 
                                        class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <a href="javascript:document.getElementById('delete-category-{{ $category->slug }}').submit()" 
                                        class="btn btn-danger btn-sm">
                                        Eliminar
                                    </a>

                                    <form style="display:none" id="delete-category-{{ $category->slug }}" 
                                        action="{{ route('categories.destroy', $category->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection