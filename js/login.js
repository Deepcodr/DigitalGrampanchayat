function toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
})

function validateRegistration(){
    if(document.getElementById('user-pass').value===document.getElementById('user-repeatpass').value)
    {
        return true;
    }
    else
    {
        alert("passwords should match");
        return false;
    }
}

function hidetoast(){
    $('#successtoast').css('display','none');
    $('#dangertoast').css('display','none');
}