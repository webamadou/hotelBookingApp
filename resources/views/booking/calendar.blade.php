@extends('layout')

@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<style>
    .fc-content {
        color: #fff;
        padding: 1vh;
    }
    a.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-not-end {
        margin: 2px 0;
    }
</style>
<div id='calendar'></div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Booking Details</h2>
                <h3 id="bookingcustomer"></h3>
                <h6 id="booking_dates"></h6>
                <hr>
                <div>Room Type:<span id="roomtype"></span></div>
                <div>Room Capacity:<span id="roomcapacity"></span></div>
                <hr>
                <div id="bookinglink"><a href="">Edit</a></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<input type="button" class="btn btn-primary" id="appointment_update" value="Save">-->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            defaultView: 'month',
            events : [
                @foreach($bookings as $booking)
                {
                    title : '{{ $booking->customer->first_name . ' ' . $booking->customer->last_name }} @Room:{{$booking->room->name}}',
                    roomName: '{{$booking->room->name}}',
                    roomtype: '{{$booking->room->roomType->name}}',
                    roomcapacity: '{{$booking->room->roomCapacity->name}}',
                    bookinglink: '{{route('booking.edit', $booking->id)}}',
                    start : '{{ $booking->date_start }}',
                    @if ($booking->date_end)
                        end: '{{ $booking->date_end }}',
                    @endif
                    //url: '{{route('booking.edit', $booking->id)}}'
                },
                @endforeach
            ],
            eventClick: function(calEvent, jsEvent, view) {
                $('#booking_dates').html('From: '+moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss')+' To: '+moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));
                $('#bookingcustomer').html(calEvent.title);
                $('#roomtype').html(calEvent.roomtype);
                $('#roomcapacity').html(calEvent.roomcapacity);
                $('#bookinglink a').attr('href',calEvent.bookinglink);
                $('#editModal').modal();
        }
        });
    });
</script>
@endsection
