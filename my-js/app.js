const input = document.querySelector('#inp');
const btn = document.querySelector('#btn');
const toDo = document.querySelector('.to-do');

// Adding the Item to the list by pressing the Enter key.

input.addEventListener('keydown', event =>{
    if(event.key === 'Enter'){
        addItem();
    }
});

//login and register

// Get the modal Login
let modal_login = document.getElementById('id01');

// Get the modal Register
let modal_register = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_login || event.target == modal_register) {
        modal_login.style.display = "none";
        modal_register.style.display = "none";

    }
}

//When click sign in, close sign up form
function signIn(){
    document.getElementById('id01').style.display='block';
    document.getElementById('id02').style.display='none';
}

function signUp(){
    document.getElementById('id01').style.display='none';
    document.getElementById('id02').style.display='block';
}


let myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}