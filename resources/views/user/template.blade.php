<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>JH Furniture</title>
</head>
<body>
    {{-- HEADER --}}
    <nav class="navbar navbar-expand-md navbar-dark justify-content-center" style="background-color: {{PRIMARY_COLOR}};">
        <div class="container-fluid">
            <a class="navbar-brand me-auto p-2 bd-highlight" href="#">JH Furniture</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view">View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
            </ul>
    </nav>

    {{-- BODY --}}
    <div class="container-fluid">
        @yield('body')
    </div>

    {{-- FOOTER --}}
    <footer class="fixed-bottom" style="background-color: {{PRIMARY_COLOR}};">
        <p class="text-center color fs-6 text-light align-self-center mb-0">Copyright &copy; Marcelino Budiman - Hezekiah Caleb</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
