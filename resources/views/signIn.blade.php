<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 400px; margin: 60px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h2 { text-align: center; margin-bottom: 24px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; }
        input[type="email"], input[type="password"] {
            width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;
        }
        .forgot-link { display: block; text-align: right; margin-top: 8px; font-size: 0.95em; }
        button { width: 100%; padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 4px; font-size: 1em; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign In</h2>
        <div style="text-align: center; margin-bottom: 20px;">
            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" style="display:inline-block;">
                <circle cx="32" cy="32" r="32" fill="#e9ecef"/>
                <circle cx="32" cy="26" r="12" fill="#adb5bd"/>
                <ellipse cx="32" cy="48" rx="18" ry="10" fill="#adb5bd"/>
            </svg>
        </div>
        <form method="POST" action="{{ route('signin') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>
            <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
            <button type="submit" style="margin-top: 16px;">Sign In</button>
            <div style="text-align: center; margin: 16px 0; color: #888;">OR</div>
            <a href="{{ route('signup') }}">
                <button type="button" style="margin-top: 12px; background: #6c757d;">Sign Up</button>
            </a>
        </form>
    </div>
</body>
</html></div></body></style>