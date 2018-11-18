@extends('includes.head')
@section('content')
<br>
<div class="container" style="margin-bottom: 100px;">
	<div class="row">
		<div class="col-md-9">
			<div class="row well">
			<h2 class="text-left">Tags {{$tags_find->name}}</h2>
			<hr>
				@foreach($tags_find->posts as $post)
				<div class="post-item">
					<div class="post-inner" style="background: black;">
						<div class="post-header clearfix">
							<div class="col-md-4">
								<a href=""><img src="{{asset('images/'.$post->image)}}" alt="" style="width: 100%; height: auto;"></a>
							</div>
							<div class="col-md-8" style="margin-top: -20px">
								<div class="detail">
									<a href="{{route('posts.show', $post->slug)}}" class="handle"><h3>{!! $post->title !!}</h3></a>
								</div>
								<div class="post-meta">
									<span>{!! date('Y M d , h:ia', strtotime($post->created_at)) !!}</span>
									<span>by</span>
									<span><a href="">Admin</a></span>
								</div>
								<div >
									<span class="share">
										<i class="fa fa-facebook"></i>
										<i class="fa fa-twitter"></i>
										<i class="fa fa-google"></i>
									</span>
									<div class="label label-success">Tags:</div>
									@foreach($post->tags as $tag)
									<span class="label label-primary">{{$tag->name}}</span>
									@endforeach
									<div class="content" style="margin-top: 15px;">
										{!! str_limit($post->content, 160)!!} <a href="{{route('posts.show', $post->slug)}}">...Readmore</a>

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