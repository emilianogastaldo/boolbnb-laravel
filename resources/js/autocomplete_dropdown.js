// Script per visualizzare gli appartamenti ricevuti dalla chiamata API
const keyApi = 'MZLTSagj2eSVFwXRWk7KqzDDNLrEA6UF';
// Coordinate di Roma <3
const lat = '41.9027835';
const lon = '12.4963655';
const radius = '20000';

// Recupero gli elementi dal form
const flatsList = document.getElementById("flats-list");
const inputAddress = document.getElementById("input-address");
const formAddress = document.getElementById("form-address");

// Evento per far apparire la tendina
inputAddress.addEventListener('input', () => {
        formAddress.value = null;
        flatsList.classList.remove('d-none');            
        if (inputAddress.value != '') getApiFlats(inputAddress.value);
    });
// Evento per far sparire la tendina se si preme al di fuori di essa
window.addEventListener('click', () =>{
    flatsList.classList.add('d-none');             
});

// Funzione per recuperare gli appartamenti
function getApiFlats(address) {
    fetch(`https://api.tomtom.com/search/2/search/${address}.json?key=${keyApi}&countrySet=IT&limit=5&lat=${lat}&lon=${lon}&radius=${radius}`)
    .then(response => response.json())
    .then(data => {
        // console.log(data.results);
        let message = '';
        data.results.forEach(flat => {
            message += `<li class="list-group-item" role="button"> ${flat.address.freeformAddress} </li>`;
        });
        // Se non trovo appartamenti stampo un messaggio di avviso
        if(!message) message = `<li class="list-group-item"> Non ci sono appartamenti </li>`;            
        flatsList.innerHTML = message;

        // Salvo il nome della via solo al click sulla tendina
        const addresses = document.querySelectorAll('li');
        for (const address of addresses) {
            address.addEventListener('click', () => {   
                //  Se preme il messaggio di avviso, svuoto l'input
                if(address.innerText === 'Non ci sono appartamenti'){
                    inputAddress.value = '';              
                    flatsList.classList.add('d-none'); 
                } else {
                    inputAddress.value = address.innerText;               
                    formAddress.value = address.innerText;
                    flatsList.classList.add('d-none');               
                }
            })
        }
    })
    .catch( err => {
        console.error('Si è verificato un errore durante il recupero dei dati dall\'API:', err);
    })
}