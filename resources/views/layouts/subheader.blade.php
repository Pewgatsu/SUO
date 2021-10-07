<header>
    <div class="container my-1">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @auth
                @if(auth()->user()->is_admin)
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
                        <li><a class="dropdown-item" href="{{ route('admin.components.graphics_cards') }}">Graphics
                                Card</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.components.rams') }}">RAM</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.components.storages') }}">Storage</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.components.psus') }}">PSU</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.components.computer_cases') }}">Computer
                                Case</a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->account_type === 'Seller')
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('myStore') }}">My Store</a>
                </li>

                <li class="nav-item dropdown" role="presentation">
                    <button class="nav-link dropdown-toggle" id="profile-tab" data-bs-toggle="dropdown"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Products
                    </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('seller.products.motherboards') }}">Motherboard</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.cpus') }}">CPU</a></li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.cpu_coolers') }}">CPU
                                    Cooler</a></li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.graphics_cards') }}">Graphics
                                    Card</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.rams') }}">RAM</a></li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.storages') }}">Storage</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.psus') }}">PSU</a></li>
                            <li><a class="dropdown-item" href="{{ route('seller.products.computer_cases') }}">Computer
                                    Case</a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth()->user()->account_type === 'Customer')

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('builder') }}">Build</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('builds') }}">My Builds</a>
                    </li>                <li class="nav-item dropdown" role="presentation">
                            <button class="nav-link dropdown-toggle" id="profile-tab" data-bs-toggle="dropdown"
                                    data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Products
                            </button>


                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('products.motherboards') }}">Motherboard</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('products.cpus') }}">CPU</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.cpu_coolers') }}">CPU
                                Cooler</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.graphics_cards') }}">Graphics Card</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('products.rams') }}">RAM</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.storages') }}">Storage</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('products.psus') }}">PSU</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.computer_cases') }}">Computer Case</a>
                        </li>
                    </ul>
                </li>
                @endif
            @endauth
        </ul>
    </div>
</header>




