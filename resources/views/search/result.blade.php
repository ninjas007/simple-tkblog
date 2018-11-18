@extends('includes.head')
@section('content')

	@if(count($posts) > 0)
	<div class="container" style="margin-bottom: 10%; margin-top: 20px;">
		<div class="text-center">
			<h1>Hasil Pencarian</h1>
		</div>
		<hr>
		@foreach($posts->all() as $post)
			<div class="post-item">
				<div class="post-inner">
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
								</span>
								<div class="label label-default">Kategori:</div>
								@if(!empty($post->category->name))
								<span class="label label-primary">{{$post->category->name}}</span>
								@else
								<span class="label label-primary">Tidak Ada Kategori</span>
								@endif
								<br>
								<div class="label label-success">Tags:</div>
								@foreach($post->tags as $tag)
								<span class="label label-primary">{{$tag->name}}</span>
								@endforeach
								<div class="content" style="margin-top: 15px;">
									{!! str_limit($post->content, 300)!!} <a href="{{route('posts.show', $post->slug)}}">...Readmore</a>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	@else
	<div class="container" style="margin-bottom: 25%; margin-top: 20px; ">
		<div class="text-center">
			<h1>--Hasil Pencarian--</h1>
		</div>
		<hr>
		<div class="text-center">
			<div class="post-inner">
				<h3>Tidak Ditemukan</h3>
			</div>
		</div>
	</div>
	@endif

@endsection