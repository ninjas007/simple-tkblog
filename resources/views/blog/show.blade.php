@extends('includes.head')
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="post-item" style="margin-left: 0px;">
				<div class="post-inner">
					<div class="post-head clearfix">
						<div class="col-md-12">
							<div class="detail">
								<h2 class="handle">{{$posts->title}}</h2>
								<div class="post-meta">
									<div class="asker-meta">
										<span {{ date('j F Y', strtotime($posts->created_at)) }}></span>
										<span>by</span>
										<span><a href="">Admin</a></span>
									</div>
									<div class="share">
										<!-- AddToAny BEGIN -->
										<div class="a2a_kit a2a_kit_size_20 a2a_default_style">
										<a style="text-decoration: none; color: black;">Share:</a>
										<a class="a2a_button_facebook"></a>
										<a class="a2a_button_twitter"></a>
										<a class="a2a_button_google_plus"></a>
										<a class="a2a_button_linkedin"></a>
										</div>
										<script>
										var a2a_config = a2a_config || {};
										a2a_config.locale = "id";
										</script>
										<script async src="https://static.addtoany.com/menu/page.js"></script>
										<!-- AddToAny END -->
									</div>
									
									<div class="kategori">
										@if(empty($posts->category->name))
										<span class="label label-primary">Kategori :</span>
										<div class="label label-default">Tidak ada kategori</div>
										@else
										<span class="label label-primary">Kategori :</span>
										<div class="label label-default">{!! $posts->category->name !!}</div>
										@endif
									</div>
									<hr>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							@if(empty($posts->image))
							<div class="avatar_show"><a href="#"><img src="{{asset('images/default-img.gif')}}" alt=""></a></div>
							@else
							<div class="avatar_show"><a href="#"><img src="{{asset('images') .'/'. $posts->image}}" alt=""></a></div>
							@endif
							<br>
							<div class="tags">
								<span class="label label-primary">Tags:</span>
								@foreach($posts->tags as $tag)
								<span class="label label-success">{!! $tag->name !!}</span>
								@endforeach
							</div>
							<hr>
							<div class="post-content">
								<p>{!! $posts->content  !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- Comment --}}
			<hr>
			<h4>Comment:</h4>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#allcomment">All Comments</a></li>
				<li><a data-toggle="tab" href="#addcomment">Add New Comment</a></li>
				<li><a data-toggle="tab" href="#disquss">Disquss</a></li>
			</ul>
			
			<div class="tab-content">

				{{-- Tab All Comments --}}
				<div id="allcomment" class="tab-pane fade in active">
					<br>
					@if($posts->comments->isEmpty())
					<div class="text-center"><div class="post-inner">Tidak Ada Komentar</div></div>
					@else
					@foreach($posts->comments as $comment)
					<div class="post-item" style="margin-left: 0px;">
						<div class="post-inner">
							<div class="post-head clearfix">
								<div class="col-md-2">
									<img src="//a.disquscdn.com/1504815928/images/noavatar92.png" style="border-radius: 50%;" alt="">
								</div>
								<div class="col-md-10">
									<span><a href="">{{$comment->user->name}}</a> said:</span>
									<span class="pull-right" style="color: grey">{{$comment->created_at->diffForHumans()}}</span>
									<hr>
									<p>{{$comment->comment}}</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				{{-- End Tabs Comment --}}
				
				{{-- Tab New Comment --}}
				<div id="addcomment" class="tab-pane fade">
					<br>
					<form action="{{route('sendComment.store', $posts->id)}}" method="post">
						{{csrf_field()}}
						<label for="comment">Tulis Komentar:</label>
						<div class="form-group">
							<textarea type="submit" name="comment" id="comment" placeholder="Tulis Komentar Disini.." class="form-control" style="resize: none; height: 100px;">
							</textarea>
						</div>
						<button type="submit" class="btn btn-success">Kirim</button>
					</form>
				</div>
				{{-- End New Comment --}}
				
				{{-- Tab Disquss --}}
				<div id="disquss" class="tab-pane fade">
					<div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					/*
					var disqus_config = function () {
					this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					*/
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://gudangilmu-1.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					                            
				</div>
				{{-- End Tabs Disquess --}}
			
			</div>
			<hr>
			
		</div>
		@include('includes.sidebar')
	</div>
</div>
<br>
@endsection