const boats = document.querySelectorAll('.boat');
const confirmDeleteOverlay = document.getElementById('confirm-delete-overlay');
const confirmDeleteModal = document.getElementById('confirm-delete');
const confirmDeleteButton = document.getElementById('delete-true');
const deleteBackButton = document.getElementById('delete-false');
const deleteForm = document.getElementById('delete-form');
const deletedIdField = document.getElementById('delete-id');
var activeCardId = -1;

function openConfirmDeleteModal(){
    if(confirmDeleteModal.classList.contains('hidden')){
        confirmDeleteOverlay.classList.remove('hidden');
        confirmDeleteModal.classList.remove('hidden');
    }
}

function closeConfirmDeleteModal(){
    if(!confirmDeleteModal.classList.contains('hidden')){
        confirmDeleteOverlay.classList.add('hidden');
        confirmDeleteModal.classList.add('hidden');  
    }
}

confirmDeleteOverlay.addEventListener('click', closeConfirmDeleteModal);
deleteBackButton.addEventListener('click', closeConfirmDeleteModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeConfirmDeleteModal();
    }
});


const updateBoatOverlay = document.getElementById('update-boat-overlay');
const updateBoatModal = document.getElementById('update-boat');
const updateBoatExit = document.getElementById('update-boat-exit');
const updateBoatSubmit = document.getElementById('update-boat-submit');
const updateBoatCancel = document.getElementById('update-boat-cancel');
const updateBoatForm = document.getElementById('update-boat-form');
const updateBoatID = document.getElementById('update-boat-id');
const updateBoatName = document.getElementById('update-boat-name');
const updateBoatLicense = document.getElementById('update-boat-license');
const updateBoatType = document.getElementById('update-boat-type');
const updateBoatColor = document.getElementById('update-boat-color');
const updateBoatOwner = document.getElementById('update-boat-owner');

async function getBoat(id){
    const response = await fetch(
        '/get/boat?id='+id,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['boat'];
}

function openUpdateBoatModal(){
    if(updateBoatModal.classList.contains('hidden')){
        updateBoatOverlay.classList.remove('hidden');
        updateBoatModal.classList.remove('hidden');
        getBoat(activeCardId).then(boat => {
            updateBoatName.value = boat['name'];
            updateBoatLicense.value = boat['license'];
            updateBoatType.value = boat['type'];
            updateBoatColor.value = boat['color'];
            updateBoatOwner.value = boat['owner_id'];
        });
    }
}

function closeUpdateBoatModal(){
    if(!updateBoatModal.classList.contains('hidden')){
        updateBoatOverlay.classList.add('hidden');
        updateBoatModal.classList.add('hidden'); 
    }
}

updateBoatOverlay.addEventListener('click', closeUpdateBoatModal);
updateBoatExit.addEventListener('click', closeUpdateBoatModal);
updateBoatCancel.addEventListener('click', closeUpdateBoatModal);
window.addEventListener('keydown', function(event){
    
    if(event.key == 'Escape'){
        closeUpdateBoatModal();
    }
});

for(let i = 0; i < boats.length; i++){
    boats[i].querySelector('.show-tracker-info').addEventListener('click', function(){
        if(boats[i].querySelector('.tracker-info').classList.contains('hidden')){
            boats[i].querySelector('.tracker-info').classList.remove('hidden');
        }
        else{
            boats[i].querySelector('.tracker-info').classList.add('hidden');
        }
    });

    boats[i].querySelector('.show-owner-info').addEventListener('click', function(){
        if(boats[i].querySelector('.owner-info').classList.contains('hidden')){
            boats[i].querySelector('.owner-info').classList.remove('hidden');
        }
        else{
            boats[i].querySelector('.owner-info').classList.add('hidden');
        }
    });

    boats[i].querySelector('.delete').addEventListener('click', function(){
        openConfirmDeleteModal();
        activeCardId = parseInt(boats[i].getAttribute('data-id'));
    });

    boats[i].querySelector('.update').addEventListener('click', function(){
        activeCardId = parseInt(boats[i].getAttribute('data-id'));
        openUpdateBoatModal();
    });
}

const trackerBubbles = document.querySelectorAll('.tracker-info');
const ownerBubbles = document.querySelectorAll('.owner-info');
const trackerInfoButtons = document.querySelectorAll('.show-tracker-info');
const ownerInfoButtons = document.querySelectorAll('.show-owner-info');
window.addEventListener('click', function(event){
    for(let i = 0; i < trackerBubbles.length; i++){
        if(!event.composedPath().includes(trackerBubbles[i]) && !event.composedPath().includes(trackerInfoButtons[i])){
            trackerBubbles[i].classList.add('hidden');
        }
    }
    for(let i = 0; i < ownerBubbles.length; i++){
        if(!event.composedPath().includes(ownerBubbles[i]) && !event.composedPath().includes(ownerInfoButtons[i])){
            ownerBubbles[i].classList.add('hidden');
        }
    }
});

confirmDeleteButton.addEventListener('click', function(){
    confirmDeleteButton.disabled = true;
    deletedIdField.value = activeCardId;
    deleteForm.submit();
});

updateBoatSubmit.addEventListener('click', function(){
    if(updateBoatName.value.length < 3){
        alert('Boat Name should be at least 3 characters');
        return;
    }
    if(updateBoatLicense.value.length < 0){
        alert('Please enter boat license');
        return;
    }
    if(updateBoatType.value == 'null'){
        alert('Please select boat type');
        return;
    }
    if(updateBoatColor.value == 'null'){
        alert('Please select color type');
        return;
    }
    if(updateBoatOwner.value == 'null'){
        alert('Please select owner');
        return;
    }
    updateBoatSubmit.disabled = true;
    updateBoatID.value = activeCardId;
    updateBoatForm.submit();
});