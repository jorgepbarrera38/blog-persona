@extends('admin.layouts.main')
@section('title', 'Admin - Posts')
@section('content')
    <div class="card">
        <div class="card-header">
            Posts
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm float-right">Crear post</a>
        </div>
        <div class="card-body">

            @include('admin.partials.messages')
            
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <th>Título</th>
                        <th>Slug</th>
                        <th>Estado</th>
                        <th>Categoría</th>
                        <th nowrap>Fecha de creación</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->status == 'DRAFT' ? 'Borrador' : 'Publicado' }}
                                    <span class="badge {{ $post->status == 'DRAFT' ? 'badge-danger' : 'badge-success' }}">
                                    {{ $post->status == 'DRAFT' ? 'Borrador' : 'Publicado' }}
                                    </span>
                                </td>
                                <td>{{ $post->categoryPost->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td nowrap>
                                    <a href="javascript:document.getElementById('delete-post-{{ $post->slug }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form id="delete-post-{{ $post->slug }}" style="display:none" action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    @if ($post->status == 'DRAFT')
                                        <a href="javascript:document.getElementById('{{ $post->id }}-publish').submit()" class="btn btn-primary btn-sm">Publicar</a>
                                        <form id="{{ $post->id }}-publish" action="{{ route('posts.publish', $post->slug) }}" method="post">
                                            @method('put')
                                            @csrf
                                        </form>
                                    @else
                                        <a href="javascript:document.getElementById('{{ $post->id }}-unpublish').submit()" class="btn btn-primary btn-sm">Despublicar</a>
                                        <form id="{{ $post->id }}-unpublish" action="{{ route('posts.unpublish', $post->slug) }}" method="post">
                                            @method('put')
                                            @csrf
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection