@extends('includes.head')
@section('content')
<div class="container">
	<div class="text-center"><h1>Buat Tag</h1></div>
	<hr>
	<div class="col-md-8 col-md-offset-2">
		<div class="form-group">
			<form action="{{route('tag.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Buat Tag Baru...">
				</div>
				<button type="submit" class="btn btn-success">Save</button>
			</form>
		</div>
		<br>
		<div class="text-center"><h4 style="color: white">Semua Tag</h4></div>
		<table class="table table-striped table-hover">
			<thead>
				<tr class="info">
					<th>No.</th>
					<th>Nama</th>
					<th>Edit</th>
					<th>Delete</th>
					<th>Tanggal Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@foreach($tags as $tag)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$tag->name}}</td>
					<td><a href="#{{$tag->id}}" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a></td>
					<td><a href="#{{$tag->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a></td>
					<td>{{$tag->updated_at->diffForHumans()}}</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
		@foreach($tags as $tag)

		{{-- MODAL EDIT --}}
		<div class="modal fade" id="{{$tag->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button data-dismiss="modal" class="close">
						&times;
						</button>
						<h4 class="modal-title">Edit TagCategory</h4>
					</div>
					<div class="modal-body">
						<form action="{{route('tag.update', $tag->id)}}" method="post" role="form">
							{{csrf_field()}}
							{{method_field('put')}}
							<div class="form-group">
								<input type="text" class="form-control" name="name" id="nama" value="{{$tag->name}}">
							</div>
							<button type="submit" class="btn btn-primary btn-md">Save Changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		{{-- END MODAL EDIT --}}

		{{-- MODAL DELETE --}}
		<div class="modal fade" id="{{$tag->id}}-delete">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button data-dismiss="modal" class="close">
						&times;
						</button>
						<h4 class="modal-title">Edit Tag</h4>
					</div>
					<div class="modal-body">
						<form action="{{route('tag.destroy', $tag->id)}}" method="post" role="form">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<h5>Apakah anda ingin menghapus Tag <strong style="color: green">{{$tag->name}}</strong> ?</h5>
							<button type="submit" class="btn btn-primary btn-md">Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		{{-- END MODAL DELETE --}}
		@endforeach
	</div>
</div>
@endsection