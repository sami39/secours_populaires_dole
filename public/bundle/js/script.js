document.addEventListener("DOMContentLoaded", function () {
  $(".select2").select2({ width: "auto" });
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
    },
    initialDate: new Date(),
    navLinks: true, // can click day/week names to navigate views
    businessHours: true, // display business hours
    editable: true,

    locale: "fr-ch",
    selectable: true,
    async: "false",

    buttonText: {
      today: "aujourd'hui",
      month: "mois",
      week: "semaine",
      day: "journée",
      list: "liste",
      weekday: "short",
    },
 
    events: "/appointment/showappeintment",
    eventSourceSuccess: function (content, xhr) {
      content.forEach((e) => console.log(e));
      console.log(content);
      return content.map((appointment) => ({
        adherentid: appointment.adherents.id,

        title: appointment.adherents.NomPrenom,
        start: appointment.date,
        description: 'Lecture',
        extendedProps: {
          department: 'BioChemistry'
        },
        
      }));
    },
    selectable: true,
    selectHelper: true,
    dateClick: function (event) {
      $dialog = $("#add-appointment-dialog");
      $dialog.find("#delete-appointment-link").prop("href", "#");
      $dialog.find("#appointment-form-container").empty();
       
      $dialog
        .find("#appointment-form-container")
        .load("appointment/create", () => {
          $dialog
            .find("#appointment_date")
            .val(moment(event.date).format("YYYY-MM-DDTHH:mm:ss"));
            
          $dialog.modal();
        });
    },

    eventClick: function (calEvent, jsEvent, view) {
      $dialog = $("#add-appointment-dialog");
      $dialog
        .find("#delete-appointment-link")
        .prop("href", `appointment/${calEvent.event.id}/delete`);
      $dialog.find("#appointment-form-container").empty();
      $dialog
        .find("#appointment-form-container")
        .load(`appointment/${calEvent.event.id}/edit`, () => {
          $dialog.modal();
        });
    },
  });

  calendar.render();
});
