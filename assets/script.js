document.addEventListener('DOMContentLoaded', function () {
    let form = document.querySelector('form.select');
    let select = document.querySelector('#select');

    if (form && select) {
        select.addEventListener('change', function () {
            form.submit();
        });
    }
});