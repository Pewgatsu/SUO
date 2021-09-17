<header>
    <div class="container my-1">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('users') }}">Users</a>
            </li>
            <li class="nav-item dropdown" role="presentation">
                <button class="nav-link dropdown-toggle" id="profile-tab" data-bs-toggle="dropdown"
                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Components
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="">Motherboard</a></li>
                    <li><a class="dropdown-item" href="">CPU</a></li>
                    <li><a class="dropdown-item" href="">CPU
                            Cooler</a></li>
                    <li><a class="dropdown-item" href="">Graphics Card</a></li>
                    <li><a class="dropdown-item" href="">RAM</a></li>
                    <li><a class="dropdown-item" href="">Storage</a>
                    </li>
                    <li><a class="dropdown-item" href="">PSU</a></li>
                    <li><a class="dropdown-item" href="">Computer Case</a></li>
                </ul>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('search') }}">Search</a>
            </li>

        </ul>
    </div>
</header>




