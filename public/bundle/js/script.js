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
        id: appointment.id,
        title: appointment.adherents.NomPrenom,
        start: appointment.date,
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
          $dialog.find(".select2").select2({ width: null });

          $dialog.modal();
          const result = document.getElementById(
            "select2-appointment_Adherents-container"
          );
          console.log(result);
          result.addEventListener("change", (e) => {
            console.log(e.target.value);
          });
          $(".select2").on("select2:select", function (e) {
            // Do something
            axios
              .get(`/appointment/howcolisfrequence/${e.target.value}`)
              .then((result) => {
                var frequence = result.data.FrequenceMensuelle;
                var colis = result.data.Colis;
                console.log(frequence);
                console.log(colis);
                console.log(result.data);
                document.getElementById('frequence').value=frequence;
                document.getElementById('colis').value=colis;
                //$dialog.find("#appointment-form-container").write("toto");
              });
            // console.log(e.target.value)
            // console.log(result.data.data)
          });
        });
    },

    eventClick: function (calEvent, jsEvent, view) {
      console.log(calEvent);
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
console.log("result");
