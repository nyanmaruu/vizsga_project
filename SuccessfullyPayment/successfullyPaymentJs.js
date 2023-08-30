var el = document.getElementById('seconds'),
    total = el.innerHTML,
    timeinterval = setInterval(function () {
        total = --total;
        el.textContent = total;
        if (total <= 0) {
            clearInterval(timeinterval);
            window.location = 'http://localhost/vizsga_project/?page=index';
        }
    }, 1000);