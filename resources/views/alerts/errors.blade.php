@if(count($errors)>0)
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span asira-hidden="true">&times;</span></button>
    @foreach($errors->all() as $error)
      <p><strong><i class="glyphicon glyphicon-ban-circle"></i> Error:</strong> {{ $error }}</p>
    @endforeach
</div>
@endif
