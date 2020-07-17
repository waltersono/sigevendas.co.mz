@extends('layouts.app')
@section('title') Reparti&ccedil;&atilde;o @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Reparti&ccedil;&atilde;o</h2>
    </div>
    <table class="table">
        <thead>
            <th>Descri&ccedil;&atilde;o</th>
            <th>Valor</th>
        </thead>
        <tbody>
            @foreach($table as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
