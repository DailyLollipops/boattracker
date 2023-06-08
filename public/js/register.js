const registerOwnerOverlay = document.getElementById('register-owner-overlay');
const registerOwnerModal = document.getElementById('register-owner');
const registerOwnerExitButton = document.getElementById('register-owner-exit');
const registerOwnerForm = document.getElementById('register-boat-form');
const registerOwnerNameField = document.getElementById('register-owner-name');
const registerOwnerContactField = document.getElementById('register-owner-contact');
const registerOwnerBarangayField = document.getElementById('register-owner-barangay');
const registerOwnerCancel = document.getElementById('register-owner-cancel');
const registerOwnerSubmit = document.getElementById('register-owner-submit');

var registerOwnerModalOpened = false;
function openRegisterOwnerModal(){
    if(!registerOwnerModalOpened){
        registerOwnerOverlay.classList.remove('hidden');
        registerOwnerModal.classList.remove('hidden');
        registerOwnerModalOpened = true;
    }
}

function closeRegisterOwnerModal(){
    if(registerOwnerModalOpened){
        registerOwnerModal.classList.add('hidden');
        registerOwnerOverlay.classList.add('hidden');
        registerOwnerModalOpened = false;    
    }
}

registerOwnerExitButton.addEventListener('click', closeRegisterOwnerModal);
registerOwnerOverlay.addEventListener('click',closeRegisterOwnerModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeRegisterOwnerModal();
    }
});
registerOwnerCancel.addEventListener('click',closeRegisterOwnerModal);

registerOwnerSubmit.addEventListener('click', function(){
    if(registerOwnerNameField.value.length < 3){
        alert('Owner Name should be at least 3 characters');
        return;
    }
    if(registerOwnerContactField.value.length < 0){
        alert('Please enter owner contact');
        return;
    }
    if(registerOwnerBarangayField.value == 'null'){
        alert('Please select barangay');
        return;
    }
    registerOwnerSubmit.disabled = true;
    registerOwnerForm.submit()
});



const registerBoatFAB = document.getElementById('boat-fab');
const registerBoatOverlay = document.getElementById('register-boat-overlay');
const registerBoatModal = document.getElementById('register-boat');
const registerBoatExitButton = document.getElementById('register-boat-exit');
const registerBoatForm = document.getElementById('register-boat-form');
const registerBoatNameField = document.getElementById('register-boat-name');
const registerBoatLicenseField = document.getElementById('register-boat-license');
const registerBoatTypeField = document.getElementById('register-boat-type');
const registerBoatColorField = document.getElementById('register-boat-color');
const registerBoatOwnerField = document.getElementById('register-boat-owner');
const registerBoatSubmit = document.getElementById('register-boat-submit');
const registerBoatCancel = document.getElementById('register-boat-cancel');

var registerBoatModalOpened = false;
function openRegisterBoatModal(){
    if(!registerBoatModalOpened){
        registerBoatOverlay.classList.remove('hidden');
        registerBoatModal.classList.remove('hidden');
        registerBoatModalOpened = true;
    }
}

function closeRegisterBoatModal(){
    if(registerBoatModalOpened){
        registerBoatModal.classList.add('hidden');
        registerBoatOverlay.classList.add('hidden');
        registerBoatModalOpened = false;    
    }
}

registerBoatFAB.addEventListener('click', openRegisterBoatModal);
registerBoatExitButton.addEventListener('click', closeRegisterBoatModal);
registerBoatOverlay.addEventListener('click',closeRegisterBoatModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeRegisterBoatModal();
    }
});
registerBoatCancel.addEventListener('click',closeRegisterBoatModal);

registerBoatSubmit.addEventListener('click', function(){
    if(registerBoatNameField.value.length < 3){
        alert('Boat Name should be at least 3 characters');
        return;
    }
    if(registerBoatLicenseField.value.length < 0){
        alert('Please enter boat license');
        return;
    }
    if(registerBoatTypeField.value == 'null'){
        alert('Please select boat type');
        return;
    }
    if(registerBoatColorField.value == 'null'){
        alert('Please select color type');
        return;
    }
    if(registerBoatOwnerField.value == 'null'){
        alert('Please select owner');
        return;
    }
    registerBoatSubmit.disabled = true;
    registerBoatForm.submit()
});


const registerOwnerButton = document.getElementById('register-owner-button');
const registerBoatButton = document.getElementById('register-boat-button');

registerOwnerButton.addEventListener('click', function(){
    closeRegisterBoatModal();
    openRegisterOwnerModal();
});

registerBoatButton.addEventListener('click', function(){
    closeRegisterOwnerModal();
    openRegisterBoatModal();
});