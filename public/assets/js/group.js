function asignEdit(id){

    $('#id_grupo').val(id);
    //obtenerDatosGet('route("grupo.edit",'+id+')','route("grupo.edit",'+id+')'

}

function modificar(){
    let id = $('#id_grupo').val();
    $('#update').modal('show');

    url = route("grupo.edit",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(result)
        {
            console.log(result)
        },
        fail: function(){
        },
        beforeSend: function(){
        }
    });

    /*$.get(url, function(data)
    {
        console.log(data);
        $.each(data, function(key, value)
        {
            console.log(value);
            if (key=='curren_account' && value == 1) {
                $('#'+'_'+key).prop('checked', true);
            }
            else if(key=='curren_account' && value != 1){
                $('#'+'_'+key).prop('checked', false);
            }
            else{
                $('#'+'_'+key).val(value);
            }
           
        });
    })*/
}
//onclick="obtenerDatosGet('{{ route('grupo.edit',$gr) }}', '{{ route('grupo.update',$gr->id) }}')"