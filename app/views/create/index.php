<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

    <h2>Register</h2>
    <form method="POST" action="/create/register">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="confirm" placeholder="Confirm Password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p><a href="/login">Back to Login</a></p>
</body>
</html>
