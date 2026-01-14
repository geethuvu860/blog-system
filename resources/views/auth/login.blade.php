<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center" class="">
                    <h4>Login & Registration form</h4>
                </div>

                <div class="card-body">
                        @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('message') }}
                    </div>
                  @elseif(session('error'))
                      <div class="alert alert-danger">{{session('error')}}</div>
                @endif




                    <form  action="{{route('authenticate')}}" method="post">@csrf
                        

                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Enter email">
                         @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                          @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                        </div>

                       

                        <button type="submit" class="btn btn-primary sm-3" >
                            Login
                        </button>
                        <a href="{{ route('register') }}" class="btn btn-secondary sm-3">Register</a>
                       
                    </form>

                </div>

               
            </div>
        </div>
    </div>
</div>

</body>
</html>
