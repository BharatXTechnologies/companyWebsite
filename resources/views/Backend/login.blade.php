<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - Zero1Infinity</title>
    <link rel="icon" href="{{ URL::asset('assets/img/Logo/logo.png') }}" />
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container img {
            width: 200px;
            margin-bottom: 20px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            width: 100% !important;
            padding: 10px !important;
            background-color: #0073aa !important;
            border: none !important;
            border-radius: 5px !important;
            color: #fff !important;
            font-size: 16px !important;
            cursor: pointer !important;
        }

        .login-container label {
            font-size: 14px;
            color: #555;
        }

        .login-container a {
            display: block;
            margin-top: 10px;
            color: #0073aa;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
        </h5>
        <img src="{{ URL::asset('assets/img/Logo/new_logo.png') }}" alt="Zer00neinfinity Solutions">
        <form action="{{ route('admin.loginProccess') }}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Username or Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <div style="text-align: left; margin: 10px 0;"></div>
            <input type="submit" value="LOGIN" name="login"/>
            <a href="#">Lost your password?</a>
        </form>
    </div>
</body>

</html>
