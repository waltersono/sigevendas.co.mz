@extends('layouts.app')
@section('title') {{ isset($employee) ? 'Actualizar' : 'Novo' }} Funcion&aacute;rio @endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('src/css/employees_create.css') }}"/>
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($employee) ? 'Actualizar' : 'Novo' }} Funcion&aacute;rio</h1>
    </div>

    <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="{{ isset($employee->photo_path) ? asset('storage/' . $employee->photo_path) : asset('src/img/user-icon.png')  }}" alt="Fotografia do Funcionario" id="employee_photo" >
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <input type="file" id="photo_file" name="photo_file"/>
            </div>
        </div>
    
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="name">Nome <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control form-control-sm"
                placeholder="Nome do funcionario" 
                value="{{ isset($employee) ? $employee->name : "" }}"/>
            </div>

            <div class="col-md-3">
                <label for="surname">Apelido <span class="text-danger">*</span></label>
                <input type="text" name="surname" id="surname" class="form-control form-control-sm"
                placeholder="Apelido do funcionario" 
                value="{{ isset($employee) ? $employee->surname : "" }}"/>
            </div>

            <div class="col-md-3">
                <label for="gender">Gen&eacute;ro <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control form-control-sm">
                    <option value="">-- Selecione o genero</option>
                    <option value="f"
                        @if(isset($employee))
                            @if($employee->gender == "f")
                                selected
                            @endif
                        @endif
                    >Feminino</option>
                    <option value="m"
                        @if(isset($employee))
                            @if($employee->gender == "m")
                                selected
                            @endif
                        @endif
                    >Masculino</option>
                    <option value="o"
                        @if(isset($employee))
                            @if($employee->gender == "o")
                                selected
                            @endif
                        @endif
                    >Outro</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="dob">Data de Nascimento <span class="text-danger">*</span></label>
                <input type="date" name="dob" id="dob" class="form-control form-control-sm"
                placeholder="Data de Nascimento do funcionario" 
                value="{{ isset($employee) ? $employee->dob : "" }}"/>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <label for="id_number">Numero de BI</label>
                <input type="text" name="id_number" id="id_number" class="form-control form-control-sm" 
                placeholder="Numero do Bilhete de Identidade"
                value="{{ isset($employee) ? $employee->id_number : "" }}"/>
            </div>

            <div class="col-md-3">
                <label for="nuit">NUIT</label>
                <input type="number" name="nuit" id="nuit" class="form-control form-control-sm" 
                placeholder="Numero Unico de Identificacao Tributaria"
                value="{{ isset($employee) ? $employee->nuit : "" }}"/>
            </div>

            <div class="col-md-3">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control form-control-sm" 
                placeholder="Email do Funcionario"
                value="{{ isset($employee) ? $employee->email : "" }}"/>
            </div>

            <div class="col-md-3">
                <label for="contact_1">Contacto Principal <span class="text-danger">*</span></label>
                <input type="text" name="contact_1" id="contact_1" class="form-control form-control-sm" 
                placeholder="Contacto Principal"
                value="{{ isset($employee) ? $employee->contact_1 : "" }}"/>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-md-3">
                <label for="contact_2">Contacto Alternativo</label>
                <input type="text" name="contact_2" id="contact_2" class="form-control form-control-sm" 
                placeholder="Contacto Alternativo"
                value="{{ isset($employee) ? $employee->contact_2 : "" }}"/>
            </div>

            <div class="col-md-3">
                <label for="career_id">Carreira <span class="text-danger">*</span></label>
                <select name="career_id" id="career_id" class="form-control form-control-sm">
                    <option value="">-- Selecione uma carreira --</option>
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}"
                            @if(isset($employee))
                                @if($employee->career_id == $career->id)
                                    selected
                                @endif
                            @endif
                        >{{ $career->designation }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="academicLevel_id">N&iacute;vel Acad&eacute;mico <span class="text-danger">*</span></label>
                <select name="academicLevel_id" id="academicLevel_id" class="form-control form-control-sm">
                    <option value="">-- Selecione um n&iacute;vel acad&eacute;mico --</option>
                    @foreach($academicLevels as $academicLevel)
                        <option value="{{ $academicLevel->id }}"
                            @if(isset($employee))
                                @if($employee->academicLevel_id == $academicLevel->id)
                                    selected
                                @endif
                            @endif
                        >{{ $academicLevel->designation }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="central">Central <span class="text-danger">*</span></label>
                <select name="central" id="central" class="form-control form-control-sm">
                    <option value="2">-- Selecione o nivel</option>
                    <option value="1"
                        @if(isset($employee))
                            @if($employee->central)
                                selected
                            @endif
                        @endif
                    >Sim</option>
                    <option value="0"
                        @if(isset($employee))
                            @if(!$employee->central)
                                selected
                            @endif
                        @endif
                    >Nao</option>
                </select>
            </div>

        </div>
        
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="division_id">Divis&atilde;o</label>
                <select name="division_id" id="division_id" class="form-control form-control-sm">
                    <option value="">-- Selecione uma divis&atilde;o</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="repartition_id">Reparti&ccedil;&atilde;o</label>
                <select name="repartition_id" id="repartition_id" class="form-control form-control-sm">
                    <option value="">-- Selecione uma reparti&ccedil;&atilde;o</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-sm">
                    <span data-feather="save"></span> Salvar
                </button>
            </div>
        </div>
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('src/js/employees/create.js') }}"></script>
@endsection