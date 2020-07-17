@extends('layouts.app')
@section('title') Nova Unidade Org&acirc;nica @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($organicUnity) ? 'Actualizar' : 'Nova' }} Unidade Org&acirc;nica</h1>
    </div>

    <form action="{{ isset($organicUnity) ? route('organicUnities.update', $organicUnity->id) : route('organicUnities.store') }}" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome da Unidade Organica"
                    value="{{ isset($organicUnity) ? $organicUnity->designation : '' }}"/>
                </div>
            </div>
            @if(isset($organicUnity))
            <div class="col-md-4">
                <div class="form-group">
                    <label for="general_manager_id">Director Geral</label>
                    <select name="general_manager_id" id="general_manager_id" class="form-control form-control-sm">
                        <option value="">-- Selecione um funcionario --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                @if(isset($organicUnity))
                                    @if($employee->id == $organicUnity->general_manager_id)
                                    selected
                                    @endif
                                @endif
                            >{{ $employee->name }} {{ $employee->surname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="deputy_director_id">Director Adjunto</label>
                    <select name="deputy_director_id" id="deputy_director_id" class="form-control form-control-sm">
                        <option value="">-- Selecione um funcionario --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                @if(isset($organicUnity))
                                    @if($employee->id == $organicUnity->deputy_director_id)
                                    selected
                                    @endif
                                @endif
                            
                            >{{ $employee->name }} {{ $employee->surname }}</option>
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
        @if(isset($organicUnity))
            @method('PUT')
        @endif
    </form>
@endsection
