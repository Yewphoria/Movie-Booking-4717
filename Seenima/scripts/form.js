//Script form js

//Function to validate data
function nameValidation(){
    const nameValue = document.getElementById("CustName").value;
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

function emailValidation() {
    const emailValue = document.getElementById("CustEmail").value;
    const emailError= document.getElementById("emailError");


    const regexEmail=/^[a-zA-Z0-9.-]+@([a-zA-Z0-9-])+(\.[a-zA-Z]+){0,3}\.[a-zA-Z]{2,3}$/; //email format    //[a-zA-Z0-9.-]+: Matches one or more word characters, hyphens, or periods for the user name part.
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

function commentValidation(){
    const expInput = document.getElementById("comment");
    const expError= document.getElementById("commentError");

    const regComment = /[\w\-\.]*/g;    //\w matches any word character 
    const enteredComment=commentInput.value;
    const charCount=enteredComment.match(regComment).join('').length;
    
    if(charCount===0){
        commentError.textContent = 'Field must not be left blank.';
    } else{
        commentError.textContent = '';
    }
}

function handleSubmit(event) {

    event.preventDefault();
    const nameValue = document.getElementById("CustName").value;
    const emailValue = document.getElementById("CustEmail").value;
    const commentInput = document.getElementById("comment").value;

    if (nameValue === '' || emailValue === '' || commentInput === '') {
        alert('Please fill out all fields.');
        return false;
    }


    const nameError= document.getElementById("nameError");
    const emailError= document.getElementById("emailError");
    const commentError= document.getElementById("commentError");

    if (nameError.textContent !== '' || emailError.textContent !== '' || commentError.textContent !== '') {
        alert('Please fix all errors before submitting.');
        return false;
    }

    const form = document.getElementById("form");
    form.submit();
    return true

}



// function validate() {
//     var name=document.getElementById("CustName").value;  //convert from object to string
//     var email=document.getElementById("CustEmail").value;  //convert from object to string
//     var date=document.getElementById("myDate").value; //convert from object to string

//     var validationfailed=false; //flag to check if validation failed
//     var today=new Date();
//     var currentdate=today.toISOString().split('T')[0];
//     const regexName=/^[a-zA-Z\s]+$/; //alphabet charaters and space

  
//     if(regexName.test(name)==false){      //if else to check valid
//         alert("Name is invalid");
//         validationfailed=true;
        
//     }
   


   
//     const regexEmail=/^[a-zA-Z0-9.-]+@([a-zA-Z0-9-])+(\.[a-zA-Z]+){0,3}\.[a-zA-Z]{2,3}$/; //email format    //[a-zA-Z0-9.-]+: Matches one or more word characters, hyphens, or periods for the user name part.
//     // + means repeat more than once , 
//     //(\.[a-zA-Z]+){0,3} : Matches zero to three occurrences of a period followed by one or more word characters for the domain name part.  meaning 0 to 3 extension
//     //\.[a-zA-Z]{2,3} : for last extension it has to be 2-3 characters.

//    if(regexEmail.test(email)==false){      //if else to check valid
//         alert("Email is invalid");
//         validationfailed=true;
//     }
    


//    if(date<=currentdate){
//          alert("Please select a forthcoming date.");
//          validationfailed=true;
//     }

//     if(validationfailed==false){
//     alert("Your form has been submitted");
//     }


        
// }


// function init(){
//     var form=document.getElementById("form");
//     form.onsubmit=validate;
    
// }

// window.onload=init;