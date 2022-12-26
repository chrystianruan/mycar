/* $(document).ready(() => {
        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/api/marks',
            dataType: 'json',
            sucess: function(data) {
                data.forEach(element =>  {
                    $('#marks').append(`<option value="${element.id}">${element.name}</option>`)
                });
                $('#marks').html(option).show();
                },
                error: function(error) {
                    console.log(`erro:${error}`);
                }
        })
}) */
/* 

$(document).ready(() => {
    $.ajax({
      type: 'GET',
      url: 'http://127.0.0.1:8000/api/marks',
      dataType: 'json',
      success: dados => {
          var option;	
          option += '<option selected disabled value="">'+ 'Selecionar' +'</option>';		
          if (dados.length > 0){
            $.each(dados, function(i, obj){
              option += `<option value="${obj.id}">${obj.name}</option>`;
            })
          }
          $('#marks').html(option).show();
      }		
    }) 
})

$('#marks').change(function () {
    let markId = $('#marks').val();
    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/api/mark-selected/modelos/'+markId,
        dataType: 'json',
        success: dados => {
            var option;	
            option += '<option selected disabled value="">'+ 'Selecionar' +'</option>';		
            if (dados.length > 0){
              $.each(dados, function(i, obj){
                option += `<option value="${obj.id}">${obj.modelo}</option>`;
              })
            }
            console.log(dados)
            $('#modelos').html(option).show();
        }		
      }) 
    })

 */