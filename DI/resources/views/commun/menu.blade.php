<ul class="sidebar-menu">
    @Logged()
    <li class="header">MENU</li>
    
    <li>
        <a href="{{ url('/users') }}">

            <i class="fa fa-copyright"></i>
            <span>User Management</span>
        </a>
    </li>
    <li>
        <a href="{{url('empresa')}}">

            <i class="fa fa-building"></i>
            <span>Sending email</span>
        </a>
    </li>
    <li>
        <a href="{{url('ciclo')}}">

            <i class="fa fa-circle"></i>
            <span>Report generation in pdf format</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/fichas') }}">

            <i class="fa fa-file"></i>
            <span>Unit tests</span>
        </a>
    </li>
    @endLogged()
</ul>