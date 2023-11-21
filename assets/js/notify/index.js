'use strict';
var notify = $.notify('<i class="fa-sharp fa-solid fa-bell"></i><strong>Loading...</strong>', {
    type: 'theme',
    allow_dismiss: true,
    delay: 2000,
    showProgressbar: true,
    timer: 300
});

// setTimeout(function() {
//     notify.update('message', '<i class="fa-sharp fa-solid fa-bell"></i><strong>Loading</strong> Sedang Memuat.');
// }, 1000);
