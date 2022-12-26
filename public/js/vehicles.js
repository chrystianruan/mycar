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

$(document).ready(() => {
    $.ajax({
      type: 'GET',
      url: 'http://127.0.0.1:8000/api/marks',
      dataType: 'json',
      success: dados => {
          var option;	
          option += `<option selected disabled value="">Selecionar</option>`;		
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
            option += `<option selected disabled value="">Selecionar</option>`;		
            if (dados.length > 0){
              $.each(dados, function(i, obj){
                option += `<option value="${obj.id}">${obj.modelo}</option>`;
              })
            }
            $('#modelos').html(option).show();
        }		
      }) 
    })

    let marksEdit = document.getElementById("marksEdit");
    let modelosEdit = document.getElementById("modelosEdit");
    let versionEdit = document.getElementById("versionEdit");
    let nicknameEdit = document.querySelector("#nicknameEdit");
    let imgEdit = document.getElementById("imgEdit");
    let myModal = document.getElementById("modal-caixa");
    let close = document.getElementById("close");
    let btnClose = document.getElementById("btnClose");
    let btnEdit = document.querySelectorAll(".btn.btn-primary");
    let editForm = document.getElementById("edit-form");

    for (let i = 0; i <= btnEdit.length; i++) {
      if (btnEdit[i]) { 
        btnEdit[i].addEventListener("click", function() {
          $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/vehicle/'+btnEdit[i].id,
            dataType: 'json',
            success: dados => {
                myModal.style.display = "block";
                nicknameEdit.value = dados.nickname;
                versionEdit.value = dados.version;
                let image = dados.image;
                imgEdit.setAttribute('src', 'http://127.0.0.1:8000/storage/'+image.replace("public/", ""));
                imgEdit.style.maxWidth = '150px';
                editForm.action = "/update/vehicle/"+btnEdit[i].id;
            }
          
          }) 
        })
      }
    }

    for (let i = 0; i <= btnEdit.length; i++) {
      if (btnEdit[i]) { 
        btnEdit[i].addEventListener("click", function() {
          $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/api/modelos/'+btnEdit[i].name,
            dataType: 'json',
            success: dados => {

                let optionSelectedModelo;
                optionSelectedModelo += `<option selected value="${dados.id}">${dados.modelo} </option>`;
                $('#modelosEdit').html(optionSelectedModelo).show();

                $.ajax({
                  type: 'GET',
                  url: 'http://127.0.0.1:8000/api/marks',
                  dataType: 'json',
                  success: data => {
                      var option;	
                      option += `<option disabled value="">Selecionar</option>`;
                      option += `<option selected value="${dados.mark_id}">${dados.mark}</option>`;	
                      if (data.length > 0){
                        $.each(data, function(i, obj){
                          option += `<option value="${obj.id}">${obj.name}</option>`;
                        })
                      }
                      $('#marksEdit').html(option).show();
                    }		
                }); 

                $('#marksEdit').change(function () {
                let markId = $('#marksEdit').val();
                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/api/mark-selected/modelos/'+markId,
                    dataType: 'json',
                    success: data2 => {
                        var option;	
                        option += `<option selected disabled value="">Selecionar</option>`;	
                        if (data2.length > 0){
                          $.each(data2, function(i, obj){
                            option += `<option value="${obj.id}">${obj.modelo}</option>`;
                          })
                        }
                        $('#modelosEdit').html(option).show();
                    }		
                  }) 
                }) 
              }
          }) 
        })
      }
    }

    function hideModal() {
        myModal.style.display = "none";
    }

    close.addEventListener("click", hideModal)
    btnClose.addEventListener("click", hideModal)
