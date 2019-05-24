@extends('admin.layouts.main')
@section('title', 'Admin - Crear post')
@section('content')
    <div class="card">
        <div class="card-header">
            Nuevo post
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                
                @csrf

                <div class="form-group">
                    <label for="">Título</label>
                    <input maxlength="50" type="text" class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}">
                    @if ($errors->first('title'))
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Extracto</label>
                    <textarea maxlength="200" type="text" class="form-control {{ $errors->first('excerpt') ? 'is-invalid' : '' }}" name="excerpt">{{ old('excerpt') }}</textarea>
                    @if ($errors->first('excerpt'))
                        <p class="text-danger">{{ $errors->first('excerpt') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Contenido</label>
                    <!--class="form-control {{ $errors->first('body') ? 'is-invalid' : '' }}"-->
                    <textarea maxlength="10" id="editor1" name="body">{{ old('body') }}</textarea>
                    @if ($errors->first('body'))
                        <p class="text-danger">{{ $errors->first('body') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Publicar inmediátamente</label>
                    <input type="checkbox" name="status">
                </div>

                <div class="form-group">
                    <label for="">Categoría</label>
                    <select name="category_post_id" class="form-control {{ $errors->first('category_post_id') ? 'is-invalid' : '' }}">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_post_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('category_post_id'))
                        <p class="text-danger">{{ $errors->first('category_post_id') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Imagen (Min:200x200, Max:500x500 - Cuadrada)</label>
                    <input type="file" name="image" class="form-control {{ $errors->first('image') ? 'is-invalid' : '' }}">
                    @if ($errors->first('image'))
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                <a href="{{ route('posts.index') }}" class="btn btn-danger btn-sm">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection