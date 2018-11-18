@extends('includes.head')
@section('content')
<br>
<div class="container" style="margin-bottom: 100px;">
	<div class="row">
		<div class="col-md-9">
			<div class="row well" style="background-color: #212121; color: white">
				@foreach($posts as $post)
				<div class="post-item">
					<div class="post-iner">
						<div class="post-header clearfix">
							<div class="col-md-4">
								<a href=""><img src="{{asset('images/'.$post->image)}}" alt="" style="width: 100%; height: 180px;"></a>
							</div>
							<div class="col-md-8" style="margin-top: -20px">
								<div class="detail">
									<a href="posts/{{$post->slug}}" class="handle"><h3>{!! $post->title !!}</h3></a>
								</div>
								<div class="post-meta">
									<span>{!! date('Y M d , h:ia', strtotime($post->created_at)) !!}</span>
									<span>by</span>
									<span><a href="">Admin</a></span>
								</div>
								<div >
									<span class="share">
										<!-- AddToAny BEGIN -->
										<div class="a2a_kit a2a_kit_size_20 a2a_default_style">
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
									</span>

									@foreach($post->tags as $tag)
										<span class="label label-primary">{{$tag->name}}</span>
									@endforeach
								<hr>

								<div class="content" style="margin-top: 15px;">
								{!! str_limit($post->content, 160). '... <a href="posts/'. $post->slug .'">Read More</a>'!!}
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				@endforeach
			</div>
		</div>
		@include('includes.sidebar')
	</div>
</div>
@endsection