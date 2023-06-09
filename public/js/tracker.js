const trackers = document.querySelectorAll('.tracker');
const confirmDeleteOverlay = document.getElementById('confirm-delete-overlay');
const confirmDeleteModal = document.getElementById('confirm-delete');
const confirmDeleteButton = document.getElementById('delete-true');
const backButton = document.getElementById('delete-false');
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
backButton.addEventListener('click', closeConfirmDeleteModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeConfirmDeleteModal();
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
}

confirmDeleteButton.addEventListener('click', function(){
    deletedIdField.value = activeCardId;
    deleteForm.submit();
});