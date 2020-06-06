@if(Session::has('danger'))
  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>Erro:</strong> {{ Session::get('danger') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @elseif(Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
      <strong>Perigo:</strong> {{ Session::get('warning') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @elseif(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      <strong>Sucesso:</strong> {{ Session::get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @elseif(Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
      <strong>Informacao:</strong> {{ Session::get('info') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif







