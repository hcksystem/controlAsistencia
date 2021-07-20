<!-- Modal Create-->
{!! Form::open(['route'=>'encomiendas.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon-person"></i> Agregar Nueva Encomienda</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-4">
						@if(@Auth::user()->hasRole('mayor'))
						<div class="form-group m-0" id="modulo_group">
							
							{!! Form::label('lbledificio', 'Edificio', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('edificio', $edificios, session('idEdificio'), ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'disabled']) !!}
							{!! Form::hidden('edificio_id', session('idEdificio'), ['class'=>'form-control r-0 light s-12']) !!}
						</div>
						@elseif(@Auth::user()->hasRole('admin'))
							{!! Form::label('lbledificio', 'Edificio', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('edificio', $edificios, session('idEdificio'), ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'disabled']) !!}
							{!! Form::hidden('edificio_id', session('idEdificio'), ['class'=>'form-control r-0 light s-12']) !!} 
						@else
							{!! Form::label('lbledificio', 'Edificio', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('edificio_id', $edificios, null, ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'onclick'=>'inputClear(this.id)']) !!}
							
						@endif  
					</div>
					<div class="col-md-4">
						<div class="form-group m-0 has-feedback" id="campo_group">
							
						{!! Form::label('creado_por', __('Usuario'), ['class'=>'col-form-label s-12']) !!}
                        {!! Form::text('creado_name', Auth::user()->fullname , ['class'=>'form-control r-0 light s-12', 'id'=>'creado_name','readonly'=>'true']) !!}
                        {!! Form::hidden('usuario_id', Auth::user()->id, ['class'=>'form-control r-0 light s-12', 'id'=>'creado_por']) !!}
							<span class="campo_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0">
							{!! Form::label('status', 'Status', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('status_id',$status, 1, ['class'=>'form-control r-0 light s-12', 'id'=>'status', 'onclick'=>'fechaEntrega2(this.value)']) !!}
							<span class="status_span"></span>
						</div>
					</div>
				
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group m-0">
							{!! Form::label('descripcion', 'Descripción', ['class'=>'col-form-label s-12']) !!}
							{!! Form::text('descripcion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'descripcion', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="status_span"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group m-0 has-feedback">
							
						{!! Form::label('departamento', __('Departamento'), ['class'=>'col-form-label s-12']) !!}
                        {!! Form::text('departamento', null, ['class'=>'form-control r-0 light s-12', 'id'=>'departamento']) !!}
                       
							<span class="campo_span"></span>
						</div>
					</div>
				
				</div>
				<div class="form-row">
					<div class="col-md-4">
						<div class="form-group m-0">
							{!! Form::label('destinatario', 'Destinatario', ['class'=>'col-form-label s-12']) !!}
							{!! Form::text('destinatario', null, ['class'=>'form-control r-0 light s-12', 'id'=>'destinatario', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="status_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0 has-feedback">
							
						{!! Form::label('fecha_hora_recepcion', __('Fecha Recepción'), ['class'=>'col-form-label s-12']) !!}
                        {!! Form::text('fecha_hora_recepcion', date("Y-m-d H:i:s"), ['class'=>'form-control  date-time-picker  r-0 light s-12', 'id'=>'fecha_hora_recepcion']) !!}
                        
							<span class="campo_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0">
							{!! Form::label('fecha_entrega_recepcion', __('Fecha Entrega'), ['class'=>'col-form-label s-12']) !!}
							 {!! Form::text('fecha_entrega_recepcion', null, ['class'=>'form-control  date-time-picker  r-0 light s-12', 'id'=>'fecha_entrega_recepcion']) !!}
							<span class="status_span"></span>
						</div>
					</div>
				
				</div>
				
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar Datos</button>
			</div>
		</div>
	</div>
</div>
<script>
	function fechaEntrega2(id){
		console.log(id);
		 var now = new Date();

	    var day = ("0" + now.getDate()).slice(-2);
	    var month = ("0" + (now.getMonth() + 1)).slice(-2);
	    var m = now.getMinutes();
	    var minutes = (m < 10) ? '0' + m : m;

	    var today = now.getFullYear()+"/"+(month)+"/"+(day)+" "+now.getHours()+":"+minutes;
		if(id == '2'){
			$('#fecha_entrega_recepcion').val(today);
		}else{
			$('#fecha_entrega_recepcion').val("");
		}
	}
</script>
{!! Form::close() !!}
