const signUpButton=document.getElementById('registerBtn');
const logInButton=document.getElementById('logIn');
const signUpForm=document.getElementById('signupForm');
const loginform=document.getElementById('logInForm');

signUpButton.addEventListener('click', function(){
  loginform.style.display="none";
  signUpForm.style.display="block";
})
logInButton.addEventListener('click', function(){
  loginform.style.display="block";
  signUpForm.style.display="none";
})