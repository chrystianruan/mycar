setTimeout(function() {
    let divAlert = document.getElementById("alert");
    divAlert.style.display = "none";
}, 3500);

let lock = document.getElementById('lock');
function showPassword() {
   
    let password = document.getElementById('password');
    
        if(password.getAttribute('type') == 'password') {
            password.setAttribute('type', 'text');
            lock.setAttribute('class', 'fas fa-lock-open');
        } else {
            password.setAttribute('type', 'password');
            lock.setAttribute('class', 'fas fa-lock');
        }

}

lock.addEventListener("click", showPassword);

