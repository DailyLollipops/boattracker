const searchMenuButton = document.getElementById('search-menu-button');
const searchMenu = document.getElementById('search-menu');

searchMenuButton.addEventListener('click', function(){
    if(searchMenu.classList.contains('hidden')){
        searchMenu.classList.remove('hidden');
    }
    else{
        searchMenu.classList.add('hidden');
    }
});
