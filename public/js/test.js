document.body.classList.add('js-loading');

window.addEventListener("load", showPage, false);

function showPage() {
    document.body.classList.remove('js-loading');
}