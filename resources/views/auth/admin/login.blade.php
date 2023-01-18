<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
    body {
        font-family: Calibri, Helvetica, sans-serif;
        background-color: #a2d9e591;
    }
    button {
        background-color: #4CAF50;
        width: 100%;
        color: white;
        padding: 15px;
        margin: 10px 0px;
        border: none;
        cursor: pointer;
    }
    input[type=text], input[type=password] {
        border-radius: 5px;
        width: 100%;
        margin: 10px 0;
        padding: 12px 20px;
        display: inline-block;
        box-sizing: border-box;
    }
    button:hover {
        opacity: 0.7;
        color: black;
    }
    .container {
        border-radius: 10px;
        margin: 0 30em;
        padding: 25px;
        background-color: lightblue;
    }
    .alert {
        background: red;
        color: white;
        margin: 10px 30em;
        border-radius: 10px;
    }
    .alert p{
        margin: 0px 0 0 22px;
        padding: 4px 0 4px 0px;
        text-align: left;
        padding: 5px;
    }
</style>
</head>
<body>
    <center>
        <h1> Admin Login </h1>

        @if ($errors->any())
        <div class="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
    </center>

    <form method="POST" action="{{ route('admin.login') }}">
        <div class="container">
            @csrf
            <label>Username : </label>
            <input type="text" name="email" autocomplete="off" placeholder="Enter Username" value="{{ old('email') }}" required>
            <label>Password : </label>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <input type="text" name="email" placeholder="Enter Username" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit">
    </form>
</body>
</html> --}}
