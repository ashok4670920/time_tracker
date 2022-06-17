<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Clock In</th>
            <th>Break in</th>
            <th>Break out</th>
            <th>Clock Out</th>
            <th>Work Hours</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($times as $time)
          
          <tr>
            <td>{{$time->id}}</td>

            <td>{{$time->user_id}}</td>
            <td>{{$time->clock_in}}</td>
            <td>


              {{-- {{dd($time->breakLogs->toArray())}} --}}

              
              {{-- <a name="" id="" class="btn btn-primary" href="{{route('breakin', ['timesheet' => $time->id])}}" role="button">Break in</a> --}}
              @foreach($time->breakLogs as $breaklog)
              {{$breaklog->start}}
              @endforeach
              <a href="{{ route('breakin', ['timesheet' => $time->id]) }}" 
                onclick="event.preventDefault();
                document.getElementById('breakin-form-'+ $time->id).submit();">
                  <i class="nav-icon fas fa-cog"></i>
                  <button class="btn btn-primary">Break in</button>
              </a>

                    {{-- <form id="{{'breakin-form-'.$time->id}}" action="{{ route('breakin', ['timesheet' => $time->id]) }}" method="POST" class="d-none">
                        @csrf
                    </form> --}}

            </td>
            <td>
              @foreach($time->breakLogs as $breaklog)
              <a name="" id="" class="btn btn-primary" href="{{route('breakout', ['breakLog' => $breaklog->id])}}" role="button">Break out</a>
              @endforeach
            </td>
            <td>
              @if($time->clock_out =="") 
              {{-- <a name="" id="" class="btn btn-primary" href="{{route('clockout', ['id' => $time->id])}}" role="button">Clock Out</a>  --}}
              <form action="{{route('clockout', ['id' => $time->id])}}" method="post" id="clockOutForm">
                @csrf
                <script>
                  const successCallback = (position) => {
                    console.log(position);
                    let lat = position.coords.latitude;
                    let long = position.coords.longitude;
                    document.getElementById("clock_out_lat").value = lat;
                    document.getElementById("clock_out_lng").value = long;
                    document.getElementById("clockOutForm").submit();
                    };
      
                  const errorCallback = (error) => {
                    console.error(error);
                    };
                  
                  function onClockoutClickHandler(){
                    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

                  }
                  
                </script>
                <input type="hidden" id="clock_out_lat" name="clock_out_lat">
                <input type="hidden" id="clock_out_lng" name="clock_out_lng">
                <input type="button" onclick="onClockoutClickHandler()" class="btn btn-primary" value="Clock Out">
                
              </form>
              @else
              {{$time->clock_out}}
              @endif
            </td>
            <td>
              @if($time->clock_out == "")
              worked for
              {{
                \Carbon\Carbon::parse($time->clock_in)->diffInHours(\Carbon\Carbon::now());
              }}
              hours
              @else
              worked for
              {{
                \Carbon\Carbon::parse($time->clock_in)->diffInHours(\Carbon\Carbon::parse($time->clock_out));
              }}
              hours
              @endif
              
            </td>
          </tr> 
          @endforeach         
        </tbody>       
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>