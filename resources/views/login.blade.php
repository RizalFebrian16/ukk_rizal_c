<h2>Login</h2>

<form method="POST" action="/login">
    @csrf

    Email:
    <input type="email" name="email">

    <br><br>

    Password:
    <input type="password" name="password">

    <br><br>

    <button type="submit">
        Login
    </button>
</form>