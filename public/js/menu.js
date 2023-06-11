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

const updatePersonnelButton = document.getElementById('update-personnel-button');
const updatePersonnelOverlay = document.getElementById('update-personnel-overlay');
const updatePersonnelModal = document.getElementById('update-personnel');
const updatePersonnelExit = document.getElementById('update-personnel-exit');
const updatePersonnelSubmit = document.getElementById('update-personnel-submit');
const updatePersonnelCancel = document.getElementById('update-personnel-cancel');
const updatePersonnelForm = document.getElementById('update-personnel-form');
const id = document.getElementById('update-personnel-id').value;
const updatePersonnelName = document.getElementById('update-personnel-name');
const updatePersonnelEmail = document.getElementById('update-personnel-email');
const updatePersonnelPasswordCurrent = document.getElementById('update-personnel-password-current');
const updatePersonnelPassword = document.getElementById('update-personnel-password');
const updatePersonnelPasswordConfirm = document.getElementById('update-personnel-password-confirm');

async function getPersonnel(id){
    const response = await fetch(
        '/get/personnel?id='+id,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['personnel'];
}

function openUpdatePersonnelModal(){
    if(updatePersonnelModal.classList.contains('hidden')){
        updatePersonnelOverlay.classList.remove('hidden');
        updatePersonnelModal.classList.remove('hidden');
        getPersonnel(id).then(personnel => {
            updatePersonnelName.value = personnel['name'];
            updatePersonnelEmail.value = personnel['email'];
        });
    }
}

function closeUpdatePersonnelModal(){
    if(!updatePersonnelModal.classList.contains('hidden')){
        updatePersonnelOverlay.classList.add('hidden');
        updatePersonnelModal.classList.add('hidden'); 
    }
}

updatePersonnelButton.addEventListener('click', openUpdatePersonnelModal);
updatePersonnelOverlay.addEventListener('click', closeUpdatePersonnelModal);
updatePersonnelExit.addEventListener('click', closeUpdatePersonnelModal);
updatePersonnelCancel.addEventListener('click', closeUpdatePersonnelModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUpdatePersonnelModal();
    }
});

updatePersonnelSubmit.addEventListener('click', function(){
    if(updatePersonnelName.value.length < 3){
        alert('Name should be at least 3 characters');
        return;
    }
    if(!validateEmail(updatePersonnelEmail.value)){
        alert('Email is not valid');
        return;
    }
    if(updatePersonnelPasswordCurrent.value.length < 8){
        alert('Current password should be at least 8 characters');
        return;
    }
    if(updatePersonnelPassword.value.length > 0){
        if(updatePersonnelPassword.value.length < 8){
            alert('Password should be at least 8 characters');
            return;
        }
        if(updatePersonnelPasswordConfirm.value != updatePersonnelPassword.value){
            alert('Passwords do not match');
            return;
        }
    }

    updatePersonnelSubmit.disabled = true;
    updatePersonnelName.value = toTitleCase(updatePersonnelName.value);
    updatePersonnelForm.submit();
});