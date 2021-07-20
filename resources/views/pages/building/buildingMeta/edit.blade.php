@extends('layouts.app')
@section('title')
@if (isset($account))
        @include('pages.accountOperator.partials.title')
    @else
        <h1 class="nav-title text-white"> <i class="icon-person"></i>DATA DETAILS
		</h1>
    @endif

@endsection
@section('top-menu')
	  @include($topMenu) 
@endsection
@section('maincontent')
<div class="page  height-full">
	

	 <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
        	<div class="col-md-12">
	            <div class="card">
	                <div class="form-group">
	                    <div class="card-header white">
	                        <h6><i class="icon-pencil"></i> DATA DETAILS </h6>
	                    </div>
	                </div>
	                <div class="card-body">
						{!! Form::model($meta,['route'=>["accountMeta.update",$meta->id],'method'=>'PUT','class'=>'formlDinamic','id'=>'DataUpdate']) !!}
						<div class="form-row">
							<div class="col-md-12">
						<div class="form-row">
							
							{!! Form::hidden('account_id', $account->id, ['class'=>'form-control r-0 light s-12', 'id'=>'account_id']) !!}
							
							<div class="form-group col-6 m-0" id="value_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('metaType', 'Data Details', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::select('account_meta_type_id', $metaTypes, $meta->account_meta_type_id, ['class'=> 'form-control r-0 light s-12', 'id'=>'_account_meta_type_id']) !!}
							</div>
							<div class="form-group col-6 m-0" id="value_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('value', 'Value', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('value', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_value']) !!}
								<span class="value_span"></span>
							</div>
							{!! Form::hidden('route', route('accountOperator.show',$account), ['id'=>'route']) !!}
						</div>	
					</div>
						</div>
						<br>
						<div class="col-md-12 text-right">
							<a href="{{ route('accountOperator.show',$account) }}" class="btn btn-default" data-dismiss="modal">Back</a>
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
