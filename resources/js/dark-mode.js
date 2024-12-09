document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('dark-mode') === 'enabled') {
        document.body.classList.add('dark-mode');
    }

    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', () => {
            const darkModeEnabled = document.body.classList.toggle('dark-mode');
            if (darkModeEnabled) {
                localStorage.setItem('dark-mode', 'enabled');
            } else {
                localStorage.removeItem('dark-mode');
            }
        });
    }
});
