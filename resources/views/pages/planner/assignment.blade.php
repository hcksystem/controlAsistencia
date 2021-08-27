@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon icon-documents3 text-blue s-18"></i>PLANIFICADORES</h1>
@endsection
@section('maincontent')

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
                    <form action="{{ route('assignment.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-inline col-12 mt-4">
								{!! Form::label('planificador_semanal', 'Planificador', ['class'=>'col-form-label s-12 col-1']) !!}
                                <select name="planificador_id" id="planner_id" class="form-control r-0 light s-12 select_combo" data-placeholder="{{__('Seleccione')}}..." data-allow-clear="1"
                                required onchange="turno(this)">
                                        <option value=""></option>
                                        @foreach ($planners as $p)
                                        <option value="{{ $p->id }}" data-description="{{ $p->planificacion }}">{{ $p->descripcion }}</option>
                                        @endforeach
                                </select>

								<span class="dia1_span"></span>
							</div>
						</div>
                        <div class="form-row mt-2">
							<div class="form-group col-5 m-0 p-4" style="height: auto!important;overflow-y: auto !important;">
								
								{!! Form::label('name', 'Usuario', ['class'=>'col-form-label s-12']) !!}
								
                                    <select name="users[]" id="users" class="form-control r-0 light s-12 select_combo" data-placeholder="{{__('Buscar Cliente')}}..." data-allow-clear="1"
                                    multiple='multiple' style="overflow-y: auto !important;height: auto!important;">
                                        <option value=""></option>
                                        <option value="all">{{__('Seleccionar todos')}}</option>
                                        @foreach ($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->fullname }} {{ $u->first_name }}</option>
                                        @endforeach
                                    </select>
							</div>
                            <div class="form-group col-6 m-0 p-4">
                                <div class="row">
                                {!! Form::label('turno_dia1', 'Día 1', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia1',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia1', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row">
                                {!! Form::label('turno_dia2', 'Día 2', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia2',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia2', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row">
                                {!! Form::label('turno_dia3', 'Día 3', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia3',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia3', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row">
                                {!! Form::label('turno_dia4', 'Día 4', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia4',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia4', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row">
                                {!! Form::label('turno_dia5', 'Día 5', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia5',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia5', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row">
                                {!! Form::label('turno_dia6', 'Día 6', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia6',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia6', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row">
                                {!! Form::label('turno_dia7', 'Día 7', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('turno_dia7',$turns, null, ['class'=>'form-control r-0 light s-12',  'id'=>'turno_dia7', 'onclick'=>'inputClear(this.id)']) !!}
                                </div>
                                <div class="row text-right">
                                <div class="col-md-12 mt-4">
                                        <a href="{{ url()->previous() }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
                                        <button  type="submit" id="editar" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
                                </div>
                            </div>
                                
							</div>
                            
						</div>
                    </form>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
 $(function () {
        $("#users").css("height", parseInt($("#users option").length) * 20);
});


function turno(sel){
        let str = $('option:selected', sel).data("description");
        let arr = str.split(','); 
        for (var i=1; i <= 7; i++) {
            ;
            $('#turno_dia'+i).val(arr[i-1]);
        }
}  


$(document).ready(function() {

    $('.select_combo').select2({
        theme: "classic",
        width: '100%',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#users').on('select2:select', function(e) {
                switch (e.target.id) {
                    case 'users':
                    if(e.params.data.id == 'all') {
                        $('#users > option').prop('selected', 'selected');
                        $('#users option.all-class').prop('selected', false);
                        $('#users').trigger('change');
                        $('#users').attr('size', $('#users').find('option').length)
                    }
                    break;
                }
    });

});
</script>
@endsection