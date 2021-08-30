@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon icon-documents3 text-blue s-18"></i>PLANIFICADORES</h1>
@endsection
@section('maincontent')

@include('pages.planner.edit_assignment')

<div class="page height-full">

    {{-- alerts --}}
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6>ASIGNACIÓN</h6>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'assignment.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
                    @csrf
                        <div class="form-row m-2">
                            <div class="col-3">
                                {!! Form::label('lbl_user', 'Usuario', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('user_id',$users, null, ['class'=>'form-control r-0 light s-12 select2 p-4','id'=>'user_id', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                            <div class="col-3">
                                {!! Form::label('lbl_planner', 'Planificador', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('planner_id',$planners, null, ['class'=>'form-control r-0 light s-12 select2','id'=>'planner_id', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                            <div class="col-2">
                                {!! Form::label('since', 'Desde', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::date('since',null, ['class'=>'form-control r-0 light s-12',  'id'=>'since', 'onchange'=>'validate_date()']) !!}
                            </div>
                            <div class="col-2">
                                {!! Form::label('until', 'Hasta', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::date('until',null, ['class'=>'form-control r-0 light s-12',  'id'=>'until', 'onchange'=>'validate_date()']) !!}
                                <span class="text-danger m-0 p-0" id="span_until" style="display: none;font-size: 12px;">{{__('La fecha no puede ser menor que la inicial.')}}</span>
                            </div>
                            <div class="col-2 pt-1">
                                <button type="submit" class="btn btn-primary mt-4" id="save"><i class="icon-save mr-2"></i>Guardar</button>
                            </div>
						</div>
                    {!! Form::close() !!}
                    <div class="form-row mt-2">
                        <div id="table" class=" table-responsive">
                            <table id="mydatatable" class="table table-bordered table-hover table-sm"
                                        data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th><b>USUARIO</b></th>
                                            <th><b>PLANIFICADOR</b></th>
                                            <th><b>DESDE</b></th>
                                            <th><b>HASTA</b></th>
                                            <th><b>OPCIONES</b></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach ($assignments as $a)
                                        <tr class="tbody">
                                            <td>{{ $a->user->fullname ?? null }} {{ $a->user->last_name ?? null }}</td>
                                            <td>{{ $a->planner->descripcion ?? null }}</td>
                                            <td>{{ $a->since ?? null }}</td>
                                            <td>{{ $a->until ?? null }}</td>
                                            <td class="text-center">
                                            {!! Form::open(['route'=>['assignment.destroy',$a->id],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                                <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('assignment.edit',$a->id) }}', '{{ route('assignment.update',$a->id) }}')"
                                                    data-user_id="{{ $a->user_id }}" data-planner_id="{{ $a->planner_id }}">
                                                    <i class="icon-pencil text-info"></i>
                                                </a>
                                                <button class="btn btn-default btn-sm" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                        <i class="icon-trash-can3 text-danger"></i>
                                                </button>
                                            {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>

$('#update').on('show.bs.modal', function(event){
    let button = $(event.relatedTarget);
    let modal = $(this);
    $('#user').val(1)
})
function turno(sel){
        let str = $('option:selected', sel).data("description");
        let arr = str.split(',');
        for (var i=1; i <= 7; i++) {
            ;
            $('#turno_dia'+i).val(arr[i-1]);
        }
}

function validate_date(){
        let f1 = new Date($("#since").val());
        let f2 = new Date($("#until").val());

        if(f1 != '' || f2 != ''){

            if (f1 > f2){
                $("#span_until").show();
                $('#save').attr('disabled','disabled');
            }else{
                $("#span_until").hide();
                $('#save').removeAttr('disabled');
            }
        }
    }
</script>
@endsection
