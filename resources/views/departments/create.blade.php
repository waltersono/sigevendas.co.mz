@extends('layouts.app')
@section('title') Novo Departamento @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($department) ? 'Actualizar' : 'Novo' }} Departamento</h1>
    </div>

    <form action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome do Departamento"
                    value="{{ isset($department) ? $department->designation : '' }}"/>
                </div>
            </div>
            @if(isset($department))
            <div class="col-md-6">
                <div class="form-group">
                    <label for="head_of_departament_id">Chefe do Departamento</label>
                    <select name="head_of_departament_id" id="head_of_departament_id" class="form-control form-control-sm">
                        <option value="">-- Selecione um funcionario --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                @if(isset($department))
                                    @if($department->head_of_department_id == $employee->id)
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
        @if(isset($department))
            @method('PUT')
        @endif
    </form>
@endsection
