<header>
    <div class="container my-1">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="nav-item dropdown" role="presentation">
                <button class="nav-link dropdown-toggle" id="profile-tab" data-bs-toggle="dropdown"
                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Components
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.components.motherboards') }}">Motherboard</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.cpus') }}">CPU</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.cpu_coolers') }}">CPU
                            Cooler</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.graphics_cards') }}">Graphics Card</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.rams') }}">RAM</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.storages') }}">Storage</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.psus') }}">PSU</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.components.computer_cases') }}">Computer Case</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('search') }}">Search</a>
            </li>

        </ul>
    </div>
</header>




