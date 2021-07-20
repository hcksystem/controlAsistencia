@extends('app')

@section('title')
<h1 class="nav-title text-white"> <i class="icon-person"></i>
    Users</h1>
@endsection

@section('maincontent')
<div class="page  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
          
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Users</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-buyers-tab" data-toggle="pill" href="#v-pills-buyers" role="tab"
                           aria-controls="v-pills-buyers"><i class="icon icon-face"></i> Profiles</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-sellers-tab" data-toggle="pill" href="#v-pills-sellers" role="tab"
                           aria-controls="v-pills-sellers"><i class="icon  icon-local_shipping"></i> Offices</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link"  href="panel-page-users-create.html" ><i class="icon icon-plus-circle"></i> Add New User</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>


    <div class="card my-3 no-b">
        <div class="card-body">
   
            <table id="example2" class="table table-bordered table-hover data-tables"
                   data-options='{ "paging": false; "searching":false}'>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
                </thead>
                <tbody>

                        @foreach ($users as $user)

                        <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        @endforeach
              
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>

                    <th>Create at</th>
                    <th>Update at</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $('#example-with-json-button').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'JSON',
                        action: function ( e, dt, button, config ) {
                            var data = dt.buttons.exportData();
    
                            $.fn.dataTable.fileSave(
                                new Blob( [ JSON.stringify( data ) ] ),
                                'Export.json'
                            );
                        }
                    }
                ]
            } );
        } );
    </script>
@endsection