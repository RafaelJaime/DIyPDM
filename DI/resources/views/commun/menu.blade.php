<ul class="sidebar-menu">
    @Logged()
    <li class="header">MENU</li>
    
    <li>
        <a href="{{ url('/users') }}">

            <i class="fa fa-copyright"></i>
            <span>Gestión de usuarios</span>
        </a>
    </li>
    <li>
        <a href="{{url('empresa')}}">

            <i class="fa fa-building"></i>
            <span>Envío de email</span>
        </a>
    </li>
    <li>
        <a href="{{url('ciclo')}}">

            <i class="fa fa-circle"></i>
            <span>Generación  de  informes  en  formato  pdf</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/fichas') }}">

            <i class="fa fa-file"></i>
            <span>Pruebas  unitarias</span>
        </a>
    </li>
    @endLogged()
</ul>