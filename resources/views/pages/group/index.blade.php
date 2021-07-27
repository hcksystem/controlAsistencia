@extends('layouts.app')
<style>
    #menu * { list-style:none;}
#menu li{ line-height:180%;}
#menu li a{color:#222; text-decoration:none;}
#menu li a:before{ content:"\025b8"; color:#ddd; margin-right:4px;}
#menu input[name="list"] {
	position: absolute;
	left: -1000em;
	}
#menu label:before{ content:"\025b8"; margin-right:4px;}
#menu input:checked ~ label:before{ content:"\025be";}
#menu .interior{display: none;}
#menu input:checked ~ ul{display:block;}
</style>
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-widgets s-18"></i><a href="#">{{ __('Grupos')}}</a></h1>
@endsection

@section('maincontent')

@include('pages.group.create')
@include('pages.group.edit')

<div class="page  height-full"> 
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card" style="margin-top: 80px;">
                <div class="form-group">
                    <div class="card-header white">
                        <div class="form-group row">
                            <div class="col-sm-10" style="margin-top: 5px;"><h6>{{ __('LISTA DE GRUPOS') }}</h6>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    <div class="row" style="margin-top:-100px;">
                    <div class="col-md-4">
                    <div class="white">
                        <div class="card">
                            <div class="card-body no-p">
                                <div class="tab-content">
                                    <div>
                                        <div class="slimScroll b-b" data-height="385">
                                        <ul id="menu">
                                            @foreach($groups as $gr)
                                            <li><input type="checkbox" name="list" id="nivel1-{{$gr->group}}"  onclick="subgrupo({{$gr->id}})">
                                            <label for="nivel1-{{$gr->group}}" onclick="asignEdit({{$gr->id}}),searchUsers({{$gr->id}})">{{ $gr->group }}</label>
                                                <ul class="interior ml-2">
                                                        @foreach($subgroups as $g)
                                                            @if($gr->id == $g->id_group_parent)
                                                                <li><a href="#r" onclick="searchUsers({{$g->id}})">{{ $g->group ?? ''}}</a></li>
                                                            @endif
                                                        @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                         </ul>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" id="id_grupo">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreateGroup">CREAR GRUPO</button>
                                        <button type="button" class="btn btn-success" onclick="modificar()">MODIFICAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4">
                    <div class="white">
                        <div class="card">
                            <div class="card-body no-p">
                                <div class="tab-content">
                                    <div class="tab-pane animated fadeIn show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                        <div class="bg-primary text-white lighten-2">
                                            <div class="pt-5 pb-2 pl-5 pr-5">
                                                <h5 class="font-weight-normal s-14">Jefes</h5>
                                                <span class="s-48 font-weight-lighter text-primary" id="countJefes">0</span>
                                                <div class="float-right"></div>
                                            </div>
                                            <canvas width="378" height="94" data-chart="spark" data-chart-type="line" data-dataset="[[28,530,200,430]]" data-labels="['a','b','c','d']"
                                                    data-dataset-options="[
                                            { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                            ]">
                                            </canvas>
                                        </div>
                                        <div class="slimScroll b-b" data-height="385">
                                            <div class="table-responsive">
                                                <table class="table table-hover earning-box" id="contentJefes">
                                                    <thead class="no-b">
                                                    <tr>
                                                        <th colspan="2">Nombres y Apellidos</th>
                                                        <th>Teléfono</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <div class="col-md-4">
                    <div class="white">
                        <div class="card">
                            <div class="card-body no-p">
                                <div class="tab-content">
                                    <div class="tab-pane animated fadeIn show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                        <div class="bg-primary text-white lighten-2">
                                            <div class="pt-5 pb-2 pl-5 pr-5">
                                                <h5 class="font-weight-normal s-14">Usuarios</h5>
                                                <span class="s-48 font-weight-lighter text-primary" id="countUsers">0</span>
                                                <div class="float-right"></div>
                                            </div>
                                            <canvas width="378" height="94" data-chart="spark" data-chart-type="line" data-dataset="[[28,530,200,430]]" data-labels="['a','b','c','d']"
                                                    data-dataset-options="[
                                                { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                            ]">
                                            </canvas>
                                        </div>
                                        <div class="slimScroll b-b" data-height="385">
                                            <div class="table-responsive">
                                            <table class="table table-hover earning-box" id="contentUsers">
                                                    <thead class="no-b">
                                                    <tr>
                                                        <th colspan="2">Nombres y Apellidos</th>
                                                        <th>Teléfono</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->

</div>
@endsection
@routes
@section('js')
<script src={{asset('assets/js/group.js')}}></script>
<script>
    function subgrupo(id){
        $('#parent_group').val(id);
    }
</script>

@endsection
