let form = document.querySelector('.email-form'),
    emailInputs = document.querySelector('.form-control');

const validateEmail = (str) => /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(str);


orm.onsubmit = function () {
    let emailVal = emailInputs.value,
        emptyInputs = Array.from(formInputs).filter(input => input.value === "");
        
    formInputs.forEach(function(input){
        if (!validateEmail(emailVal)) {
            inputEmail.classList.add('is-invalid');
            return false;
          } else {
            inputEmail.classList.remove('is-invalid');
            inputEmail.classList.add('is-valid');
          }
    });
  
    if (emptyInputs.length != 0) {
      return false;
    }