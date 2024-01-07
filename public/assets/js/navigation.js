document.getElementById('sidebar-toggle-button').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('hidden');
    document.getElementById('main').classList.toggle('ml-64');
})
document.getElementById('profile-menu-toggler').addEventListener('click',function(){
    document.getElementById('profile-menu').classList.toggle('hidden');
})
document.getElementById('notification-button').addEventListener('click', function(){
    document.getElementById('notifications').classList.toggle('hidden');
})

document.body.addEventListener('click', function (event) {
    const profileMenu = document.getElementById('profile-menu');
    const profileMenuToggler = document.getElementById('profile-menu-toggler');

    // Check if the click event target is outside of the profile-menu and profile-menu-toggler
    if (!profileMenu.contains(event.target) && !profileMenuToggler.contains(event.target)) {
        profileMenu.classList.add('hidden');
    }
})