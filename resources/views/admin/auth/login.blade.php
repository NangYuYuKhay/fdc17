<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            display: flex;
            justify-content:center;
            align-items:center;
            height: 100vh;
            background-image: url('{{ asset("/assets/images/login-bg.png") }}');
            background-size:cover;
        }
        #login-form{
            width: 400px;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="login-form">
    <form action="{{ url('/admin/login') }}" method='post' novalidate>
        @csrf()
        <h2>Login</h2>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Please enter email." value="{{ old('email') }}">
            @if($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Please enter password.">
            @if($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <div class="mb-3">
            <button id="login-btn" class="btn btn-info w-100">Log In</button>
        </div>
    </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelector('[name="email"]').focus();
</script>
</html>