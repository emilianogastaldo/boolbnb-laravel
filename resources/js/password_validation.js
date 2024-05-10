// Prendo i campi dal DOM
const form = document.querySelector('form');
const alert = document.getElementById('psw-alert');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('password-confirm');

// Faccio un addEventListenter al submit del form
form.addEventListener('submit', function (e) {
    // Impedisco il comportamento naturale del form
    e.preventDefault();

    // Prendo i valori dei campi password e confirmPassword
    const passwordValue = password.value.trim();
    const confPasswordValue = confirmPassword.value.trim();

    // Se si prova a mandare il form senza questi 2 campi
    if(!passwordValue && !confPasswordValue){
        // Compare l'alert
        alert.classList.remove('d-none');

        // Scrivo il testo dell'alert
        alert.innerText = 'Entrambi i campi password devono essere compilati';
      
      // Se invece i value delle due password sono diverse
    } else if(passwordValue !== confPasswordValue){
        // Compare l'alert
        alert.classList.remove('d-none');

        // Scrivo il testo dell'alert
        alert.innerText = 'Le password non coincidono';

      // Altrimenti  
    } else {
        // Invia il form
        form.submit();
    }
});