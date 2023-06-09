function toTitleCase(str) {
    return str.replace(
      /\w\S*/g,
      function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      }
    );
}

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };

const registerOwnerOverlay = document.getElementById('register-owner-overlay');
const registerOwnerModal = document.getElementById('register-owner');
const registerOwnerExitButton = document.getElementById('register-owner-exit');
const registerOwnerForm = document.getElementById('register-owner-form');
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
    if(!(/^(09)\d{9}$/.test(registerOwnerContactField.value))){
        alert('Please enter a valid contact number\nShould contain 11 digit starting with "09"');
        return;
    }
    if(registerOwnerBarangayField.value == 'null'){
        alert('Please select barangay');
        return;
    }
    registerOwnerSubmit.disabled = true;
    registerOwnerNameField.value = toTitleCase(registerOwnerNameField.value);
    registerOwnerForm.submit();
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
    registerBoatNameField.value = toTitleCase(registerBoatNameField.value);
    registerBoatLicenseField.value = registerBoatLicenseField.value.toUpperCase();
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


const registerAccountFAB = document.getElementById('account-fab');
const registerAccountOverlay = document.getElementById('register-account-overlay');
const registerAccountModal = document.getElementById('register-account');
const registerAccountExitButton = document.getElementById('register-account-exit');
const registerAccountForm = document.getElementById('register-account-form');
const registerAccountNameField = document.getElementById('register-account-name');
const registerAccountEmailField = document.getElementById('register-account-email');
const registerAccountPasswordField = document.getElementById('register-account-password');
const registerAccountPasswordConfirmField = document.getElementById('register-account-password-confirm');
const registerAccountSubmit = document.getElementById('register-account-submit');
const registerAccountCancel = document.getElementById('register-account-cancel');

var registerAccountModalOpened = false;
function openRegisterAccountModal(){
    if(!registerAccountModalOpened){
        registerAccountOverlay.classList.remove('hidden');
        registerAccountModal.classList.remove('hidden');
        registerAccountModalOpened = true;
    }
}

function closeRegisterAccountModal(){
    if(registerAccountModalOpened){
        registerAccountModal.classList.add('hidden');
        registerAccountOverlay.classList.add('hidden');
        registerAccountModalOpened = false;    
    }
}

registerAccountFAB.addEventListener('click', openRegisterAccountModal);
registerAccountExitButton.addEventListener('click', closeRegisterAccountModal);
registerAccountOverlay.addEventListener('click',closeRegisterAccountModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeRegisterAccountModal();
    }
});
registerAccountCancel.addEventListener('click',closeRegisterAccountModal);

registerAccountSubmit.addEventListener('click', function(){
    if(registerAccountNameField.value < 3){
        alert('Name field should be at least 3 characters');
        return;
    }
    if(!validateEmail(registerAccountEmailField.value)){
        alert('Email is not valid');
        return;
    }
    if(registerAccountPasswordField.value < 8){
        alert('Password should be at least 8 characters');
        return;
    }
    if(registerAccountPasswordConfirmField.value != registerAccountPasswordField.value){
        alert('Passwords do not match');
        return;
    }

    registerAccountSubmit.disabled = true;
    registerAccountNameField.value = toTitleCase(registerAccountNameField.value);
    registerAccountForm.submit();
});

const registerTrackerFAB = document.getElementById('tracker-fab');
const registerTrackerOverlay = document.getElementById('register-tracker-overlay');
const registerTrackerModal = document.getElementById('register-tracker');
const registerTrackerExitButton = document.getElementById('register-tracker-exit');
const registerTrackerForm = document.getElementById('register-tracker-form');
const registerTrackerSerialField = document.getElementById('register-tracker-serial');
const registerTrackerBoatField = document.getElementById('register-tracker-boat');
const registerTrackerSubmit = document.getElementById('register-tracker-submit');
const registerTrackerCancel = document.getElementById('register-tracker-cancel');

var registerTrackerModalOpened = false;
function openRegisterTrackerModal(){
    if(!registerTrackerModalOpened){
        registerTrackerOverlay.classList.remove('hidden');
        registerTrackerModal.classList.remove('hidden');
        registerTrackerModalOpened = true;
    }
}

function closeRegisterTrackerModal(){
    if(registerTrackerModalOpened){
        registerTrackerModal.classList.add('hidden');
        registerTrackerOverlay.classList.add('hidden');
        registerTrackerModalOpened = false;    
    }
}

registerTrackerFAB.addEventListener('click', openRegisterTrackerModal);
registerTrackerExitButton.addEventListener('click', closeRegisterTrackerModal);
registerTrackerOverlay.addEventListener('click',closeRegisterTrackerModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeRegisterTrackerModal();
    }
});
registerTrackerCancel.addEventListener('click',closeRegisterTrackerModal);

registerTrackerSubmit.addEventListener('click', function(){
    if(registerTrackerSerialField.value < 0){
        alert('Please enter tracker serial number');
        return;
    }

    registerTrackerSubmit.disabled = true;
    registerTrackerSerialField.value = registerTrackerSerialField.value.toUpperCase();
    registerTrackerForm.submit();
});