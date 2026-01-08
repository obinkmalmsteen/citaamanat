document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.filter-btn');

    if (!btn) return;

    btn.addEventListener('click', () => {
        document.body.classList.toggle('filtermenu-open');
    });
});
