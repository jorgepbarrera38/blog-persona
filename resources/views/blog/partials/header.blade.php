<header class="header text-center">	    
	    <h1 class="blog-name pt-lg-4 mb-0"><a href="{{ route('blog.index') }}">Blog de {{ explode(' ', $user->name)[0] }}</a></h1>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >
				<div class="profile-section pt-3 pt-lg-0">
				    <img class="profile-image mb-3 rounded-circle mx-auto" src="{{ asset('profile') }}/{{ $user->photo }}" alt="image" >			
					
					<div class="bio mb-3">
						{{ $user->info }}	
					<br>
					<a target="_blank" href="https://jorge-alexis-paz.herokuapp.com/">Más acerca de mi</a></div><!--//bio-->
					<ul class="social-list list-inline py-3 mx-auto">
						@if ($user->youtube)
			            	<li class="list-inline-item"><a target="_blank" href="{{ $user->youtube }}"><i class="fab fa-youtube fa-fw"></i></a></li>
						@endif
						@if ($user->linkedin)
							<li class="list-inline-item"><a target="_blank" href="{{ $user->linkedin }}"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
						@endif
						@if ($user->github)
							<li class="list-inline-item"><a target="_blank" href="{{ $user->github }}"><i class="fab fa-github-alt fa-fw"></i></a></li>
						@endif
			        </ul><!--//social-list-->
			        <hr> 
				</div><!--//profile-section-->
				
				<!--<ul class="navbar-nav flex-column text-left">
					<li class="nav-item active">
					    <a class="nav-link" href="index.html"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="blog-post.html"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog Post</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="about.html"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
					</li>
				</ul>-->
				
				<!--<div class="my-2 my-md-3">
				    <a class="btn btn-primary" href="https://themes.3rdwavemedia.com/" target="_blank">Get in Touch</a>
				</div>-->
			</div>
		</nav>
    </header>