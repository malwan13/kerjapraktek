<nav class="navbar navbar-expand-lg navbar-dark bg-info" style="padding: 1rem 5rem;">
    <a class="navbar-brand" href="#">Pembayaran Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            @if (!session('is_member'))
                <a class="nav-item nav-link active" href="{{url('login')}}">Login</a>
                <a class="nav-item nav-link active" href="{{url('register')}}">Register</a>
            @else
                <div class="dropdown nav-item nav-link active">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Semester
                </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('user/dashboard/1')}}">Semester 1</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/2')}}">Semester 2</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/3')}}">Semester 3</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/4')}}">Semester 4</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/5')}}">Semester 5</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/6')}}">Semester 6</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/7')}}">Semester 7</a>
                        <a class="dropdown-item" href="{{url('user/dashboard/8')}}">Semester 8</a>
                    </div>
                </div>
                <a class="nav-item nav-link active" href="{{url('logout')}}">Logout</a>
            @endif
        </div>
    </div>
</nav>