@extends('layouts.app')
@section('title')

       <h1 class="nav-title"> <i class="icon-language text-white"></i>
        <span class="text-white">Languages</span>

    <div class="btn-group dropright">
        <a class="dropdown-toggle badge badge-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{$language->abbreviation}}</span>
        </a>
        <div class="dropdown-menu" >
            @foreach($lang as $row)
                <a class="dropdown-item text-black" href="{{url('language', $row->id)}}">{{ $row->language}}</a>
            @endforeach
        </div>
    </div>
</h1>
@endsection

@section('maincontent')
<div class="page  height-full">
    <div class="card my-3 no-b">
        <div class="card-header white">
            <h4> Translate to {{$language->language}} </h4>
        </div>
        <div class="card-body table-responsive">
            <table id="table2" class="table table-bordered table-hover data-tables"
                data-options='{ "paging": false; "searching":false}'>
                <thead>
                    <tr>
                        <th><b>Nº</b></th>
                        <th><b>Text</b></th>
                        <th><b>Translate</b></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($data as $key => $row)
                        <tr>
                        <td width="10">{{$count++}}</td>
                        <td width="450">{{$key}}</td>
                        <td width="450">
                            <input type="text" id="{{$key}}" class="form-control" value="{{$row}}" onchange="LangEdit(id)">
                            <div class="error"></div>
                        </td>
                        </form>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" id="lang" value="{{$language->id}}">

@endsection
@section('js')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function LangEdit(value) {
    var lang = $('#lang').val();
    var translate = $('#'+value).val();
    var text = value;
    $.ajax({
        url:'{{ route('language.update') }}',
        data:{
            lang:lang,
            translate:translate,
            text:text
        },
        type:'POST',
        success:  function (response) {
            toastr.success(response.message);
        },
        error:function(){
            toastr.error('An error has occurred in the translation');
    }
    });

};
</script>
@endsection