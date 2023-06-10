const trackers = document.querySelectorAll('.tracker');
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


const updateTrackerOverlay = document.getElementById('update-tracker-overlay');
const updateTrackerModal = document.getElementById('update-tracker');
const updateTrackerExit = document.getElementById('update-tracker-exit');
const updateTrackerSubmit = document.getElementById('update-tracker-submit');
const updateTrackerCancel = document.getElementById('update-tracker-cancel');
const updateTrackerForm = document.getElementById('update-tracker-form');
const updateTrackerID = document.getElementById('update-tracker-id');
const updateTrackerSerial = document.getElementById('update-tracker-serial');
const updateTrackerBoat = document.getElementById('update-tracker-boat');

async function getTracker(id){
    const response = await fetch(
        '/get/tracker?id='+id,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['tracker'];
}

function openUpdateTrackerModal(){
    if(updateTrackerModal.classList.contains('hidden')){
        updateTrackerOverlay.classList.remove('hidden');
        updateTrackerModal.classList.remove('hidden');
        getTracker(activeCardId).then(tracker => {
            updateTrackerID.value = tracker['id'];
            updateTrackerSerial.value = tracker['serial'];
            updateTrackerBoat.value = tracker['boat_id'];
        });
    }
}

function closeUpdateTrackerModal(){
    if(!updateTrackerModal.classList.contains('hidden')){
        updateTrackerOverlay.classList.add('hidden');
        updateTrackerModal.classList.add('hidden'); 
        updateTrackerID.value = '';
        updateTrackerSerial.value = '';
        updateTrackerBoat.value = '';
    }
}

updateTrackerOverlay.addEventListener('click', closeUpdateTrackerModal);
updateTrackerExit.addEventListener('click', closeUpdateTrackerModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUpdateTrackerModal();
    }
});


for(let i = 0; i < trackers.length; i++){
    trackers[i].querySelector('.show-info').addEventListener('click', function(){
        if(trackers[i].querySelector('.boat-info').classList.contains('hidden')){
            trackers[i].querySelector('.boat-info').classList.remove('hidden');
        }
        else{
            trackers[i].querySelector('.boat-info').classList.add('hidden');
        }
    });

    trackers[i].querySelector('.delete').addEventListener('click', function(){
        openConfirmDeleteModal();
        activeCardId = parseInt(trackers[i].getAttribute('data-id'));
    });

    trackers[i].querySelector('.update').addEventListener('click', function(){
        activeCardId = parseInt(trackers[i].getAttribute('data-id'));
        openUpdateTrackerModal();
    });
}

const bubbles = document.querySelectorAll('.boat-info');
const infoButtons = document.querySelectorAll('.show-info');
window.addEventListener('click', function(event){
    for(let i = 0; i < bubbles.length; i++){
        if(!event.composedPath().includes(bubbles[i]) && !event.composedPath().includes(infoButtons[i])){
            bubbles[i].classList.add('hidden');
        }
    }
});

confirmDeleteButton.addEventListener('click', function(){
    deletedIdField.value = activeCardId;
    deleteForm.submit();
});

updateTrackerSubmit.addEventListener('click', function(){
    if(updateTrackerSerial.value.length < 0){
        alert('Please enter tracker serial number');
        return;
    }

    updateTrackerSubmit.disabled = true;
    updateTrackerSerial.value = updateTrackerSerial.value.toUpperCase();
    updateTrackerForm.submit();
});