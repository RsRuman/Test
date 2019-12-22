<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div class="container">
        <div class="success">
          @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif
        </div>
        <div class="error">
          @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger">
            <p>{{ $error }}</p>
          </div>
          @endforeach
          @endif
        </div>
        <div class="jumbotron">

          <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label" id="label">Name:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="name" required>
              </div>
              <label for="dob" class="col-sm-2 col-form-label" id="label">DoB:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="dob" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="dieses" class="col-sm-2 col-form-label" id="label">Dieses:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="dieses" required>
              </div>
              <label for="cell" class="col-sm-2 col-form-label" id="label">Cell:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="cell" required>
              </div>
            </div>
            <div class="row">
              <div class="col-12" id="loc">
                <h1>Location</h1>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <select class="form-control" name="division" id="division" required>
                    <option value="" disabled selected>Select Division</option>
                    @foreach($divisions as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <select class="form-control" name="district" id="district" required>
                    <option value="" disabled selected>Select District</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <select class="form-control" name="thana" id="thana" required>
                    <option value="" disabled selected>Select Thana</option>
                  </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>


      <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          // onChange for division
          $('#division').on('change', function(){
            var division_id = $(this).val();
            if(division_id){
              $.ajax({
                url: '/getDistrict/'+division_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                  $('#district').empty();
                  $('#district').append('<option value="" disabled selected>'+"Select District"+'</option>');
                  $('#thana').empty();
                  $('#thana').append('<option value="" disabled selected>'+"Select Thana"+'</option>');
                  $.each(data, function(key, value){
                    $('#district').append('<option value="'+key+'">'+value+'</option>');
                  });
                }
              });

            }
            else{
              $('#district').empty();
            }
          });

          // onChange for district
          $('#district').on('change', function(){
            var district_id = $(this).val();
            if(district_id){
              $.ajax({
                url: '/getThana/'+district_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                  $('#thana').empty();
                  $('#thana').append('<option value="" disabled selected>'+"Select Thana"+'</option>');
                  $.each(data, function(key, value){
                    $('#thana').append('<option value="'+key+'">'+value+'</option>');
                  });
                }
              });
            }
            else{
              $('#thana').empty();
            }
          });

        });
      </script>
    </body>
</html>
