document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const darkModeIcon = document.getElementById('darkModeIcon');
    const body = document.body;

    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    body.classList.toggle('dark', isDarkMode);

    function toggleDarkMode() {
        body.classList.toggle('dark');
        localStorage.setItem('darkMode', body.classList.contains('dark'));
    }

    darkModeIcon.addEventListener('click', toggleDarkMode);
});