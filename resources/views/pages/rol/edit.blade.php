@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> 
	<i class="icon-person"></i>
	Role
</h1>
@endsection

@section('maincontent')
<div class="page  height-full">
	<header class="blue accent-3 relative">
		<div class="container-fluid text-white">
			
			<div class="row justify-content-between">
				<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
					<li>
						<a class="nav-link" href="{{ route('user.index') }}" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Users</a>
					</li>
					<li>
						<a class="nav-link active" id="v-pills-buyers-tab" data-toggle="pill" href="#" role="tab"
						aria-controls="v-pills-buyers"><i class="icon icon-face"></i> Roles/Profiles</a>
					</li>
					<li>
						<a class="nav-link" href="{{ route('profitCenter.index') }}" role="tab" aria-controls="v-pills-sellers"><i class="icon  icon-local_shipping"></i> Profit Centers</a>
					</li>
					<li>
						<a class="nav-link" href="{{ route('permission.index') }}" role="tab" aria-controls="v-pills-sellers"><i class="icon-key6"></i> Permissions</a>
					</li>
				</ul>
			</div>
		</div>
	</header>

	 <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
        	<div class="col-md-7 offset-md-2">
	            <div class="card">
	                <div class="form-group">
	                    <div class="card-header white">
	                        <h6><i class="icon-pencil"></i> EDIT ROLE </h6>
	                    </div>
	                </div>
	                <div class="card-body">
						{!! Form::model($rol,['route'=>["rol.update",$rol->id],'method'=>'PUT','id'=>'DataUpdate']) !!}
						<div class="col-md-12">
	                        <div class="form-row">
								<div class="form-group col-4 m-0" id="password_group">
									{!! Form::label('name', 'Name', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_name']) !!}
									<span class="name_span"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Sulg', 'Sulg', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('slug', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_slug']) !!}
									<span class="name_slug"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('special', 'Special', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('special', [ 1 => 'all-access', 2 => 'no-access'], $rol->special, ['class'=>'form-control r-0 light s-12', 'id'=>'_special']) !!}
									<span class="name_specil"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12 m-0" id="permissions">
									{!! Form::label('permissions', 'Access Permits', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('permits[]', $permissions, $rol->permissions, ['class'=>'form-control r-0 light s-12 select2 multiple', 'id'=>'permits','multiple'=>'multiple','onclick'=>'inputClear(this.id)']) !!}
									<span class="permission_span"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-12 m-0" id="description_group">
									{!! Form::label('description', 'Description', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('description', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_description']) !!}
									<span class="secription_span"></span>
								</div>
							</div>
						</div>
						<br>
						<div class="col-md-12 text-right">
							<a href="{{ route('rol.index') }}" class="btn btn-default" data-dismiss="modal">Back</a>
							<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Save data</button>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
        	</div>
		</div>
	</div>
</div>
@endsection