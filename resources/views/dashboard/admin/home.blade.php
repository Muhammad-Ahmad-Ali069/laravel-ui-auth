<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    {{-- <link ref="stylesheet" href="{{ asset('bootstrap.min.css') }}" type="text/css"> --}}

    <title>Admin Dashboard | Home</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <h4>Admin Dashboard</h4><hr>

                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{Auth::guard('admin')->user()->id}}</td>
                            <td> {{Auth::guard('admin')->user()->name}}</td>
                            <td> {{Auth::guard('admin')->user()->email}}</td>
                            <td> {{Auth::guard('admin')->user()->phone}}</td>
                            <td>
                                <a href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form method="post" action="{{route('admin.logout')}}" id="logout-form" class="d-none">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>    

            </div>
        </div>
    </div>
</body>
</html>