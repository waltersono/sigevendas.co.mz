@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
		  <strong>Erro:</strong> {{ $error }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endforeach
@endif