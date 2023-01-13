<!DOCTYPE html>
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
</html>
