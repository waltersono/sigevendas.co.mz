@extends('layouts.app')
@section('title') Dashboard
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('/src/css/dashboard/index.css') }}">
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
  @foreach($stores as $i)
  <div class="col-md-3">
    <div class="card card-store">
      <div class="card-body">
        <p><a id="storeId" data-id="{{ $i->id }}" class="h6 font-weight-bold text-info">{{ $i->designation }}</a></p>
        <p class="h4 font-weight-bold">

          @if($i->total != "")
 
          {{ number_format($i->total, 2) }} MT

          @else

          {{ number_format(0, 2) }} MT


          @endif
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

@endsection
@section('scripts')
<script src="{{ asset('/src/js/dashboard/index.js') }}"></script>
@endsection