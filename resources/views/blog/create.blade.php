@extends('includes.head')
@section('content')
<br>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="well">
			
			<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="text-center"><h4>Create Post</h4></div>
				<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" class="form-control" name="title" placeholder="Input Title Post Here..." value="">
				</div>
				{{-- FORM TAMBAH CATEGORY --}}
				<div class="form-group">
					<label for="category_id">Category:</label>
					<select name="category_id" class="form-control">
						<option value="" class="disabled selected">--Pilih Kategori--</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				{{-- END TAMBAH KATEGORI --}}
				{{-- FORM TAMBAH TAG --}}
				<div class="form-group">
					<label for="tags">Tag:</label>
					<select name="tags[]" multiple="multiple" class="form-control selectpicker">
						<option value="" class="disabled selected">--Pilih Tag--</option>
						@foreach($tags as $tag)
						<option value="{{$tag->id}}">{{$tag->name}}</option>
						@endforeach
					</select>
				</div>
				{{-- END TAMBAH TAG --}}
				{{-- FORM UPLOAD IMAGE --}}
				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" class="form-control" name="image">
				</div>
				<div class="form-group">
					<img src="" alt="" style="width: 100%;">
				</div>
				{{-- END FORM UPLOD IMAGE --}}
				
				{{-- FORM CONTENT --}}
				<div class="form-group">
					<label for="content">Content:</label>
					<textarea type="text" class="form-control" name="content" id="content" placeholder="Input Content Post Here..." style="height: 300px; resize: none" ></textarea>
				</div>
				{{-- END CONTENT --}}
				<button type="submit" class="btn btn-success btn-md">Save</button>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
@endsection
@section('ckeditor')
<script>
	CKEDITOR.replace( 'content' );
</script>
@endsection