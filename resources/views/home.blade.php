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
      <h1 class="text-center">Click the buttons below for respective action</h1>
      
      
      <div class="text-center">
        <div class="container">
        <form action="{{route('start')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" id="user_id" name="user_id" >
            <span class="text-danger">
            @error('user_id')
            {{$message}}
            @enderror
          </span>
          </div>

          <script>
            const successCallback = (position) => {
              console.log(position);
              let lat = position.coords.latitude;
              let long = position.coords.longitude;
              document.getElementById("clock_in_lat").value = lat;
              document.getElementById("clock_in_lng").value = long;
              };

            const errorCallback = (error) => {
              console.error(error);
              };
      
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
          </script>

          {{-- <div class="form-group">
            <label for="clock_in_lat">Latitude</label> --}}
            <input type="hidden" id="clock_in_lat" name="clock_in_lat" value="">
            {{-- <span class="text-danger">
            @error('clock_in_lat')
            {{$message}}
            @enderror
          </span>
          </div> --}}

          {{-- <div class="form-group">
            <label for="clock_in_lat">Latitude_in</label>
            <input type="text" id="clock_in_lat" name="clock_in_lat" >
            <span class="text-danger">
            @error('clock_in_lat')
            {{$message}}
            @enderror
          </span>
          </div> --}}
{{-- 
          <div class="form-group">
            <label for="clock_in_lng">Longitude_in</label> --}}
            <input type="hidden" id="clock_in_lng" name="clock_in_lng" >
            {{-- <span class="text-danger">
            @error('clock_in_lng')
            {{$message}}
            @enderror
          </span>
          </div> --}}

          {{-- <div class="form-group">
            <label for="clock_out_lat">Latitude_out</label>
            <input type="text" id="clock_out_lat" name="clock_out_lat" >
            <span class="text-danger">
            @error('clock_out_lat')
            {{$message}}
            @enderror
          </span>
          </div>

          <div class="form-group">
            <label for="clock_out_lng">Longitude_out</label>
            <input type="text" id="clock_out_lng" name="clock_out_lng" >
            <span class="text-danger">
            @error('clock_out_lng')
            {{$message}}
            @enderror
          </span>
          </div> --}}
          <input type="submit" class="btn btn-primary" value="Clock In">
        </form>
      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCViQTBg3CuOdRUIByHc-1xVZ7AEE4U3Vo&callback=initMap"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>