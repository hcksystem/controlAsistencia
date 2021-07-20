@extends('layouts.app')
@section('title')
    @include('pages.accountOperator.partials.title')
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.accountOperator.headbar')
    {{-- end header --}}
@endsection
@section('maincontent')
{{-- modal create --}}
@include('pages.accountOperator.accountContact.create')
{{-- modal edit --}}
{{-- @include('pages.rol.edit') --}}

<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6>{{ __('CONTACTS LIST') }}</h6>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="example3" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th><b>{{ __('ID') }}</b></th>
                                        <th><b>{{ __('FIRST NAME') }}</b></th>
                                        <th><b>{{ __('LAST NAME') }}</b></th> 
                                        <th><b>{{ __('FULLNAME') }}</b></th>
                                        <th><b>{{ __('DEPARTAMENT') }}</b></th>
                                        <th><b>{{ __('PHONE MOBILE') }}</b></th>
                                        <th><b>{{ __('OPTIONS') }}</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>
                                            {{$contact->id}}
                                        </td>
                                         <td>
                                           {{$contact->first_name}}
                                        </td>
                                         <td>
                                             {{$contact->last_name}}
                                            
                                        </td>
                                        <td>
                                            <div>
                                                {{$contact->fullname}}
                                                <div>
                                                    <small>{{$contact->email}}</small>
                                                </div>
                                            </div>
                                        </td>
                                      
                                        <td>
                                            {{$contact->departament}}
                                        </td>
                                        <td>
                                            <div>
                                                <small>Mobile:{{$contact->phone_mobile}}</small>
                                                <div>
                                                    <small>Company:{{$contact->phone_company}}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {!! Form::open(['route'=>['accountContact.destroy',$contact],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                            <a href="{{ route('contactEdit',[$contact,$account]) }}" class="btn btn-default btn-sm" title="Editar">
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
                    <div class="col-md-12 form-group text">
                        <!--<a href="{{ route('accountOperator.show',$account) }}" class="btn btn-default" data-dismiss="modal">Back</a>-->
                        {{-- <button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Save data</button> --}}
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
@section('js')
<script>
    $(document).ready(function() {
        $('#contact').addClass('active');
    });
    var title = 'Accounts Contact';
    var colunms = [0,1,2,3,4];
    dataTableExport(title,colunms);
</script>
@endsection
