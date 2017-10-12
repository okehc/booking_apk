@extends('layouts.app')


@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
<input type="hidden" name="sala"  id="sala" class="sala" value="<?php echo $sala; ?>">
    <h3 class="page-title">Calendario: <?php echo $sala; ?></h3>

    <div id='calendar'></div>

@endsection

@section('javascript')
    @parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src="{{ url('quickadmin/js/locale') }}/es.js" ></script>
    
    <script>
    var sala = $("#sala").val();
    var link = "http://10.30.42.27/booking_apk/public/admin/evento?sala="+sala;

        $(document).ready(function () {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();           

            var calendar = $('#calendar').fullCalendar({
                editable: true, 
                header: {    
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },

                events: {
                    //para obtener los resultados del controlador y mostrarlos en el calendario
                    //basta con hacer referencia a la url que nos da dicho resultado, en el ejemplo
                    //en la propiedad url de events ponemos el enlace
                    //y listo eso es todo ya el plugin se encargara de acomodar los eventos
                    //segun la fecha.
                    url:'http://10.30.42.27/booking_apk/public/admin/evento?sala=' + sala
                },
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {

                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");                    


                    window.location = "http://10.30.42.27/booking_apk/public/admin/reservacions/create?start="+start+"&end="+end+"&sala="+sala;

                },
                editable: true,
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'update_events.php',
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                        type: "POST",
                        success: function(json) {
                            alert("Updated Successfully");
                        }
                   });
                },

            eventResize: function(event) {      
                var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                $.ajax({
                    url: 'update_events.php',
                    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                    type: "POST",
                    success: function(json) {
                        alert("Updated Successfully");
                    }
                });
            }
        });
    });
    </script>
@endsection