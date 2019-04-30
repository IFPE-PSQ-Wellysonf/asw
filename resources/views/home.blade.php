@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href=" {{ asset('vendor/fullcalendar-4.1.0/core/main.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('vendor/fullcalendar-4.1.0/daygrid/main.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div id="agenda">

            </div>
            <div id='calendar'></div>
            {{--  <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>  --}}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid', 'googleCalendar' ],
                defaultView: 'dayGridMonth',
                header: {
                    left: 'prev,today,next',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                editable: true,
            });
            calendar.setOption('locale', 'pt-br');
            calendar.render();
        });
    </script>
    <script src="{{ asset('vendor/fullcalendar-4.1.0/core/main.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar-4.1.0/daygrid/main.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar-4.1.0/google-calendar/main.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar-4.1.0/core/locales/pt-br.js') }}"></script>
@endsection
