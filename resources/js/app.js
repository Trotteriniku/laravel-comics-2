import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const buttons = document.querySelectorAll('.cancel-button');
// console.log(buttons);
buttons.forEach((button)=>{
    button.addEventListener('click', (event) =>{
        // impedisco che il forma venga eseguito
        event.preventDefault();

        // prendo il titolo dell'item dal bottone
        const dataTitle = button.getAttribute("data-item-title");

        // prendo la modale
        const modal= document.getElementById("deleteModal");

        // creo nuova modale di bootstrap
        const bootstrapModal = new bootstrap.Modal(modal);
        // mostro la modale usando il metodo show
        bootstrapModal.show();

        //prendo elemento della modale dove voglio inserire il titolo
        const title = modal.querySelector("#modal-item-title");
        // inserisco il titolo nella modal
        title.textContent = dataTitle;

        const buttonDelete = modal.querySelector(".btn-primary");

        buttonDelete.addEventListener('click',()=>{
            button.parentElement.submit();
        })
    });
})
