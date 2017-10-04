@extends('layouts.app')


@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>

    <h3 class="page-title">Calendar</h3>

    <div id='calendar'></div>

@endsection

@section('javascript')
    @parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src="{{ url('quickadmin/js/locale') }}/es.js" ></script>
    
    <script>
        $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events)  !!};
            $('#calendar').fullCalendar({
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
                },
                defaultDate: '2017-10-04',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                {
                    title: 'All Day Event',
                    start: '2017-10-01'
                },
                {
                    title: 'Long Event',
                    start: '2017-10-07',
                    end: '2017-10-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2017-10-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2017-10-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2017-10-11',
                    end: '2017-10-13'
                },
                {
                    title: 'Meeting',
                    start: '2017-10-12T10:30:00',
                    end: '2017-10-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2017-10-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2017-10-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2017-10-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2017-10-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2017-10-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: '#',
                    start: '2017-10-28'
                }
            ]


            })
        });
    </script>
@endsection