var url = '/administrator/transactions/scheduling';

$(document).ready(()=>{
    
    $(function() {
        /* initialize the external events
         -----------------------------------------------------------------*/
        function init_events(ele) {
            ele.each(function() {
  
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }
  
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)
  
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })
  
            })
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.modalCloseButton').on('click',function(event){
            $('.modal').modal('hide');
            $('.modal').refresh();
        });

        init_events($('#external-events div.external-event'))
  
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
  
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var a = $('#sched').val();
        console.log($('#sched').data('id'));
        var schedules = JSON.parse(a);
        // console.log(schedules);
        var eventsSched = [];
        for(var count=0; count<schedules.length; count++){
            schedStartDate = schedules[count].dateStart;
            schedEndDate = schedules[count].dateEnd;

            schedStartTime = schedules[count].tmStart;
            schedEndTime = schedules[count].tmEnd;

            var startDate = schedStartDate.split('-');
            var endDate = schedEndDate.split('-');
            var startTime = schedStartTime.split(':');
            var endTime = schedStartTime.split(':');
            console.log('startDate', startDate);
            console.log('endDate', endDate);
            console.log('startTime', startTime);
            console.log('endTime',endTime);

            //push to the array rendering variable

            eventsSched.push({
                title : schedules[count].strScheduleDesc,
                start : new Date (startDate[0], startDate[1] - 1, startDate[2], startTime[0], startTime[1], startTime[2]),
                end : new Date (endDate[0], endDate[1] - 1, endDate[2], endTime[0], endTime[1], endTime[2]),
                allDay : false,
                displayEventTime : true,
                backgroundColor: `#00a65a`, //yellow
                borderColor: `#00a65a`, //yellow
                className: 'text-left',
 
            });
        }
        
        $('#calendar').fullCalendar({
            selectable: true,
            dayClick: function(date) {
                // alert('clicked ' + date.format() + 'Heyaaaaaaaaaaaa');
                // alert('Kiki I Love You');
                getdate = date.format();
                // console.log(date.format());
                // $('.viewAvailableTugboatsCard').empty();
                // $('.viewUnvailableTugboatsCard').empty();
                $.ajax({
                    url : url + '/tugboatsavailable',
                    type : 'POST',
                    data : { 
                        "_token" : $('meta[name="csrf-token"]').attr('content'),
                        date : getdate,
                    }, 
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    },
                    success : function(data){
                        $('.tugboatsAvailableCard').empty();
                        $('.tugboatsUnavailableCard').empty();
                        console.log(data);
                        if((data.available).length === 0){   
                            $('.tugboatsAvailableCard').empty();
                            var appendData = 
                            
                            `
                            <div class="card-header text-center" style="text-transform : uppercase;">
                                <h4>Available Tugboats</h4>
                            </div>
                            <div class="card-body">
                                <div class=" text-danger text-center">
                                    <h5><i class="fas fa-times mr-2"></i> No Available Tugboats For This Day<i class="fas fa-times ml-2"></i></h5>
                                </div>
                            </div>`; 
                            $(appendData).appendTo('.tugboatsAvailableCard');
                        
                        }
                        // If there are Available Tugboats
                        else if((data.available).length > 0){
                            $('.tugboatsAvailableCard').empty();
                            var appendContent =
                            `<div class="card-header text-center" style="text-transform : uppercase;">
                                <h4>Available Tugboats</h4>
                            </div>
                            <div class="card-body">
                                <div class="availablecard row">
                                </div>
                            </div>`;
                            $(appendContent).appendTo('.tugboatsAvailableCard');

                            for(var counter=0; counter < (data.available).length; counter++){       
                                var appendData = 
                                `<div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <b><h6 class="card-text text-left"> ${data.available[counter].strName} </h6></b>
                                            <small class="float-left mt-2" style="text-transform: uppercase;">
                                                Bollard Pull : &nbsp; ${data.available[counter].strBollardPull}
                                            </small>    
                                        </div>
                                    </div>
                                </div>`;
                                $(appendData).appendTo('.availablecard');
                            }
                        }
                        // If There Are No Unavailable Tugboats
                        if((data.unavailable).length === 0){
                            $('.tugboatsUnavailableCard').empty();
                            var appendData =  
                            `<div class="card-header text-center" style="text-transform : uppercase;">
                                <h4>Occupied Tugboats</h4>
                            </div>
                            <div class="card-body">
                                <div class=" text-danger text-center">
                                    <h5><i class="fas fa-times mr-2"></i> No Occupied Tugboats<i class="fas fa-times ml-2"></i></h5>
                                </div>
                            </div>`; 
                            $(appendData).appendTo('.tugboatsUnavailableCard');
                        }
                        // If there are Unavailable Tugboats
                        else if((data.unavailable).length > 0){
                            console.log(data.unavailable);
                            $('.tugboatsUnavailableCard').empty();
                            var appendContent =
                            `<div class="card-header text-center" style="text-transform : uppercase;">
                                <h4>Occupied Tugboats</h4>
                            </div>
                            <div class="card-body">
                                <div class="unavailablecard row">
                                </div>
                            </div>`;
                            $(appendContent).appendTo('.tugboatsUnavailableCard');

                            
                            for(var count=0; count < (data.unavailable).length; count++){
                                var appendData = 
                                `<div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card bg-info">
                                        <div class="card-body">
                                            <b><h6 class="card-text text-left"> ${data.unavailable[count].strName} </h6></b>
                                            <small class="float-left mt-2" style="text-transform: uppercase;">
                                                Bollard Pull : &nbsp; ${data.unavailable[count].strBollardPull}
                                            </small>    
                                        </div>
                                    </div>
                                </div>`; 
                                $(appendData).appendTo('.unavailablecard');
                            }
                        }
                        
                        $('#viewTugboatsModal').modal('show');    
                        
                        
                    },
                    error : function(error){
                        throw error;
                    }
                });
                // $('#viewTugboatsModal').modal('show');
                
            },
            // dayClick: function(date) {
            //     alert('clicked ' + date.format());
            // },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },events : eventsSched,
            // events : [eventsSched],
                //Random default events
            // events: [{
            //     title: schedules[0].strSchedDesc,
            //     start: new Date(y, m, d - 5),
            //     end: new Date(y, m, d - 2),
            //     backgroundColor: '#f39c12', //yellow
            //     borderColor: '#f39c12' //yellow1
            // }, {
            //     title: schedules[1].strSchedDesc,
            //     start: new Date(y, m, d, b, c),
            //     allDay: false,
            //     backgroundColor: '#0073b7', //Blue
            //     borderColor: '#0073b7' //Blue
            // }],
            editable: true,
            
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped
  
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject')
  
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject)
  
                // assign it the date that was reported
                copiedEventObject.start = date
                copiedEventObject.allDay = allDay
                copiedEventObject.backgroundColor = $(this).css('background-color')
                copiedEventObject.borderColor = $(this).css('border-color')
  
                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
  
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove()
                }
  
            }
        })
  
        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
            //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
                //Save color
            currColor = $(this).css('color')
                //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
                //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }
  
            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)
  
            //Add draggable funtionality
            init_events(event)
  
            //Remove event from text input
            $('#new-event').val('')
        })
    })
  
});