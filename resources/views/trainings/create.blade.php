@extends('layouts.app')
@section('title') {{ isset($training) ? 'Actualizar' : 'Nova' }} Forma&ccedil;&atilde;o  @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($training) ? 'Actualizar' : 'Nova' }} Forma&ccedil;&atilde;o</h1>
    </div>

    <form action="{{ isset($training) ? route('trainings.update', $training->id) : route('trainings.store') }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="course_id">Cursos <span class="text-danger">*</span></label>
                    <select type="text" name="course_id" id="course_id" class="form-control form-control-sm">
                        <option value="">-- Selecione o curso --</option>
                        @foreach($courses as $i)
                            <option value="{{ $i->id }}"
                                @if(isset($training))
                                    @if($training->course_id == $i->id)
                                        selected
                                    @endif
                                @endif
                            >{{ $i->designation }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <label for="start_date">Data de inicio</label>
                <input type="date" name="start_date" id="end_date" class="form-control form-control-sm" 
                placeholder="Data de inicio da formacao"
                value="{{ isset($training) ? $training->start_date : '' }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="central">Central</label>
                <select name="central" id="central" class="form-control form-control-sm">
                    <option value="2">-- Selecione o n&iacute;vel --</option>
                    <option value="1">Sim</option>
                    <option value="0">N&atilde;o</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="division_id">Departamento/Delega&ccedil;&atilde;o</label>
                <input type="hidden" name="hiddenDivision" id="hiddenDivision" value="{{ isset($repartition) ? $repartition->division_id : "" }}">
                <select name="division_id" id="division_id" class="form-control form-control-sm">
                    <option value="">-- Selecione o departamento/delega&ccedil;&atilde;o --</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="employee_id">Funcion&aacute;rio</label>
                <select name="employee_id" id="employee_id" class="form-control form-control-sm">
                    <option value="">-- Selecione um funcion&aacute;rio --</option>
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-sm">
                    <span data-feather="save"></span> Salvar
                </button>
            </div>
            <div class="col-md-6">
                <button type="button" id="add" class="btn btn-warning btn-sm float-right"><span data-feather="plus"></span> Adicionar</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Funcion&aacute;rio participantes</h3>
                <table class="table table-striped table-sm" id="employeesTable">
                    <thead>
                        <th>OR</th>
                        <th>Nome</th>
                        <th>Ac&ccedil;&atilde;o</th>
                    </thead>
                    <tbody>
                        @if(isset($trainings))
                            <?php $cont = 0;?>
                            @foreach($trainings as $t)
                                <tr>
                                    <td data-id="{{ $t->employee_id }}">
                                        <input type="hidden" name="employees[]" value="{{ $t->employee_id }}">
                                        {{ ++$cont }}
                                    </td>
                                    <td>{{ $t->name }} {{ $t->surname }}</td>
                                    <td>
                                        <input type='hidden' id='hiddenFinished' name='hiddenFinished[]' value="{{ $t->finished }}"/>
                                        @if($t->finished)
                                            <a class='btn btn-success btn-sm' id='finished'>Terminou</a>
                                        @else
                                            <a class='btn btn-info btn-sm' id='finished'>Em progresso</a>
                                        @endif
                                        <a id='remove' class='btn btn-danger btn-sm'>Remover</
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @csrf
        @if(isset($training))
            @method('PUT')
        @endif
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('src/js/trainings/create.js') }}"></script>

@endsection
