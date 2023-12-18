const loginForm = document.querySelector('.form .login');
const signupForm = document.querySelector('.form .signup');
const signupLink = document.getElementById('signup');
const loginLink = document.getElementById('login');

function removeAlert(inputBox, alert){
  inputBox.setAttribute('style', '');
  alert.remove();
}

function removeAlerts(){
  const alerts = document.querySelectorAll('.invalid-input');
  alerts.forEach(function(alert){
    const inputBox = alert.parentElement;
    removeAlert(inputBox, alert);
  });
}

signupLink.addEventListener('click', function(event) {
  event.preventDefault();

  removeAlerts();
  loginForm.classList.remove('active');
  signupForm.classList.add('active');
});

loginLink.addEventListener('click', function(event) {
  event.preventDefault();

  removeAlerts();
  loginForm.classList.add('active');
  signupForm.classList.remove('active');

});

function createAlert(message){
  const alert = document.createElement('div');
  alert.classList.add('invalid-input');
  
  const alertMessage = document.createElement('p');
  alertMessage.textContent = message;
  alert.appendChild(alertMessage);
  return alert;
}
function validateFormInput(form){
  const inputs = form.querySelectorAll('input');
  let valid = true;

  inputs.forEach(function(input){
    const inputBox = input.parentElement;
    if (input.value === '' && !inputBox.querySelector('.invalid-input')){
      const alert = createAlert('Please fill in this field');
      inputBox.appendChild(alert);
      inputBox.setAttribute('style', 'margin-bottom: 43px;');
      valid = false;
    } else if (input.value == '' && inputBox.querySelector('.invalid-input')) {
      valid = false;
    } else {
      const alert = inputBox.querySelector('.invalid-input');
      if (alert){
        removeAlert(inputBox, alert);
      }
    }
  });

  return valid;
}

function handleLogin() {
  const valid = validateFormInput(loginForm);

  if (!valid){
    return;
  }

  const email = loginForm.querySelector('#email').value;
  const password = loginForm.querySelector('#password').value;

  firebase.auth().signInWithEmailAndPassword(email, password)
    .then(function(userCredential) {
      const user = userCredential.user;
      window.location = 'index.html';
    })
    .catch(function(error) {
      const errorCode = error.code;
      const errorMessage = error.message;
      const alert = createAlert(errorMessage);
      loginForm.appendChild(alert);
    });
}

function handleSignUp(){
  const valid = validateFormInput(signupForm);

  if (!valid){
    return;
  }

  const email = signupForm.querySelector('#email').value;
  const password = signupForm.querySelector('#password').value;

  firebase.auth().createUserWithEmailAndPassword(email, password)
    .then(function(userCredential) {
      const user = userCredential.user;
      window.location = 'index.html';
    })
    .catch(function(error) {
      const errorCode = error.code;
      const errorMessage = error.message;
      const alert = createAlert(errorMessage);
      signupForm.appendChild(alert);
    });
}