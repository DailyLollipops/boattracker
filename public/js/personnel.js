const personnels = document.querySelectorAll('.personnel');
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

for(let i = 0; i < personnels.length; i++){
    personnels[i].querySelector('.delete').addEventListener('click', function(){
        openConfirmDeleteModal();
        activeCardId = parseInt(personnels[i].getAttribute('data-id'));
    });
}

confirmDeleteButton.addEventListener('click', function(){
    if(activeCardId == 1){
        alert('Admin account cannot be deleted');
        return;
    }
    confirmDeleteButton.disabled = true;
    deletedIdField.value = activeCardId;
    deleteForm.submit();
});