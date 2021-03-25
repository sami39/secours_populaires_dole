


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
       
    
      selectable: true,
      locale:'fr',
      buttonText:{
      today:"aujourd'hui",
      month:'mois',
      week:'semaine',
      day:'journée',
      list:'liste',
      weekday: 'short',
      
  
            },
      events: "/appointment/showappeintment",
      eventSourceSuccess: function(content, xhr) {
        console.log(content);
        return content.map((appointment) => ({
          title: appointment.adherents.NomPrenom,
          start: appointment.date,
        
           
        }));
        
      },
      selectable:true,
      selectHelper:true,
      dateClick: function(event) {
        $dialog = $('#add-appointment-dialog');
        $dialog.find('#appointment_date').val(moment(event.date).format('YYYY-MM-DD\THH:mm:ss'));
        console.log(event);
        $dialog.modal();
       
      }
     
    });

    calendar.render();
  });
