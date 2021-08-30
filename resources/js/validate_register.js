const regUsername = document.getElementById('regUsername');
const regPassword = document.getElementById('regPassword');
const regConfirmPassword = document.getElementById('regConfirmPass');
const regAccountType = document.getElementById('accountType');
const regEmail = document.getElementById('email');
const regFirstname = document.getElementById('firstname');
const regLastname = document.getElementById('lastname');
const regBirthdate = document.getElementById('birthdate');
const regGender = document.getElementById('genderOptions');
const regAddress = document.getElementById('address');
const regContact = document.getElementById('contact');

const reSpaces = /^\S*$/;

const reName = /^[A-Za-z]+([A-Za-z]+)*$/;

const reLName = /^[A-Za-z]+([A-Za-z]+)*/

const reAdd = /^(\d+)|[A-Za-z]+([A-Za-z]+)*/;

const reDate = /^(0?[1-9]|1[0-2])\/([0-2]?[1-9]|[1-3][01])\/\d{4}$/;

const reContact = /^[0][1-9]\d{9}|^[6][1-9]\d{10}/; //Regular expression accepting numbers starting with 09 or 639



function addBlur(){
    regUsername.addEventListener('blur', validateUsername);
    regPassword.addEventListener('blur', validatePassword);
    regConfirmPassword.addEventListener('blur', validateConfirmPassword);
    regAccountType.addEventListener('blur', validateAccountType);
    regEmail.addEventListener('blur',validateEmail);
    regFirstname.addEventListener('blur',validateFirstname);
    regLastname.addEventListener('blur',validateLastname);
    regBirthdate.addEventListener('blur',validateBirthdate);
    regGender.addEventListener('blur', validateGender);
    regAddress.addEventListener('blur',validateAddress);
    regContact.addEventListener('blur',validateContact);
}




function validateUsername() {
    // Performs reg expression test to the value of the variable username
    if (regUsername.value === "" || regUsername.value == null) {
        regUsername.classList.remove('is-valid');
        regUsername.classList.add('is-invalid');
        return false
    } else if (reSpaces.test(regUsername.value)) {
        // removes the class 'is-invalid' attribute
        regUsername.classList.remove('is-invalid');
        regUsername.classList.add('is-valid');
        return true;
    } else {
        regUsername.classList.remove('is-valid');
        regUsername.classList.add('is-invalid');
        return false
    }
}

function validatePassword() {
    // Password must contain an uppercase letter, a number and must be at least 8 characters long
    const re = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$/;

    if (re.test(regPassword.value) && reSpaces.test(regPassword.value)) {
        regPassword.classList.remove('is-invalid');
        regPassword.classList.add('is-valid');
        return true;
    } else {
        regPassword.classList.add('is-invalid');
        regPassword.classList.remove('is-valid');
        return false;
    }
}

function validateConfirmPassword() {
    // Confirm password must be the same value as password and password not be empty
    if (regConfirmPassword.value === regPassword.value && regPassword.value !== "") {
        regConfirmPassword.classList.remove('is-invalid');
        regConfirmPassword.classList.add('is-valid');
        return true;
    }else{
        regConfirmPassword.classList.add('is-invalid');
        regConfirmPassword.classList.remove('is-valid');
        return false;
    }
}

function validateAccountType() {
    // If any of the account is 'customer' or 'seller' it will be passed
    if (regAccountType.value === 'customer' || regAccountType.value === 'seller') {
        regAccountType.classList.remove('is-invalid');
        regAccountType.classList.add('is-valid');
        return true;
    } else {
        regAccountType.classList.add('is-invalid');
        regAccountType.classList.remove('is-valid');
        return false;
    }
}

function validateEmail() {
    // accepts anyname@anyname.com
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(re.test(regEmail.value)){
        regEmail.classList.remove('is-invalid');
        regEmail.classList.add('is-valid');
        return true;
    }else{
        regEmail.classList.add('is-invalid');
        regEmail.classList.remove('is-valid');
        return false;
    }
}

function validateFirstname(){
    // Checks if the firstname has any whitespaces
    if(reName.test(regFirstname.value)){
        regFirstname.classList.remove('is-invalid');
        regFirstname.classList.add('is-valid');
        return true;
    }else{
        regFirstname.classList.remove('is-valid');
        regFirstname.classList.add('is-invalid');
        return false;
    }
}

function validateLastname(){
    // Accepts last names with spaces
    if(reLName.test(regLastname.value) && regLastname.value !== ""){
        regLastname.classList.remove('is-invalid');
        regLastname.classList.add('is-valid');
        return true;
    }else{
        regLastname.classList.remove('is-valid');
        regLastname.classList.add('is-invalid');
        return false;
    }
}

function validateBirthdate(){
    /*Checks if the birthdate chosen is valid by comparing the current date and the
     inputted date.

     */
    // creates a new date object representing the current date
    let currentDate = new Date();

    // creates a new date obj with the value of the birthDate field
    let birthdate = new Date(regBirthdate.value);

    if(reDate.test(regBirthdate.value) && birthdate < currentDate){
        regBirthdate.classList.remove('is-invalid');
        regBirthdate.classList.add('is-valid');
        return true;
    }else{
        regBirthdate.classList.remove('is-valid');
        regBirthdate.classList.add('is-invalid');
        return false;
    }
}

function validateGender(){

    if(regGender.value === 'm' || regGender.value === 'f' || regGender.value === 'o'){
        regGender.classList.remove('is-invalid');
        regGender.classList.add('is-valid');
        return true;
    }else{
        regGender.classList.remove('is-valid');
        regGender.classList.add('is-invalid');
        return false;
    }
}

function validateAddress(){

    if(reAdd.test(regAddress.value) && regAddress.value.length > 10){
        regAddress.classList.remove('is-invalid');
        regAddress.classList.add('is-valid');
        return true;
    }else{
        regAddress.classList.remove('is-valid');
        regAddress.classList.add('is-invalid');
        return false;
    }
}

function validateContact(){

    if(reContact.test(regContact.value)){
        regContact.classList.remove('is-invalid');
        regContact.classList.add('is-valid');
        return true;
    }else{
        regContact.classList.remove('is-valid');
        regContact.classList.add('is-invalid');
        return false;
    }
}

(function () {
    // const forms = document.querySelectorAll('.needs-validation');
    const forms = document.getElementById('registerForm');

    for (let form of forms) {
        form.addEventListener(
            'submit',
            function (event) {
                if (
                    !form.checkValidity() ||
                    !validateUsername() ||
                    !validatePassword() ||
                    !validateConfirmPassword() ||
                    !validateEmail() ||
                    !validateFirstname() ||
                    !validateLastname() ||
                    !validateBirthdate() ||
                    !validateGender() ||
                    !validateAddress() ||
                    !validateContact()

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


