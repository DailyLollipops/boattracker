const trackers = document.querySelectorAll('.tracker');

for(let i = 0; i < trackers.length; i++){
    trackers[i].querySelector('.show-info').addEventListener('click', function(){
        if(trackers[i].querySelector('.boat-info').classList.contains('hidden')){
            trackers[i].querySelector('.boat-info').classList.remove('hidden');
        }
        else{
            trackers[i].querySelector('.boat-info').classList.add('hidden');
        }
    })
}