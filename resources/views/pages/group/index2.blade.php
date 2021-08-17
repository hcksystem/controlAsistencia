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
                        <div class="col-md-12" style="margin-bottom:0px !important">
                            <div class="col-md-6" style="margin-top:100px; margin-bottom:0px !important">
                                {!! Form::select('group', $groups,null, ['class'=>'form-control r-0 light s-12', 'id'=>'_group', 'onclick'=>'searchUsers(this.value)']) !!}
                            </div>
                        </div>
                    <div class="col-md-6">
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
                                                        <th>Grupo</th>
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
                </div> <div class="col-md-6">
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
                                                        <th>Grupo</th>
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
    mostrarJefes();
    function subgrupo(id){
        //alert(id)
        $('#parent_group').val(id);
        $.ajax({
            type : 'get',
            url : "{{ url('getAllGroups') }}",
            success:function(data){
                console.log(data)
                $.each(data, function(key, value){
                    if(value.id_group_parent == value.id){
                        $('#list'+id).append(
                            $('<ul onclick="subgrupo('+value.id+')">').attr('id', 'list'+value.id).append(
                                $('<label>').append(
                                    $('<span>').attr('class', 'tab').append(value.group)
                                    
                            )));
                    }
                });    
                
                }
            });

    }

    //grupos();

    function grupos(){

            $.ajax({
            type : 'get',
            url : "{{ url('getAllGroups') }}",
            success:function(data){
                console.log(data)
                $.each(data, function(key, value){
                    if(value.id_group_parent == 0){
                        $('#menu').append(
                            $('<ul onclick="subgrupo('+value.id+')">').attr('id', 'list'+value.id).append(
                                $('<label>').append(
                                    $('<span>').attr('class', 'tab').append(value.group)
                                    
                            )));
                    }
                });    
                
                }
            });

    }

    function mostrarJefes(){
    url = route("getAllJefes");
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            let countJefes = data.length;
            $("#countJefes").html(countJefes);
            $("#contentJefes td").remove(); 
            $.each(data, function(key, value){
                $('#contentJefes').append('<tr><td><a class="avatar avatar-lg"><img src="img/avatar/'+value.image+'" alt=""></a></td><td>' + value.fullname +' '+ value.last_name + '</td><td>' + value.phone1 + '</td><td>' + value.group + '</td></tr>');
                    $('#'+'_'+key).val(value);
            });
        }
    });
}


function searchUsers(id){
    
    url = route("searchJefes",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            let countJefes = data.length;
            $("#countJefes").html(countJefes);
            $("#contentJefes td").remove(); 
            $.each(data, function(key, value){
                $('#contentJefes').append('<tr><td><a class="avatar avatar-lg"><img src="img/avatar/'+value.image+'" alt=""></a></td><td>' + value.fullname +' '+ value.lastname + '</td><td>' + value.phone1 + '</td></tr>');
                    $('#'+'_'+key).val(value);
            });
        }
    });

    url = route("searchUsers",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            let countUsers = data.length;
            $("#countUsers").html(countUsers);
            $("#contentUsers td").remove(); 
            $.each(data, function(key, value){
                $('#contentUsers').append('<tr><td><a class="avatar avatar-lg"><img src="img/avatar/'+value.image+'" alt=""></a></td><td><h6>' + value.fullname +' '+ value.lastname + '</h6></td><td>' + value.phone1 + '</td></tr>');
                    $('#'+'_'+key).val(value);
            });
        }
    });
}
</script>

@endsection
