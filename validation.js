function ValidateEmail() {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var x = document.forms['form']['email'].value;

    if (re.test(x)) {
        return true;
    } else {
        alert('You have entered an invalid email address! ');
        return false;
    }
}

function validateForm() {
    var a = document.forms['form'].email.value;
    var b = document.forms['form'].password.value;
    if (a === '' || b === '') {
        alert('Please enter all fields');
        return false;
    } else {
        if (ValidateEmail()) return true;
        else {
            return false;
        }
    }
}
