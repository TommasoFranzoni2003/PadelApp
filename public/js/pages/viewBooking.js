//***  SCRIPT PER CREARE IL CALENDARIO ***/
document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var eventsUrl = calendarEl.dataset.eventsUrl; //=> Prende la rotta

    //=> Crea il calendario
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'it',
        firstDay: 1,
        slotMinTime: "08:00:00",
        slotMaxTime: "22:00:00",
        slotDuration: "00:30:00",
        allDaySlot: false,
        height: 'auto',
        events: eventsUrl,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        dayHeaderFormat: { weekday: 'long'}, //=> Mette solo il nome nell'intestazione
        titleFormat: {year: 'numeric', month: 'long', day: 'numeric'},
    });

    calendar.render(); //=> Mostra il calendario
});