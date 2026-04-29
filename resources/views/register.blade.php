<h2>Register</h2>

<form method="POST" action="/register">
    @csrf

    Nama:
    <input type="text" name="name">

    <br><br>

    Email:
    <input type="email" name="email">

    <br><br>

    Password:
    <input type="password" name="password">

    <br><br>

    Role:

    <select name="role">

        <option value="admin">
            Admin
        </option>

        <option value="petugas">
            Petugas
        </option>

        <option value="siswa">
            Siswa
        </option>

    </select>

    <br><br>

    <button type="submit">
        Register
    </button>

</form>