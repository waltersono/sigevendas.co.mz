@extends('layouts.app')
@section('title') Novo Curso @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($course) ? 'Actualizar' : 'Novo' }} Curso</h1>
    </div>

    <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="institution_id">Instituti&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <select name="institution_id" id="institution_id" class="form-control form-control-sm">
                        <option value="">-- Selecione a instituti&ccedil;&atilde;o</option>
                        @foreach($institutions as $i)
                            <option value="{{ $i->id }}"
                                @if(isset($course))
                                    @if($course->institution_id == $i->id)
                                        selected
                                    @endif
                                @endif
                            >{{ $i->designation }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome da curso"
                    value="{{ isset($course) ? $course->designation : '' }}"/>
                </div>
            </div>

            <div class="col-md-4">
                <label for="academicLevel_id">N&iacute;vel Acad&eacute;mico <span class="text-danger">*</span></label>
                <select name="academicLevel_id" id="academicLevel_id" class="form-control form-control-sm">
                    <option value="">-- Selecione o n&iacute;vel acad&eacute;mico</option>
                    @foreach($academicLevels as $i)
                        <option value="{{ $i->id }}"
                                @if(isset($course))
                                    @if($course->academicLevel_id == $i->id)
                                        selected
                                    @endif
                                @endif
                        >{{ $i->designation }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="type">Tipo <span class="text-danger">*</span></label>
                <select name="type" id="type" class="form-control form-control-sm">
                    <option value="">-- Selecione o tipo</option>
                    <option value="short"
                        @if(isset($course))
                            @if($course->type == 'short')
                                selected
                            @endif
                        @endif
                    >Curto</option>
                    <option value="long"
                        @if(isset($course))
                            @if($course->type == 'long')
                                selected
                            @endif
                        @endif
                    >Longo</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="duration">Dura&ccedil;&atilde;o <span class="text-danger">*</span></label>
                <input type="number" name="duration" id="duration" class="form-control form-control-sm"
                placeholder="Duracao do curso em dias"
                value="{{ isset($course) ? $course->duration : '' }}">
            </div>

            <div class="col-md-4">
                <label for="content">Conteudo</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control form-control-sm">
                    @if(isset($course))
                        {{ $course->content }}
                    @endif
                </textarea>
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
        @if(isset($course))
            @method('PUT')
        @endif
    </form>
@endsection
