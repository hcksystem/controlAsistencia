<!-- Modal -->
<div class="modal fade" id="create_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-contacts"></i> {{ __('Add New Contact') }} For <span id="contact_name_bank"></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="contactForm" name="contactForm" class="form-horizontal">
					<div class="form-row">
						<div class="col-md-12">
							<div class="form-row">
							{{ csrf_field() }}
							<div class="form-group col-4 m-0" id="first_name_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('first_name', __('First Name *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('first_name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'first_name']) !!}
								<span class="first_name_span"></span>
							</div>
							<div class="form-group col-4 m-0" id="last_name_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('last_name', __('Last Name *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('last_name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'last_name']) !!}
								<span class="first_name_span"></span>
							</div>
						   <div class="form-group col-4 m-0" id="fullname_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('name', __('Fullname *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('fullname', null, ['class'=>'form-control r-0 light s-12', 'id'=>'fullname']) !!}
								<span class="fullname_span"></span>
							</div>
							@if(isset($account))
							{!! Form::hidden('account_id', $account->id, ['class'=>'form-control r-0 light s-12', 'id'=>'account_id']) !!}
							 @else
							{!! Form::hidden('account_id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'account_id']) !!}
                             @endif
								
							<div class="form-group col-4 m-0" id="phone_company_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('phone_company',__('Phone Company *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('phone_company', null, ['class'=>'form-control r-0 light s-12', 'id'=>'phone_company','required']) !!}
								<span class="phone_company_span"></span>
							</div>
							<div class="form-group col-4 m-0" id="phone_mobile_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('phone_mobile',__('Phone Mobile'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('phone_mobile', null, ['class'=>'form-control r-0 light s-12', 'id'=>'phone_mobile']) !!}
								<span class="phone_mobile_span"></span>
							</div>
							<div class="form-group col-4 m-0" id="email_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('email',__('Email *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::email('email', null, ['class'=>'form-control r-0 light s-12', 'id'=>'cemail','required']) !!}
								<span class="email_span"></span>
							</div>
							<div class="form-group col-4 m-0" id="departament_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('departament',__('Departament'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('departament', null, ['class'=>'form-control r-0 light s-12', 'id'=>'departament']) !!}
								<span class="departament_span"></span>
							</div>
							
							<div class="form-group col-8 m-0" id="comments_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('comments',__('Comments'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('comments', null, ['class'=>'form-control r-0 light s-12', 'id'=>'comments']) !!}
								<span class="comments_span"></span>
							</div>

							</div>
						</div>
					</div>
				</form>
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close') }}</button>
				<button type="submit" class="btn btn-primary" id="ajaxContactSubmit" style="display: none;"><i class="icon-save mr-2"></i>{{__('Save data') }}</button>
				<button type="submit" class="btn btn-primary" id="ajaxContactSubmit2" style="display: none;"><i class="icon-save mr-2"></i>{{__('Save data') }}</button>
				
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}