@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white">
<i class="icon icon-person"></i>
Countries
</h1>
@endsection
@section('top-menu')
   @include('pages.region_communes.headbar')
@endsection
@section('maincontent')
<div class="page  height-full">
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="col-md-12">
                <div class="card">
                    <div class="form-group">
                        <div class="card-header white">
                            <h6><i class="icon-pencil"></i> EDITAR REGIÓN </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($region,['route'=>["regions.update",$region->id],'method'=>'PUT', 'class'=>'formlDinamic','id'=>'DataUpdate']) !!}
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-12 m-0" id="name_group">
                                        {{-- <i class="icon icon-face mr-2"></i> --}}
                                        {!! Form::label('name', 'Nombre', ['class'=>'col-form-label s-12']) !!}
                                        {!! Form::text('name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_name', 'onclick'=>'inputClear(this.id)']) !!}
                                        <span class="name_span"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 text-right">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Atrás</a>
                            <button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar datos</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function() {
$('#countries').addClass('active');
});
</script>
@endsection