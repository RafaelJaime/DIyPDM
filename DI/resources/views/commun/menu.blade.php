<ul class="sidebar-menu">
    @Logged()
    <li class="header">MENU</li>
    
    <li>
        <a href="{{ url('/users') }}">

            <i class="fa fa-user"></i>
            <span>User Management</span>
        </a>
    </li>
    <li>
        <a href="{{ route('enviarEmail') }}">
            <i class="fa fa-envelope"></i>
            <span>Send a email</span>
        </a>
    </li>
    <li>
        <a href="{{url('pdf')}}">

            <i class="fa fa-file-pdf-o"></i>
            <span>Report generation</span>
        </a>
    </li>
    @endLogged()
</ul>