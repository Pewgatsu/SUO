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
                    <li><a class="dropdown-item" href="{{route('test',['model' => \App\Models\Motherboard::class])}}">Motherboard</a></li>
                    <li><a class="dropdown-item" href="{{route('test')}}">CPU</a></li>
                    <li><a class="dropdown-item" href="{{route('test')}}">CPU
                            Cooler</a></li>
                    <li><a class="dropdown-item" href="{{route('test')}}">Graphics Card</a></li>
                    <li><a class="dropdown-item" href="{{route('test')}}">RAM</a></li>
                    <li><a class="dropdown-item" href="{{route('test')}}">Storage</a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('test')}}">PSU</a></li>
                    <li><a class="dropdown-item" href="{{route('test')}}">Computer Case</a></li>
                </ul>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('search') }}">Search</a>
            </li>

        </ul>
    </div>
</header>




