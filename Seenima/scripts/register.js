function namesValidation(){
    const nameValue = document.getElementById("name").value;
    const nameError= document.getElementById("nameError");

    const regexName=/^[a-zA-Z\s]+$/; //alphabet charaters and space 

    const nameWithoutSpacesCharCount = nameValue.match(/[\w]*/g).join('').length;  //count the length of char without space  \w matches any word character

    // Check if the input is null or empty
    if (!nameValue) {
        nameError.textContent = '';  // Clear error message
        return;
    }

    if(regexName.test(nameValue)==false){      //if else to check valid
        nameError.textContent = 'Name cannot contain numbers or special characters.';
    } else if (nameWithoutSpacesCharCount < 3) {
        nameError.textContent = 'Name must be at least 3 characters long';
        
    }  else {
        nameError.textContent = '';
    } 

}

function emailsValidation() {
    const emailValue = document.getElementById("email").value;
    const emailError= document.getElementById("emailError");


    const regexEmail=/^[a-zA-Z0-9.-]+@([a-zA-Z0-9-])+(\.[a-zA-Z]+){0,2}\.[a-zA-Z]{2,3}$/; //email format    //[a-zA-Z0-9.-]+: Matches one or more word characters, hyphens, or periods for the user name part.
//     // + means repeat more than once , 
//     //(\.[a-zA-Z]+){0,3} : Matches zero to three occurrences of a period followed by one or more word characters for the domain name part.  meaning 0 to 3 extension
//     //\.[a-zA-Z]{2,3} : for last extension it has to be 2-3 characters.

    // Check if the input is null or empty
    if (!emailValue) {
        emailError.textContent = ''; 
        return; // Clear error message
    }

    if (regexEmail.test(emailValue)==false) {
        emailError.textContent = 'Invalid Email Address';
    } else {
        emailError.textContent = '';
    }
}


function  pwValidation(){
    const pwInput = document.getElementById("password");
    const pwInput2 = document.getElementById("password2");
    const pwError= document.getElementById("pwError");
    
    if(pwInput.value === pwInput2.value){
        pwError.textContent = '';
    } else{
        pwError.textContent = 'Re-enter the correct password';
    }
}

function dateValidation(){
    const dateInput = document.getElementById("date");
    const dateError= document.getElementById("dateError");

    const enteredDate = new Date(dateInput.value);
    const today = new Date();

    if(enteredDate>=today){
        dateError.textContent = 'Please enter a past date.';
        dateInput.value = ''; // Clear the input field
    } else{
        dateError.textContent = '';
    }

}

function registerSubmit() {
    const nameValue = document.getElementById("name").value;
    const emailValue = document.getElementById("email").value;
    const dateInput = document.getElementById("date").value;
    const pwInput2 = document.getElementById("password2").value;

    if (nameValue === '' || emailValue === '' || dateInput === '' || pwInput2 === '') {
        alert('Please fill out all fields.');
        return false; // Prevent form submission
    }

    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const pwError = document.getElementById("pwError");
    const dateError = document.getElementById("dateError");

    if (nameError.textContent !== '' || emailError.textContent !== '' || pwError.textContent !== '' || dateError.textContent !== '') {
        alert('Please fix all errors before submitting.');
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}