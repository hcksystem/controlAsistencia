<div class="form-row">
    <div class="col-md-8">
        <div class="form-group m-0 has-feedback">
            <i class="icon-person mr-2"></i>
            {!! Form::label('name', 'Username', ['class'=>'col-form-label s-12']) !!}
            {!! Form::text('fullname', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Enter User Name']) !!}
            @error('fullname')
                <span class="help-block text-danger">
                    {{ $message }}
                </span>
            @enderror  
        </div>
        @if (!isset($user))
        <div class="form-row">
            <div class="form-group col-6 m-0">
                <i class="icon-key3 mr-2"></i>
                {!! Form::label('password', 'Password', ['class'=>'col-form-label s-12','placeholder'=>'Password']) !!}
                {!! Form::password('password', ['class'=>'form-control r-0 light s-12']) !!}
                @error('password')
                    <span class="help-block text-danger">
                        {{ $message }}
                    </span>
                @enderror 
            </div>
            <div class="form-group col-6 m-0">
                <i class="icon-key4 mr-2"></i>
                {!! Form::label('passwordConfirm', 'Password Confim', ['class'=>'col-form-label s-12','placeholder'=>'Password Confirm']) !!}
                {!! Form::password('password_confirmation', ['class'=>'form-control r-0 light s-12', 'id'=>'password_confirmation']) !!}
            </div>
        </div>
        @endif
        <div class="form-row">
            <div class="form-group col-6 m-0">
                {!! Form::label('status', 'Status', ['class'=>'col-form-label s-12']) !!}
                {!! Form::select('status', $status, null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Select']) !!}
                @error('status')
                    <span class="help-block text-danger">
                        {{ $message }}
                    </span>
                @enderror 
            </div>
        </div>
    </div>
    <div class="col-md-3 offset-md-1">
        <div class="form-group">
            <input hidden id="file" name="file"/>
            <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload">
                <div class="dz-default dz-message">
                    <span>Drop A passport size image of user</span>
                    <div>You can also click to open file browser</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-row mt-1">
            <div class="form-group col-4 m-0">
                <i class="icon-envelope-o mr-2"></i>
                {!! Form::label('email', 'Email', ['class'=>'col-form-label s-12']) !!}
                {!! Form::email('email', null, ['class'=>'form-control r-0 light s-12 ', 'placeholder'=>'user@email.com']) !!}
                @error('email')
                    <span class="help-block text-danger">
                        {{ $message }}
                    </span>
                @enderror 
            </div>
            <div class="form-group col-4 m-0">
                <i class="icon-phone mr-2"></i>
                {!! Form::label('phone1', 'Phone 1', ['class'=>'col-form-label s-12']) !!}
                {!! Form::text('phone1', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678']) !!}
            </div>
            <div class="form-group col-4 m-0">
                <i class="icon-phone mr-2"></i>
                {!! Form::label('phone2', 'Phone 2', ['class'=>'col-form-label s-12']) !!}
                {!! Form::text('phone2', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678']) !!}
            </div>
        </div>
        <div class="form-row mt-1">
            <div class="form-group col-4 m-0">
                <i class="icon-mobile-phone mr-2"></i>
                {!! Form::label('cell1', 'Cell 1', ['class'=>'col-form-label s-12']) !!}
                {!! Form::text('cell1', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678']) !!}
            </div>

            <div class="form-group col-4 m-0">
                <i class="icon-mobile-phone mr-2"></i>
                {!! Form::label('cell2', 'Cell 2', ['class'=>'col-form-label s-12']) !!}
                {!! Form::text('cell2', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678']) !!}
            </div>
            @if (!isset($show))
            <div class="form-group col-4 m-0">
                <i class="icon-gold mr-2"></i>
                {!! Form::label('profit', 'Profit Center', ['class'=>'col-form-label s-12','placeholder'=>'Profit Center']) !!}
                {!! Form::select('profitcenter_id', $profits, null, ['class'=>'form-control r-0 light s-12','placeholder'=>'Select']) !!}
            </div>
            @endif
            @if (isset($show))
                <div class="form-group col-4 m-0">
                <i class="icon-gold mr-2"></i>
                {!! Form::label('profit', 'Profit Center', ['class'=>'col-form-label s-12','placeholder'=>'Profit Center']) !!}
                {!! Form::text('profitcenter_id', $user->profitCenters->name, ['class'=>'form-control r-0 light s-12']) !!}
            </div>
            @endif
        </div>
    </div>
</div>