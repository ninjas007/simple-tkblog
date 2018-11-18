@if(count($errors) > 0)
	
	@foreach($errors->all() as $errors)
		<div class="alert alert-danger text-center">
			{!! $errors !!}
		</div>
	@endforeach

@endif

@if(session('info'))

	<div class="alert alert-success">
		{{session('info')}}
	</div>
	
@endif