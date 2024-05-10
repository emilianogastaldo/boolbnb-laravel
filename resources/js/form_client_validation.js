   // Prendo i campi dal DOM
   const form = document.getElementById('form');

   // Campi
   const title = document.getElementById('title')
   const address = document.getElementById('input-address')
   const room = document.getElementById('room')
   const bed = document.getElementById('bed')
   const bathroom = document.getElementById('bathroom')
   const sq = document.getElementById('sq_m')
   const description = document.getElementById('description')
   const image = document.getElementById('image')
   const changeImage = document.getElementById('change-image')
   const services = document.querySelectorAll('.services');

   // Alerts
   const titleAlert = document.getElementById('title-alert')
   const addressAlert = document.getElementById('address-alert')
   const roomAlert = document.getElementById('room-alert')
   const bedAlert = document.getElementById('bed-alert')
   const bathAlert = document.getElementById('bathroom-alert')
   const sqAlert = document.getElementById('sq-alert')
   const imageAlert = document.getElementById('image-alert')
   const descriptionAlert = document.getElementById('description-alert')
   const servicesAlert = document.getElementById('services-alert')


   // Faccio un addEventListenter al submit del form
   form.addEventListener('submit', (e) => {
       // Impedisco il comportamento naturale del form
       e.preventDefault();

       const titleValue = title.value.trim();
       const addressValue = address.value.trim();
       const roomValue = room.value.trim();
       const bedValue = bed.value.trim();
       const bathroomValue = bathroom.value.trim();
       const sqValue = sq.value.trim();
       const descriptionValue = description.value.trim();
       let hasService = false;
       
        // Verifica se è stato selezionato un nuovo file nell'input immagine
        let isImageSelected = image.files.length > 0;
       
        // Verifica se c'è una vecchia immagine
        let isChangeImageChecked = changeImage.value;
       
        // Se c'è una vecchia immagine l'immagine risulterà selezionata 
        if(isChangeImageChecked) isImageSelected = true;

        // Se c'è una nuova immagine l'immagine risulterà selezionata 
        if(isImageSelected) isChangeImageChecked = true;

        // Determina se l'immagine è valida
        const isImageValid = isImageSelected || isChangeImageChecked;

        // Se l'immagine non è valida
        if(!isImageValid){
            // Compare l'alert
            imageAlert.classList.remove('d-none');

            // Scrivo il testo dell'alert
            imageAlert.innerText = 'Inserire un\'immagine';
        } else{
            // Oppure rimuovo l'alert
            imageAlert.classList.add('d-none');
        }

        if(!titleValue){
           // Compare l'alert
           titleAlert.classList.remove('d-none');

           // Scrivo il testo dell'alert
           titleAlert.innerText = 'Inserire il nome dell\'appartamento';
        }else {
            // Oppure rimuovo l'alert
            titleAlert.classList.add('d-none');
        }

        if(!addressValue){
           // Compare l'alert
           addressAlert.classList.remove('d-none');

           // Scrivo il testo dell'alert
           addressAlert.innerText = 'Inserire l\'indirizzo';
        }else {
            // Oppure rimuovo l'alert
            addressAlert.classList.add('d-none');
        }

        if(!roomValue){
           // Compare l'alert
           roomAlert.classList.remove('d-none');

           // Scrivo il testo dell'alert
           roomAlert.innerText = 'Inserire numero stanze';
        }else {
            // Oppure rimuovo l'alert
            roomAlert.classList.add('d-none');
        }

        if(!bedValue){
            // Compare l'alert
            bedAlert.classList.remove('d-none');

            // Scrivo il testo dell'alert
            bedAlert.innerText = 'Inserire numero letti';
        }else {
            // Oppure rimuovo l'alert
            bedAlert.classList.add('d-none');
        }

        if(!bathroomValue){
            // Compare l'alert
            bathAlert.classList.remove('d-none');

            // Scrivo il testo dell'alert
            bathAlert.innerText = 'Inserire numero bagni';
        }else {
            bathAlert.classList.add('d-none');
        }

        if(!sqValue){
            // Compare l'alert
            sqAlert.classList.remove('d-none');

            // Scrivo il testo dell'alert
            sqAlert.innerText = 'Inserire il metri quadri';
        } else {
            // Oppure rimuovo l'alert
            sqAlert.classList.add('d-none');
        }

        if(!descriptionValue){
            // Compare l'alert
            descriptionAlert.classList.remove('d-none');

            // Scrivo il testo dell'alert
            descriptionAlert.innerText = 'Inserire una descrizione';
        } else {
            // Oppure rimuovo l'alert
            descriptionAlert.classList.add('d-none');
        }

       // Controllo se c'è almeno un servizio checkato
       services.forEach(service => { if(service.checked) return hasService = true; })

        if(!hasService){
            // Compare l'alert
            servicesAlert.classList.remove('d-none');

            // Scrivo il testo dell'alert
            servicesAlert.innerText = 'Inserire almeno un servizio';
        }else {
            // Oppure rimuovo l'alert
            servicesAlert.classList.add('d-none');
        }
        
        // Controllo che tutti i campi del form siano validi
        const isFormValid = titleValue && addressValue && roomValue && bedValue && bathroomValue && isImageValid && sqValue && descriptionValue && hasService;

        // Se tutti i campi sono validi invio il form
        if(isFormValid) form.submit();
        
   });