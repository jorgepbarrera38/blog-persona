@extends('blog.layouts.main')
@section('title', $user->name)
@section('content')
    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">Recibe las últimas actualizaciónes</h2>
                <div class="intro">Bienvenido a mi blog. Suscríbete y recibe las últimas actualizaciónes a tu correo.</div>
                
			    <form action="{{ route('subcribers.store') }}" class="signup-form form-inline justify-content-center pt-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only" for="semail">Tu email</label>
                        <input maxlength="50" value="{{ old('email') }}" type="email" id="semail" name="email" class="form-control mr-md-1 semail" placeholder="Tu email">
                    </div>
                    <button type="submit" class="btn btn-primary">Suscríbete</button>
                </form>
                @if (session()->has('success'))
                    <p class="text-success">
                        {{ session('success') }}
                    </p>
                @endif
                @if ( $errors->first('email'))
                    <p class="text-danger">
                        {{ $errors->first('email') }}
                    </p>                            
                @endif
		    </div><!--//container-->
    </section>
    <section class="blog-list px-3 py-5 p-md-5">
		<div class="container">
            @foreach($posts as $post)
                <div class="item mb-5">
                    <div class="media">

                        <img class="mr-3 img-fluid post-thumb d-none d-md-flex" 
                            src="{{ asset('images') }}/{{ $post->image }}" alt="image">

                        <div class="media-body">
                            <h3 class="title mb-1">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <div class="meta mb-1">
                                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                <span class="date">
                                    Categoría: <a href="">{{ $post->categoryPost->name }}</a>
                                </span>
                            </div>
                            <div class="intro">
                                {{ substr($post->excerpt, 0, 200) }}...
                            </div>
                            <a class="more-link" href="{{ route('blog.show', $post->slug) }}">Leer más &rarr;</a>
                        </div><!--//media-body-->
                    </div><!--//media-->
                </div><!--//item-->
            @endforeach
            <span class="float-right">
                    {{ $posts->links() }}
            </span>
        </div>
    </section>
    
    <!--<nav class="blog-nav nav nav-justified my-5">
        <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
        <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
    </nav>-->
@endsection