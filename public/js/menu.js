const hamburgerMenu = document.getElementById('menu');
const sidebar = document.getElementById('sidebar');

hamburgerMenu.addEventListener('click', function(){
    if(sidebar.classList.contains('hidden')){
        sidebar.classList.remove('hidden');
    }
    else{
        sidebar.classList.add('hidden')
    }
});