<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                        </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
        @yield('content')
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        let image = document.getElementById('image');
        if (image != null) {
            image.addEventListener("change", function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    let preview = document.getElementById('preview');
                    preview.setAttribute("src", e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        }

    });
</script>

</html>