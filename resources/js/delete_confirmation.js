// Raccolgo gli elementi
const deleteForms = document.querySelectorAll('.delete-form');
const modal = document.getElementById('modal');
const modalBody = document.querySelector('.modal-body');
const modalTitle = document.querySelector('.modal-title');
const confirmatioButton = document.getElementById('modal-confirmation-button');

let activeForm = null;

deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        console.log('ciao')
        e.preventDefault();

        activeForm = form;

        confirmatioButton.innerText = 'Elimina';
        confirmatioButton.className = 'btn btn-danger';
        modalTitle.innerText = 'Elimina appartamento';
        modalBody.innerText = 'Sicuro di voler eliminare questo appartamento?';
    });
});

confirmatioButton.addEventListener('click', () => {
    if (activeForm) activeForm.submit();
});

modal.addEventListener('hidden.bs.modal', () => {
    activeForm = null;
})