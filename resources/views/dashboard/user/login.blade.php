<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    {{-- <link ref="stylesheet" href="{{ asset('bootstrap.min.css') }}" type="text/css"> --}}

    <title>User Login</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <h4>User Login</h4><hr>

                <form action="{{route('user.check')}}" method="post" autocomplete="off">
                    
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    
                    @csrf
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{old('email')}}">  
                      </div>
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{old('password')}}">
                      </div>
                      <span class="text-danger">@error('password') {{$message}} @enderror</span>
                      <br>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                      <br>
                      <a href="{{ route('user.register')}}">Create an Account</a>
                  </form>


            </div>
        </div>
    </div>
</body>
</html>