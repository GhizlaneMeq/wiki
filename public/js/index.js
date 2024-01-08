document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });
});




document.addEventListener('DOMContentLoaded', function () {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;

    
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    body.classList.toggle('dark', isDarkMode);
    darkModeToggle.checked = isDarkMode;

    
    darkModeToggle.addEventListener('change', function () {
        body.classList.toggle('dark');
        
        localStorage.setItem('darkMode', darkModeToggle.checked);
    });
});