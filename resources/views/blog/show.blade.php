@extends('blog.layouts.main')
@section('description', $post->excerpt)
@section('title', $post->title)
@section('content')
<article class="blog-post px-3 py-5 p-md-5">
		    <div class="container">
			    <header class="blog-post-header">
				    <h1 class="title mb-2">{{ $post->title }}</h1>
				    <div class="meta mb-3">
                        <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                        <span class="comment"><a href="#">{{ $post->categoryPost->name }}</a></span>
                    </div>
			    </header>
			    
			    <div class="blog-post-body">
                    <p class="text-justify">
						{!! $post->body !!}
					</p>
			    </div>
				
				<div class="blog-comments-section">
					<div id="disqus_thread"></div>
					<script>
					    /**
					     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT 
					     *  THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR 
					     *  PLATFORM OR CMS.
					     *  
					     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 
					     *  https://disqus.com/admin/universalcode/#configuration-variables
					     */
					    /*
					    var disqus_config = function () {
					        // Replace PAGE_URL with your page's canonical URL variable
					        this.page.url = PAGE_URL;  
					        
					        // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					        this.page.identifier = PAGE_IDENTIFIER; 
					    };
					    */
					    
					    (function() {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
					        var d = document, s = d.createElement('script');
					        
					        // IMPORTANT: Replace 3wmthemes with your forum shortname!
					        s.src = 'https://3wmthemes.disqus.com/embed.js';
					        
					        s.setAttribute('data-timestamp', +new Date());
					        (d.head || d.body).appendChild(s);
					    })();
					</script>
					<noscript>
					    Please enable JavaScript to view the 
					    <a href="https://disqus.com/?ref_noscript" rel="nofollow">
					        comments powered by Disqus.
					    </a>
					</noscript>
				</div><!--//blog-comments-section-->
				
		    </div><!--//container-->
	    </article>
@endsection