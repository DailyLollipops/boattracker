const hamburgerMenu = document.getElementById('menu');
const sidebar = document.getElementById('sidebar');
const updateContactButton = document.getElementById('update-contact-button');
const updateContactOverlay = document.getElementById('update-contact-overlay');
const updateContactModal = document.getElementById('update-contact');
const updateContactExit = document.getElementById('update-contact-exit');
const updateContactForm = document.getElementById('update-contact-form');
const updateContactNumber = document.getElementById('update-contact-number');
const updateContactCancel = document.getElementById('update-contact-cancel');
const updateContactSubmit = document.getElementById('update-contact-submit');

hamburgerMenu.addEventListener('click', function(){
    if(sidebar.classList.contains('hidden')){
        sidebar.classList.remove('hidden');
    }
    else{
        sidebar.classList.add('hidden')
    }
});

async function getContact(){
    const response = await fetch(
        '/get/contact',
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['contact'];
}

function openUpdateContactModal(){
    if(updateContactModal.classList.contains('hidden')){
        updateContactOverlay.classList.remove('hidden');
        updateContactModal.classList.remove('hidden');
        getContact().then(contact => {
            updateContactNumber.value = contact;
        });
    }
}

function closeUpdateContactModal(){
    if(!updateContactModal.classList.contains('hidden')){
        updateContactOverlay.classList.add('hidden');
        updateContactModal.classList.add('hidden');
    }
}

updateContactButton.addEventListener('click', openUpdateContactModal);
updateContactOverlay.addEventListener('click', closeUpdateContactModal);
updateContactExit.addEventListener('click', closeUpdateContactModal);
updateContactCancel.addEventListener('click', closeUpdateContactModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUpdateContactModal();
    }
});

updateContactSubmit.addEventListener('click', function(){
    if(!(/^(09)\d{9}$/.test(updateContactNumber.value))){
        alert('Please enter a valid contact number\nShould contain 11 digit starting with "09"');
        return;
    }

    updateContactSubmit.disabled = true;
    updateContactForm.submit();
});