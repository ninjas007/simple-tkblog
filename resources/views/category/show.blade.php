@extends('includes.head')
@section('content')
<br>
<div class="container" style="margin-bottom: 100px;">
	<div class="row">
		<div class="col-md-9">
			<div class="row well">
		<h3 class="text-left">Category {{$categories_find->name}}</h3>
		<hr>
				@foreach($categories_find->posts as $post)
				<div class="post-item">
					<div class="post-iner">
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
								
								<span class="label label-success">Kategori:</span>
								<span class="label label-primary"> {{$categories_find->name}}</span>

								<div class="content" style="margin-top: 15px;">
									{!! str_limit($post->content, 160).'...'!!} <a href="{{route('posts.show', $post->slug)}}">Readmore</a>
									
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