<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">

        <span class="navbar-brand">
            Sistem Perpustakaan
        </span>

        <a href="/logout" class="btn btn-danger">
            Logout
        </a>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

</body>
</html>