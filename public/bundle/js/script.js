


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
      selectable:true,
      selectHelper:true,
      dateClick: function(start,end,allDay) {
      
        var title = prompt('Event Title:') ;
        if(title){

          var start =$.FullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
          var end =$.FullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
          $.ajax({
            url:"/appointment/showappeintment",
            type:"POST",
            data:{
              title: title,
              start:start,
              end:end,
              type:'add'


            },
           success: function(data){

            calendar.FullCalendar('refetchEvents');
            alert("rendez vous crerer") ;
           }

          })
        }
 
      }

       
    });

    calendar.render();
  });
