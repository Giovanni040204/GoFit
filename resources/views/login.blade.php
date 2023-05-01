<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="background-image">
    <div class="row min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="https://i.pinimg.com/originals/dc/0e/36/dc0e36c68fe8c0ab31bc8241f081c6b6.jpg" class="card-img" alt="..." style="width:300px; margin-left:50px;">
                            <h1 style="margin-left:140px; font-family: algerian;">GO-FIT</h1>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-family: roboto;">LOGIN</h1>
                                </div>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $item)
                                            <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label" style="font-family: roboto;">Username</label>
                                        <input type="text" value="{{ old('email') }}" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="font-family: roboto;">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>   
</body>

<style>
    .background-image{
        background-image: url('https://i0.wp.com/strongbee.co.id/wp-content/uploads/2019/05/AZF_9662.jpg?fit=1350%2C900&ssl=1');
        background-size: cover;
        background-repeat: no-repeat;
        width: 99.2%;
    }
</style>
</html>