@extends('includes.head')
@section('content')
<div class="container" style="margin-bottom: 80px;">
	<div class="text-center">
		<h3>All Kategori <small>({{$categories->count()}})</small></h3>
	</div>
	<hr>
	<ul>
		@foreach($categories as $category)
		<div style="margin-bottom: 20px;">
			<div style="border-bottom: 1px solid grey">
				<h4><a href="{{route('category.show', $category->id)}}">{{$category->name}}</a></h4>
				<p>{{$category->posts->count()}} <i class="fa fa-list-alt"></i> Posts</p>
			</div>
			<small class="text-muted"><i class="fa fa-clock-o"></i>{{$category->created_at->diffForHumans()}}</small>
		</div>
		@endforeach
	</ul>
	<div class="text-center">
		{{$categories->links()}}
	</div>
</div>
@endsection