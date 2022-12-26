let myModal = document.getElementById("modal-caixa");
    let close = document.getElementById("close");
    let btnClose = document.getElementById("btnClose");
    let btnEdit = document.querySelectorAll(".btn.btn-primary");
    let editForm = document.getElementById("edit-form");
    let nextDate = document.getElementById("next_dateEdit");
    let modeloUserEdit = document.getElementById("modelo_userEdit")

for (let i = 0; i <= btnEdit.length; i++) {
    if (btnEdit[i]) { 
      btnEdit[i].addEventListener("click", function() {
        $.ajax({
          type: 'GET',
          url: 'http://127.0.0.1:8000/maintenance/'+btnEdit[i].id,
          dataType: 'json',
          success: dados => {
            myModal.style.display = "block";
                $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/api/modelos/'+btnEdit[i].name,
                dataType: 'json',
                success: data => {
                    let optionSelected = document.createElement('option');
                    optionSelected.value = dados.modelo_user_id;
                    optionSelected.setAttribute('selected', 'selected');
                    optionSelected.textContent = `${dados.nickname} (${data.modelo}/${data.mark} - ${dados.version})`;
                    /* `<option selected value="${dados.modelo_user_id}">${dados.nickname} (${data.modelo}/${data.mark} - ${dados.version})</option>` 
                     $('modelo_userEdit').append(`<option selected value="${dados.modelo_user_id}">${dados.nickname} (${data.modelo}/${data.mark} - ${dados.version})</option>`);*/
                    editForm.action = "/update/maintenance/"+btnEdit[i].id;
                    nextDate.value = dados.next_date_maintenance;
                    modeloUserEdit.appendChild(optionSelected);
                }
              
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
