@if(Session::has('message-error'))
<div class="toast"
    data-title={{__('Error')}}
    data-message="{{Session::get('message-error')}}"
    data-type="error">
</div>
@endif
@if(Session::has('message-success'))
<div class="toast"
    data-title= {{__('Success')}}
    data-message="{{Session::get('message-success')}}"
    data-type="success">
</div>
@endif
@if(Session::has('message-warning'))
<div class="toast"
    data-title= {{__('Warning')}}
    data-message="{{Session::get('message-warning')}}"
    data-type="warning">
</div>
@endif
@if(Session::has('message-info'))
<div class="toast"
    data-title={{__('Info')}}
    data-message="{{Session::get('message-info')}}"
    data-type="info">
</div>
@endif