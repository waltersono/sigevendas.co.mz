@extends('layouts.app')
@section('title') @endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('src/css/reports/academicLevelInformationReport.css') }}">
@endsection
@section('content')



<div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-striped table-sm" id="reportsTable1">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>N&iacute;vel</th>
                    <th>Curso</th>
                    <th>Sector</th>
                </thead>
                <tbody>
                    <?php $cont = 0;?>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection