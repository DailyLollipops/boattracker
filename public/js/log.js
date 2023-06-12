const boatInfoButtons = document.querySelectorAll('.show-info');
const boatBubbles = document.querySelectorAll('.boat-info');

for(let i = 0; i < boatInfoButtons.length; i++){
    boatInfoButtons[i].addEventListener('click', function(){
        let id = boatInfoButtons[i].getAttribute('data-id');
        let bubble = document.getElementById('log-'+id+'-boat-info');
        console.log(id);
        if(bubble.classList.contains('hidden')){
            bubble.classList.remove('hidden');
        }
        else{
            bubble.classList.add('hidden');
        }
    });
}

window.addEventListener('click', function(event){
    for(let i = 0; i < boatBubbles.length; i++){
        if(!event.composedPath().includes(boatBubbles[i]) && !event.composedPath().includes(boatInfoButtons[i])){
            boatBubbles[i].classList.add('hidden');
        }
    }
});