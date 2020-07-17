@extends('layouts.app')
@section('title') Nova Reparti&ccedil;&atilde;o @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($repartition) ? 'Actualizar' : 'Nova' }} Reparti&ccedil;&atilde;o</h1>
    </div>

    <form action="{{ isset($repartition) ? route('repartitions.update', $repartition->id) : route('repartitions.store') }}" method="POST">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome da Unidade Organica"
                    value="{{ isset($repartition) ? $repartition->designation : '' }}"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="central">Central <span class="text-danger">*</span></label>
                    <select name="central" id="central" class="form-control form-control-sm">
                        <option value="2" 
                        @if(isset($repartition))
                            @if($repartition->central == 2)
                                selected
                            @endif
                        @endif
                        >-- Selecione o n&iacute;vel --</option>
                        <option value="1"
                        @if(isset($repartition))
                            @if($repartition->central == 1)
                                selected
                            @endif
                        @endif
                        >Sim</option>
                        <option value="0"
                        @if(isset($repartition))
                            @if($repartition->central == 0)
                                selected
                            @endif
                        @endif
                        >N&atilde;o</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="division_id">Departamento/Delega&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="hidden" name="hiddenDivision" id="hiddenDivision" value="{{ isset($repartition) ? $repartition->division_id : "" }}">
                    <select name="division_id" id="division_id" class="form-control form-control-sm">
                        <option value="">-- Selecione a divisao --</option>
                    </select>
                </div>
            </div>
            @if(isset($repartition))
            <div class="col-md-3">
                <div class="form-group">
                    <label for="employee_id">Chefe da Reparti&ccedil;&atilde;o</label>
                    <select name="employee_id" id="employee_id" class="form-control form-control-sm">
                        <option value="">-- Selecione um funcionario --</option>
                        @foreach($employees as $i)
                            <option value="{{ $i->id }}">{{ $i->name }} {{ $i->surname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-sm">
                    <span data-feather="save"></span> Salvar
                </button>
            </div>
        </div>
        @csrf
        @if(isset($repartition))
            @method('PUT')
        @endif
    </form>
@endsection
@section('scripts')
<script src="{{ asset('src/js/repartitions/create.js') }}"></script>
@endsection