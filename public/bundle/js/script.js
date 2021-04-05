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
      console.log(content);
      return content.map((appointment) => (
        
    
        {
          adherentid:appointment.adherents.id,
        
        title: appointment.adherents.NomPrenom,
        start: appointment.date,
        id: appointment.id,
        

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
        $dialog.find("#userid").val(null)
       
      $dialog.modal();
    },

    eventClick: function (calEvent, jsEvent, view) {
    
     
      $dialog = $("#add-appointment-dialog");
      
      $dialog
        .find("#appointment_date")
        .val(moment(calEvent.event.start).format("YYYY-MM-DDTHH:mm:ss"));
        $dialog.find("#userid").val(calEvent.event.id)
        $dialog.find("#appointment_Adherents").val(calEvent.event._def.extendedProps.adherentid)
        console.log(calEvent);
      $dialog.modal();
       
    },
  });

  calendar.render();
});
