const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
// Recupero l'input in cui carico il file dell'immagine
const imageField = document.getElementById('image');
// Recupero dove farò vedere la preview
const previewField = document.getElementById('preview');

// Recupero bottone e input-group
const changeImageButton = document.getElementById('change-image-button');
const previousImageField = document.getElementById('previous-image-field');


let blobUrl;

imageField.addEventListener('change', () => {
    // controllo se ho il file
    if (imageField.files && imageField.files[0]) {
        // prendo il file
        const file = imageField.files[0];
        //  URL temporaneo
        blobUrl = URL.createObjectURL(file);

        previewField.src = blobUrl;
    }
    else {
        previewField.src = placeholder;
    }

});

// I blob sono pesanti, quindi quando lascio la pagina devo cancellarlo
window.addEventListener('beforeunload', () => {
    if (blobUrl) URL.revokeObjectURL(blobUrl);
});

// Al click del bottone cambio input mostrato
changeImageButton.addEventListener('click', () => {
    //Aggiungo la classe d-none a previousImageField
    previousImageField.classList.add('d-none');

    //Rimuovo la classe d-none a previousImageField
    imageField.classList.remove('d-none');

    // Rimetto il placeholder
    previewField.src = placeholder;

    //Richiamo il click sul field per non dover premere "Choose File" dopo
    imageField.click();
})