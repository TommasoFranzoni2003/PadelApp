// SCRIPT PER L'ATTIVAZIONE DEL SUCCESS MODAL

document.addEventListener("DOMContentLoaded", function () {
    const messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
    messageModal.show();

    //=> Chiusura automatica
    setTimeout(() => {
        messageModal.hide();
    }, 5000);
});
