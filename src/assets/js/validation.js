 let form = document.querySelector('.form-horizontal'),
     formInputs = document.querySelectorAll('.input-form'),
     inputName = document.querySelector('.input-name-form'),
     inputPass = document.querySelector('.input-pass-form'),
     inputEmail = document.querySelector('.input-email-form');

 const validateEmail = (str) => /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(str);
 const validateName = (str) => /^[A-Za-z]{3,20}$/.test(str);
 const validatePass = (str) => /^[A-Za-z0-9%$;_]{4,30}$/.test(str);

 form.onsubmit = function () {
   let emailVal = inputEmail.value;
       nameVal = inputName.value;
       passVal = inputPass.value,
       emptyInputs = Array.from(formInputs).filter(input => input.value === "");
      
   formInputs.forEach(function(input){
     if (input.value === '') {
       input.classList.add('is-invalid');
     } else {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
     }
   });

   if (emptyInputs.length != 0) {
     return false;
   }

   if (!validateEmail(emailVal)) {
     inputEmail.classList.add('is-invalid');
     return false;
   } else {
     inputEmail.classList.remove('is-invalid');
     inputEmail.classList.add('is-valid');
   }

   if (!validateName(nameVal)) {
     inputName.classList.add('is-invalid');
     return false;
   } else {
     inputName.classList.remove('is-invalid');
     inputName.classList.add('is-valid');
   }

   if (!validatePass(passVal)) {
     inputPass.classList.add('is-invalid');
     return false;
   } else {
     inputPass.classList.remove('is-invalid');
     inputPass.classList.add('is-valid');
   }



 }