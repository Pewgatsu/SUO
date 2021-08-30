const reSpaces = /^\S*$/;

username.addEventListener("blur", validateUsername);
password.addEventListener("blur", validatePassword);

function validateUsername(){
    if (username.value === "" || username.value == null) {
        username.classList.remove('is-valid');
        username.classList.add('is-invalid');
        return false
    } else if (reSpaces.test(username.value)) {
        // removes the class 'is-invalid' attribute
        username.classList.remove('is-invalid');
        username.classList.add('is-valid');
        return true;
    } else {
        username.classList.remove('is-valid');
        username.classList.add('is-invalid');
        return false
    }
}

function validatePassword() {
    if(password.value ==="" || password.value == null){
        password.classList.remove('is-valid');
        password.classList.add('is-invalid');
        return false;
    }else{
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        return true;
    }
}



(function () {
    // const forms = document.querySelectorAll('.needs-validation');
    const forms = document.getElementById('loginForm');

    for (let form of forms) {
        form.addEventListener(
            'submit',
            function (event) {
                if (
                    !form.checkValidity() ||
                    !validateUsername() ||
                    !validatePassword()
                ) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    form.classList.add('was-validated');
                }
            },
            false
        );
    }
})();
