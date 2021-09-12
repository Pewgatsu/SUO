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
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab"
                           data-bs-target="#motherboard">Motherboard</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#cpu">CPU</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#cpu_cooler">CPU
                            Cooler</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab"
                           data-bs-target="#graphics_card">Graphics Card</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#ram">RAM</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#storage">Storage</a>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#psu">PSU</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab"
                           data-bs-target="#computer_case">Computer Case</a></li>
                </ul>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('search') }}">Search</a>
            </li>
        </ul>
    </div>
</header>
