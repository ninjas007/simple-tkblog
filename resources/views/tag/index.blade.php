@extends('includes.head')
@section('content')
<div class="container" style="margin-bottom: 80px;">
	<div class="text-center">
		<h3>All Tags({{$tags->total()}})</h3>
	</div>
	<hr>
	<ul>
		@foreach($tags as $tag)
		<div style="margin-bottom: 20px;">
			<div style="border-bottom: 1px solid grey">
				<h4><a href="{{route('tag.show', $tag->id)}}">{{$tag->name}}</a></h4>
				<p>{{$tag->posts->count()}} <i class="fa fa-list-alt"></i> Posts</p>
			</div>
			<small class="text-muted"><i class="fa fa-clock-o"></i>{{$tag->created_at->diffForHumans()}}</small>
		</div>
		@endforeach
	</ul>
	<div class="text-center">
		{{$tags->links()}}
	</div>
</div>
@endsection