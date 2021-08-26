const reSpaces = /^\S*$/;


function validateFields(){
    validateUsername();
    validatePassword();
}

function validateUsername(){
    const username = document.getElementById('usernameField')
    username.addEventListener("blur", validateUsername);

    if (username.value === "" || username.value == null) {
        username.classList.remove('is-valid');
        username.classList.add('is-invalid');
        return false
    } else if (reSpaces.test(username.value)) {
        // removes the class 'is-invalid' attribute
        console.log(reSpaces.test(username.value));
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
    const password = document.getElementById('passwordField');
    password.addEventListener("blur", validatePassword);

    // Password must contain an uppercase letter, a number and must be at least 8 characters long
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
    const forms = document.querySelectorAll('.needs-validation');

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
