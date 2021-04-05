document.addEventListener("DOMContentLoaded", function () {
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

    selectable: true,
    locale: "fr",
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
      content.forEach(e => console.log(e));
      return content.map((appointment) => (
        
        
        {
        title: appointment.adherents.NomPrenom,
        start: appointment.date,
        id: appointment.id

      }
      
      
      ));
    },
    selectable: true,
    selectHelper: true,
    dateClick: function (event) {
      $dialog = $("#add-appointment-dialog");
      console.log(event);
      $dialog
        .find("#appointment_date")
        .val(moment(event.date).format("YYYY-MM-DDTHH:mm:ss"));
       
      $dialog.modal();
    },

    eventClick: function (calEvent, jsEvent, view) {
    
     

      $("#appointment_date").val(
        (calEvent.event.title)
      );

      $("#edit-appointment-dialog").modal();
       
    },
  });

  calendar.render();
});
