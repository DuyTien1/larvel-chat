import './bootstrap';

Echo.private('notifications').listen('UserSessionChange', (e) => {

    $.notify(e.message, {
            className: `${e.type}`,
            gap: 3,
            autoHide: true,
            autoHideDelay: 4000,
            clickToHide: true,
            arrowShow: true,
            arrowSize: 5,
            position: "bottom right",
        });
    // notiElement.innerText = e.message;
    //
    // notiElement.classList.remove('invisible');
    // notiElement.classList.remove('alert-success');
    // notiElement.classList.remove('alert-danger');
    // notiElement.classList.add('alert-' + e.type);
})
