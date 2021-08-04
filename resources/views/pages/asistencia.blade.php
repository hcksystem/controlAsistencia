<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-documents3 text-blue s-18"></i>Marcar</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
            <form id="formAsistencia">
				<div class="form-row">
                <div>
                    <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
                    <button id="boton">Tomar foto</button>
                    <p id="estado"></p>
	            </div>
                    <br>
                    <video muted="muted" id="video"></video>
                    <canvas id="canvas" style="display: none;"></canvas>
				</div>
                @if(isset($asistencia))
                    @if($asistencia->tipo == 0)
                        <input type="hidden" value="1" name="tipo">
                      
                    @else
                        <input type="hidden" value="0" name="tipo">
                       
                     @endif
                @else
                        <input type="hidden" value="0" name="tipo">
                       
                @endif
                </form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                @if(isset($asistencia))
                    @if($asistencia->tipo == 0)
                        <input type="hidden" value="1" name="tipo">
                        <a onclick="guardarAsistencia()" class="btn btn-danger col-6 mw-100">Registrar Salida</a>
                    @else
                        <input type="hidden" value="0" name="tipo">
                        <a onclick="guardarAsistencia()" class="btn btn-success col-6 mw-100">Registrar Entrada</a>
                     @endif
                @else
                        <input type="hidden" value="0" name="tipo">
                        <a onclick="guardarAsistencia()" class="btn btn-success">Registrar Entrada</a>
                @endif
				
			</div>
		</div>
	</div>
</div>