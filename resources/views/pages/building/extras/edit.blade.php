@extends('layouts.app')
@section('title')

@if(isset($account))
        @include('pages.accountOperator.partials.title')
    @else
    <h1 class="nav-title text-white"><a href="{{ route('accountOperator.show',$account) }}">
      <i class="icon-person"></i>Account Contact</a>
    </h1>
 @endif

@endsection
@section('top-menu')
     @include('pages.accountOperator.headbar')
@endsection

@section('maincontent')

<div class="page  height-full">

  <div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
      <div class="col-md-12">
        <div class="card">
          <div class="form-group">
            <div class="card-header white">
              <h6><i class="icon-pencil"></i> EDIT ACCOUNT CONTACT </h6>
            </div>
          </div>
          <div class="card-body">
            {!! Form::model($contact,['route'=>["accountContact.update",$contact->id],'method'=>'PUT','class'=>'formlDinamic', 'id'=>'DataUpdate']) !!}
            <div class="form-row">
                <div class="form-group col-4 m-0" id="first_name_group">
                {!! Form::label('name', 'First Name', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('first_name', $contact->first_name, ['class'=>'form-control r-0 light s-12', 'id'=>'_first_name']) !!}
                <span class="first_name_span"></span>
              </div>
               <div class="form-group col-4 m-0" id="last_name_group">
                {!! Form::label('name', 'Last Name', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('last_name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_last_name']) !!}
                <span class="first_name_span"></span>
              </div>
              <div class="form-group col-4 m-0" id="fullname_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('name', 'Fullname *', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('fullname', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_fullname']) !!}
                <span class="fullname_span"></span>
              </div>
              <div class="form-group col-4 m-0" id="phone_company_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('phone_company', 'Phone Company', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('phone_company', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_phone_company']) !!}
                <span class="phone_company_span"></span>
              </div>
              <div class="form-group col-4 m-0" id="phone_mobile_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('phone_mobile', 'Phone Mobile', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('phone_mobile', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_phone_mobile']) !!}
                <span class="phone_mobile_span"></span>
              </div>
              <div class="form-group col-4 m-0" id="email_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('email', 'Email', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::email('email', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_email']) !!}
                <span class="email_span"></span>
              </div>
              <div class="form-group col-4 m-0" id="departament_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('departament', 'Departament', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('departament', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_departament']) !!}
                <span class="departament_span"></span>
              </div>
              <!--<div class="form-group col-4 m-0" id="country_id_group">
                {!! Form::label('country_id', 'Country', ['class'=>'col-form-label s-12']) !!}
                {!! Form::select('country_id', $countries, null, ['class'=>'form-control r-0 light s-12', 'id'=>'_contry', 'onclick'=>'inputClear(this.id)']) !!}
                <span class="country_id_span"></span>
              </div>
              <div class="form-group col-8 m-0" id="address_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('address', 'address', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('address', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_email']) !!}
                <span class="address_span"></span>
              </div> -->
              <div class="form-group col-8 m-0" id="comments_group">
                {{-- <i class="icon icon-face mr-2"></i> --}}
                {!! Form::label('comments', 'comments', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                {!! Form::text('comments', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_comments']) !!}
                <span class="comments_span"></span>
              </div>
              {!! Form::hidden('route', route('contactsAsoc',$account), ['id'=>'route']) !!}
              {!! Form::hidden('account_id', $account->id, ['class'=>'form-control r-0 light s-12', 'id'=>'_account_id']) !!}
            </div>
            <br>
            <div class="col-md-12 text-right">
              <a href="{{route('contactsAsoc',$account) }}" class="btn btn-default" data-dismiss="modal">Back</a>
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
@section('js')
<script>
$(document).ready(function() {
$('#contact').addClass('active');
});
</script>
@endsection