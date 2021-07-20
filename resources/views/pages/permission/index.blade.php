@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon-key6"></i>
Permissions</h1>
@endsection

@section('maincontent')
{{-- modal create --}}
@include('pages.permission.create')
{{-- modal edit --}}
@include('pages.permission.edit')

<div class="page  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="{{ route('user.index') }}" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>{{ __('Users') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('rol.index') }}" role="tab"
                        aria-controls="v-pills-buyers"><i class="icon icon-face"></i> Roles/Profiles</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('profitCenter.index') }}" role="tab" aria-controls="v-pills-sellers"><i class="icon  icon-local_shipping"></i> Profit Centers</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="{{ route('profitCenter.index') }}" role="tab" aria-controls="v-pills-sellers"><i class="icon  icon-key6"></i> Permissions</a>
                    </li>

                </ul>
            </div>
        </div>
    </header>
        <div class="container-fluid animatedParent animateOnce my-3">
            <div class="animated fadeInUpShort">
                <div class="card">
                    <div class="form-group">
                        <div class="card-header white">
                            <h6> LIST PERMISSIONS </h6>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="form-group">
                                <table id="example2" class="table table-bordered table-hover data-tables"
                                    data-options='{ "paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th><b>ID</b></th>
                                            <th><b>NAME</b></th>
                                            <th><b>SLUG</b></th>
                                            <th><b>DESCRIPTION</b></th>
                                            <th width="15%"><b>OPTIONS</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>
                                            <td>{{ $permission->description }}</td>
                                            <td class="text-center">
                                                {!! Form::open(['route'=>['permission.destroy',$permission],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                                <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('permission.edit',$permission) }}', '{{ route('permission.update',$permission->id) }}')">
                                                    <i class="icon-pencil text-info"></i>
                                                </a>
                                                <button class="btn btn-default btn-sm">
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
    <!--Add New Message Fab Button-->
    <a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" data-toggle="modal" data-target="#create" title="Add Rol">
        <i class="icon-add"></i>
    </a>
</div>
@endsection
