<nav class="navbar navbar-expand-lg" style="background: #023E8A">
    <div class="container container-fluid">

        @auth
            @if(auth()->user()->account_type === 'Admin' && auth()->user()->is_admin)
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.users') }}">Users</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Components
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item"
                               href="{{ route('admin.components.motherboards') }}">Motherboard</a>
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
            </ul>
        </div>
            @elseif(auth()->user()->account_type === 'Seller')
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('myStore') }}">My Store</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Components
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item"
                                           href="{{ route('seller.products.motherboards') }}">Motherboard</a>
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
                        </ul>
                    </div>
            @elseif(auth()->user()->account_type === 'Customer')
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-decoration-none text-white" href="{{ route('builder') }}">Build</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-decoration-none text-white" href="{{ route('builds') }}">My Builds</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white text-decoration-none" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Components
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
                    </ul>
                </div>
                @endif
        @endauth
    </div>
</nav>



{{--<nav class="navbar navbar-expand-lg mb-3" style="background: linear-gradient(0deg, #202020 0%, #2d2d2d 100%)">--}}
{{--    <div class="container container-fluid" >--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll text-white" style="--bs-scroll-height: 100px;">--}}
{{--                @auth--}}
{{--                    @if(auth()->user()->account_type === 'Admin' && auth()->user()->is_admin)--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <a class="nav-link text-white" href="{{ route('admin.users') }}">Users</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarNavDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                Components--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="navbarNavDropdownMenu">--}}
{{--                                <li><a class="dropdown-item"--}}
{{--                                       href="{{ route('admin.components.motherboards') }}">Motherboard</a>--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.cpus') }}">CPU</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.cpu_coolers') }}">CPU--}}
{{--                                        Cooler</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.graphics_cards') }}">Graphics--}}
{{--                                        Card</a>--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.rams') }}">RAM</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.storages') }}">Storage</a>--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.psus') }}">PSU</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.components.computer_cases') }}">Computer--}}
{{--                                        Case</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                    @if(auth()->user()->account_type === 'Seller')--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <a class="nav-link" href="{{ route('myStore') }}">My Store</a>--}}
{{--                        </li>--}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    Components--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">--}}
{{--                                    <li><a class="dropdown-item"--}}
{{--                                           href="{{ route('seller.products.motherboards') }}">Motherboard</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.cpus') }}">CPU</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.cpu_coolers') }}">CPU--}}
{{--                                            Cooler</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.graphics_cards') }}">Graphics--}}
{{--                                            Card</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.rams') }}">RAM</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.storages') }}">Storage</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.psus') }}">PSU</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('seller.products.computer_cases') }}">Computer--}}
{{--                                            Case</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                    @elseif(auth()->user()->account_type === 'Customer')--}}

{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <a class="nav-link" href="{{ route('builder') }}">Build</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <a class="nav-link" href="{{ route('builds') }}">My Builds</a>--}}
{{--                        </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    Components--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.motherboards') }}">Motherboard</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.cpus') }}">CPU</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.cpu_coolers') }}">CPU--}}
{{--                                            Cooler</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.graphics_cards') }}">Graphics Card</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.rams') }}">RAM</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.storages') }}">Storage</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.psus') }}">PSU</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('products.computer_cases') }}">Computer Case</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                    @endif--}}
{{--                @endauth--}}

{{--            </ul>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}







