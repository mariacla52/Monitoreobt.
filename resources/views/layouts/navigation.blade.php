<nav class="navbar">

    <!-- Logo y título -->
    <div class="navbar-brand">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Refrescos BT" class="logo">

        <div class="brand-text">
            <strong>Refrescos BT</strong><br>
            <small>Sistema de Monitoreo</small>
        </div>
    </div>

    <!-- Inicio -->
    <ul class="navbar-menu">
        <li><a href="/">Inicio</a></li>

         @auth
        <li><a href="{{ route('machines.index') }}">Máquinas</a></li>

        <!-- Notificaciones -->
        <li class="nav-icon"> ✉ </li>

        <!-- Perfil -->
        <li class="profile-menu">
            <span class="profile-circle"> 👤 </span>

            <ul class="dropdown">
                <li><a href="#">Configuración</a></li>
                <li><form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </li>
        
        @else
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Registrarse</a></li>
        <li><a href="/contacto">Contacto</a></li>
        @endauth
    </ul>
</nav>




