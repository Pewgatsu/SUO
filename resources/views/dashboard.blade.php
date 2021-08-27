<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#users_table').DataTable();
        });
        $(document).ready(function () {
            $('#motherboard_table').DataTable();
        });
        $(document).ready(function () {
            $('#cpu_table').DataTable();
        });
        $(document).ready(function () {
            $('#cpu_cooler_table').DataTable();
        });
        $(document).ready(function () {
            $('#graphics_card_table').DataTable();
        });
        $(document).ready(function () {
            $('#ram_table').DataTable();
        });
        $(document).ready(function () {
            $('#storage_table').DataTable();
        });
        $(document).ready(function () {
            $('#psu_table').DataTable();
        });
        $(document).ready(function () {
            $('#computer_case_table').DataTable();
        });
    </script>

    <title>Admin</title>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="#">
            <img src="#" alt="" width="30" height="30" class="d-inline-block align-text-top">
            System Unit Optimizer
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#user_profile" class="nav-link">User Profile</a>
                </li>
                <li class="nav-item">
                    <a href="#logout" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- navigation tab -->
<header id="header">
    <div class="container my-1">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard"
                        type="button" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button"
                        role="tab" aria-controls="users" aria-selected="true">Users
                </button>
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
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="bi bi-gear"></i>
                            <small> Dashboard</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Add Component
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_motherboard">Motherboard</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_cpu">CPU</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_cpu_cooler">CPU Cooler</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_graphics_card">Graphics Card</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_ram">RAM</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_storage">Storage</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_psu">PSU</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#add_computer_case">Computer Case</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <section class="mt-2" id="overview">
                    <div class="container">
                        <div class="row">

                            <!-- Component Breakdown -->
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center disabled">
                                        Components
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Motherboard
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        CPU
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        CPU Cooler
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Graphics Card
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        RAM
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Storage
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        PSU
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Computer Case
                                        <span class="badge bg-primary rounded-pill">1</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Website Overview -->
                            <div class="col-md-8 my-3 my-md-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title p-2 text-center">Website Overview</h4>
                                        <div class="row text-center g-2">
                                            <div class="col-md">
                                                <div class="card card-body bg-light">
                                                    <div class="h3">
                                                        <i class="bi bi-person"></i>
                                                        <small>69</small>
                                                    </div>
                                                    Users
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="card card-body bg-light">
                                                    <div class="h3">
                                                        <i class="bi bi-cpu"></i>
                                                        <small>69</small>
                                                    </div>
                                                    Components
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="card card-body bg-light">
                                                    <div class="h3">
                                                        <i class="bi bi-bar-chart"></i>
                                                        <small>69</small>
                                                    </div>
                                                    Visitors
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Latest Users -->
                            <div class="col-md my-0 mt-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title p-2 text-center">Latest Users</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Username</th>
                                                    <th>Account Type</th>
                                                    <th>Verified</th>
                                                    <th>Date Joined</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Latest Components -->
                            <div class="col-md my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title p-2 text-center">Latest Components</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Component ID</th>
                                                    <th>Component Name</th>
                                                    <th>Component Type</th>
                                                    <th>Manufacturer</th>
                                                    <th>Date Added</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                <tr>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                    <td>[Data]</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="bi bi-person"></i>
                            <small> Users</small>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="users_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Account Type</th>
                                            <th>Verified</th>
                                            <th>Active</th>
                                            <th>Date Joined</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Suspend</button>
                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Suspend</button>
                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Suspend</button>
                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Suspend</button>
                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Suspend</button>
                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="motherboard" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="fas fa-microchip"></i>
                            <small> Motherboard</small>
                        </div>
                    </div>
                </div>

                <!-- Motherboard Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="motherboard_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>CPU Socket</th>
                                            <th>Form Factor</th>
                                            <th>Chipset</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="cpu" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="bi bi-cpu-fill"></i>
                            <small> CPU</small>
                        </div>
                    </div>
                </div>

                <!-- CPU Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="cpu_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>CPU Socket</th>
                                            <th>Core Count</th>
                                            <th>Base Clock</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="cpu_cooler" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="far fa-snowflake"></i>
                            <small> CPU Cooler</small>
                        </div>
                    </div>
                </div>

                <!-- CPU Cooler Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="cpu_cooler_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>CPU Socket</th>
                                            <th>Fan Speed</th>
                                            <th>Noise Level</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="graphics_card" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="fas fa-tv"></i>
                            <small> Graphics Card</small>
                        </div>
                    </div>
                </div>

                <!-- Graphics Card Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="graphics_card_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>GPU Chipset</th>
                                            <th>GPU Memory</th>
                                            <th>Base Clock</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="ram" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="fas fa-memory"></i>
                            <small> RAM</small>
                        </div>
                    </div>
                </div>

                <!-- RAM Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="ram_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>Memory Type</th>
                                            <th>Memory Speed</th>
                                            <th>Modules</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="storage" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="fas fa-hdd"></i>
                            <small> Storage</small>
                        </div>
                    </div>
                </div>

                <!-- Storage Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="storage_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>Storage Type</th>
                                            <th>Storage Capacity</th>
                                            <th>Interface</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="psu" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="fas fa-plug"></i>
                            <small> PSU</small>
                        </div>
                    </div>
                </div>

                <!-- PSU Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="psu_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>Form Factor</th>
                                            <th>Wattage</th>
                                            <th>Efficiency Rating</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show" id="computer_case" role="tabpanel" aria-labelledby="users-tab">
                <div class="container">
                    <div class="d-sm-flex my-2 justify-content-between align-items-center">
                        <div class="h1">
                            <i class="fas fa-suitcase"></i>
                            <small> Computer Case</small>
                        </div>
                    </div>
                </div>

                <!-- Computer Case Table -->
                <section class="mb-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="computer_case_table" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>Case Type</th>
                                            <th>Power Supply</th>
                                            <th>Side Panel Window</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>
                                                <button type="button" class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</header>

<footer class="text-center bg-dark text-light">
    <div class="d-flex justify-content-center align-items-center py-3">
        <p class="lead">Copyright System Unit Optimizer, &copy; 2021</p>
    </div>
</footer>

<!-- Modals -->

<!-- Add Motherboard -->
<div class="modal fade" id="add_motherboard" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_motherboard_label" aria-hidden="true">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_motherboard_label">Motherboard</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        <label for="mobo_image" class="form-label">Component Image</label>
                        <input class="form-control" type="file" id="mobo_image">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_name" placeholder="Component Name">
                        <label for="mobo_name">Component Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_manufacturer" placeholder="Manufacturer">
                        <label for="mobo_manufacturer">Manufacturer</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_series" placeholder="Series">
                        <label for="mobo_series">Series</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_model" placeholder="Model">
                        <label for="mobo_model">Model</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_color" placeholder="Color">
                        <label for="mobo_color">Color</label>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mobo_length" placeholder="Length (mm)">
                                <label for="mobo_length">Length (mm)</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mobo_width" placeholder="Width (mm)">
                                <label for="mobo_width">Width (mm)</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mobo_height" placeholder="Height (mm)">
                                <label for="mobo_height">Height (mm)</label>
                            </div>
                        </div>
                    </div>

                    <!-- Motherboard Attributes -->

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_cpu_socket" placeholder="CPU Socket">
                        <label for="mobo_cpu_socket">CPU Socket</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_form_factor" placeholder="Form Factor">
                        <label for="mobo_form_factor">Form Factor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_chipset" placeholder="Chipset">
                        <label for="mobo_chipset">Chipset</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_memory_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_memory_slot">Memory Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_memory_type" placeholder="Memory Type">
                        <label for="mobo_memory_type">Memory Type</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_max_mem_support"
                               placeholder="Maximum Memory Support (GB)">
                        <label for="mobo_max_mem_support">Maximum Memory Support (GB)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_mem_speed_support"
                               placeholder="Memory Speed Support">
                        <label for="mobo_mem_speed_support">Memory Speed Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_pcie_x16_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_pcie_x16_slot">PCIe x16 Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_pcie_x8_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_pcie_x8_slot">PCIe x8 Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_pcie_x4_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_pcie_x4_slot">PCIe x4 Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_pcie_x1_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_pcie_x1_slot">PCIe x1 Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_pci_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_pci_slot">PCI Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_m2_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_m2_slot">M.2 Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_sata_6gb_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_sata_6gb_slot">SATA 6 Gb/s Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_sata_3gb_slot">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                        <label for="mobo_sata_3gb_slot">SATA 3 Gb/s Slot</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_multigraphics_support"
                               placeholder="Multigraphics Support">
                        <label for="mobo_multigraphics_support">Multigraphics Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_ecc_support">
                            <option value="NULL" selected>NULL</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <label for="mobo_ecc_support">ECC Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_raid_support">
                            <option value="NULL" selected>NULL</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <label for="mobo_raid_support">RAID Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="mobo_wireless_support"
                               placeholder="Wireless Support">
                        <label for="mobo_wireless_support">Wireless Support</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add CPU -->
<div class="modal fade" id="add_cpu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_cpu_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_cpu_label">CPU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="cpu_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="cpu_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_name" placeholder="Component Name">
                    <label for="cpu_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_manufacturer" placeholder="Manufacturer">
                    <label for="cpu_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_series" placeholder="Series">
                    <label for="cpu_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_model" placeholder="Model">
                    <label for="cpu_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_color" placeholder="Color">
                    <label for="cpu_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cpu_length" placeholder="Length (mm)">
                            <label for="cpu_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cpu_width" placeholder="Width (mm)">
                            <label for="cpu_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cpu_height" placeholder="Height (mm)">
                            <label for="cpu_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- CPU Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_socket" placeholder="CPU Socket">
                    <label for="cpu_socket">CPU Socket</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_microarchitecture"
                           placeholder="Microarchitecture">
                    <label for="cpu_microarchitecture">Microarchitecture</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_core_count" placeholder="Core Count">
                    <label for="cpu_core_count">Core Count</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_thread_count" placeholder="Thread Count">
                    <label for="cpu_thread_count">Thread Count</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_base_clock" placeholder="Base Clock (GHz)">
                    <label for="cpu_base_clock">Base Clock (GHz)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_boost_clock" placeholder="Boost Clock (GHz)">
                    <label for="cpu_boost_clock">Boost Clock (GHz)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_max_mem_support"
                           placeholder="Maximum Memory Support (GB)">
                    <label for="cpu_max_mem_support">Maximum Memory Support (GB)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_tdp" placeholder="TDP (W)">
                    <label for="cpu_tdp">TDP (W)</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="cpu_smt_support">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="cpu_smt_support">SMT Support</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="cpu_ecc_support">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="cpu_ecc_support">ECC Support</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_integrated_graphics"
                           placeholder="Integrated Graphics">
                    <label for="cpu_integrated_graphics">Integrated Graphics</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Add CPU Cooler -->
<div class="modal fade" id="add_cpu_cooler" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_cpu_cooler_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_cpu_cooler_label">CPU Cooler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="cpu_cooler_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="cpu_cooler_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_name" placeholder="Component Name">
                    <label for="cpu_cooler_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_manufacturer" placeholder="Manufacturer">
                    <label for="cpu_cooler_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_series" placeholder="Series">
                    <label for="cpu_cooler_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_model" placeholder="Model">
                    <label for="cpu_cooler_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_color" placeholder="Color">
                    <label for="cpu_cooler_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cpu_cooler_length"
                                   placeholder="Length (mm)">
                            <label for="cpu_cooler_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cpu_cooler_width" placeholder="Width (mm)">
                            <label for="cpu_cooler_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cpu_cooler_height"
                                   placeholder="Height (mm)">
                            <label for="cpu_cooler_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- CPU Cooler Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_cpu_socket" placeholder="CPU Socket">
                    <label for="cpu_cooler_cpu_socket">CPU Socket</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_fan_speed" placeholder="Fan Speed (rpm)">
                    <label for="cpu_cooler_fan_speed">Fan Speed (rpm)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_noise_level" placeholder="Noise Level (dB)">
                    <label for="cpu_cooler_noise_level">Noise Level (dB)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpu_cooler_water_cooled"
                           placeholder="Water Cooled Support">
                    <label for="cpu_cooler_water_cooled">Water Cooled Support</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Graphics Card -->
<div class="modal fade" id="add_graphics_card" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_graphics_card_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_graphics_card_label">Graphics Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="graphics_card_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="graphics_card_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_name" placeholder="Component Name">
                    <label for="graphics_card_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_manufacturer"
                           placeholder="Manufacturer">
                    <label for="graphics_card_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_series" placeholder="Series">
                    <label for="graphics_card_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_model" placeholder="Model">
                    <label for="graphics_card_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_color" placeholder="Color">
                    <label for="graphics_card_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="graphics_card_length"
                                   placeholder="Length (mm)">
                            <label for="graphics_card_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="graphics_card_width"
                                   placeholder="Width (mm)">
                            <label for="graphics_card_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="graphics_card_height"
                                   placeholder="Height (mm)">
                            <label for="graphics_card_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- Graphics Card Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_chipset" placeholder="GPU Chipset">
                    <label for="graphics_card_chipset">GPU Chipset</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_memory" placeholder="GPU Memory">
                    <label for="graphics_card_memory">GPU Memory</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_memory_type"
                           placeholder="GPU Memory Type">
                    <label for="graphics_card_memory_type">GPU Memory Type</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_base_clock"
                           placeholder="Base Clock (MHz)">
                    <label for="graphics_card_base_clock">Base Clock (MHz)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_boost_clock"
                           placeholder="Boost Clock (MHz)">
                    <label for="graphics_card_boost_clock">Boost Clock (MHz)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_interface" placeholder="Interface">
                    <label for="graphics_card_interface">Interface</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_tdp" placeholder="TDP (W)">
                    <label for="graphics_card_tdp">TDP (W)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_multigraphics_support"
                           placeholder="Multigraphics Support">
                    <label for="graphics_card_multigraphics_support">Multigraphics Support</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_frame_sync" placeholder="Frame Sync">
                    <label for="graphics_card_frame_sync">Frame Sync</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="graphics_card_dvi_port">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="graphics_card_dvi_port">DVI Port</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="graphics_card_hdmi_port">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="graphics_card_hdmi_port">HDMI Port</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="graphics_card_mini_hdmi_port">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="graphics_card_mini_hdmi_port">Mini-HDMI Port</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="graphics_card_displayport_port">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="graphics_card_displayport_port">DisplayPort Port</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="graphics_card_mini_displayport_port">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="graphics_card_mini_displayport_port">Mini-DisplayPort Port</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="graphics_card_e_slot_width">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="graphics_card_e_slot_width">Expansion Slot Width</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_external_power"
                           placeholder="External Power">
                    <label for="graphics_card_external_power">External Power</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="graphics_card_cooling" placeholder="Cooling">
                    <label for="graphics_card_cooling">Cooling</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Add RAM -->
<div class="modal fade" id="add_ram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_ram_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_ram_label">RAM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="ram_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="ram_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_name" placeholder="Component Name">
                    <label for="ram_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_manufacturer" placeholder="Manufacturer">
                    <label for="ram_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_series" placeholder="Series">
                    <label for="ram_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_model" placeholder="Model">
                    <label for="ram_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_color" placeholder="Color">
                    <label for="ram_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ram_length" placeholder="Length (mm)">
                            <label for="ram_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ram_width" placeholder="Width (mm)">
                            <label for="ram_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ram_height" placeholder="Height (mm)">
                            <label for="ram_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- RAM Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_memory_type" placeholder="Memory Type">
                    <label for="ram_memory_type">Memory Type</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_memory_speed" placeholder="Memory Speed (MHz)">
                    <label for="ram_memory_speed">Memory Speed (MHz)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_memory_capacity"
                           placeholder="Memory Capacity (GB))">
                    <label for="ram_memory_capacity">Memory Capacity (GB))</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_form_factor" placeholder="Form Factor">
                    <label for="ram_form_factor">Form Factor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_modules" placeholder="Modules">
                    <label for="ram_modules">Modules</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_voltage" placeholder="Voltage (V)">
                    <label for="ram_voltage">Voltage (V)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ram_timings" placeholder="Memory Timings">
                    <label for="ram_timings">Memory Timings</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="ram_ecc_memory">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="ram_ecc_memory">ECC Memory</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="ram_registered_memory">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="ram_registered_memory">Registered Memory</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="ram_heat_spreader">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="ram_heat_spreader">Heat Spreader</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Storage -->
<div class="modal fade" id="add_storage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_storage_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_storage_label">Storage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="storage_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="storage_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_name" placeholder="Component Name">
                    <label for="storage_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_manufacturer" placeholder="Manufacturer">
                    <label for="storage_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_series" placeholder="Series">
                    <label for="storage_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_model" placeholder="Model">
                    <label for="storage_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_color" placeholder="Color">
                    <label for="storage_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="storage_length" placeholder="Length (mm)">
                            <label for="storage_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="storage_width" placeholder="Width (mm)">
                            <label for="storage_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="storage_height" placeholder="Height (mm)">
                            <label for="storage_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- Storage Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_type" placeholder="Storage Type">
                    <label for="storage_type">Storage Type</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_capacity" placeholder="Storage Capacity (GB)">
                    <label for="storage_capacity">Storage Capacity (GB)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_interface" placeholder="Interface">
                    <label for="storage_interface">Interface</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_form_factor" placeholder="Form Factor">
                    <label for="storage_form_factor">Form Factor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="storage_cache" placeholder="Storage Cache (MB)">
                    <label for="storage_cache">Storage Cache (MB)</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="storage_nvme">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="storage_nvme">NVMe</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Add PSU -->
<div class="modal fade" id="add_psu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_psu_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_psu_label">PSU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="psu_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="psu_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_name" placeholder="Component Name">
                    <label for="psu_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_manufacturer" placeholder="Manufacturer">
                    <label for="psu_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_series" placeholder="Series">
                    <label for="psu_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_model" placeholder="Model">
                    <label for="psu_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_color" placeholder="Color">
                    <label for="psu_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="psu_length" placeholder="Length (mm)">
                            <label for="psu_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="psu_width" placeholder="Width (mm)">
                            <label for="psu_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="psu_height" placeholder="Height (mm)">
                            <label for="psu_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- PSU Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_form_factor" placeholder="Form Factor">
                    <label for="psu_form_factor">Form Factor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_wattage" placeholder="Wattage (W)">
                    <label for="psu_wattage">Wattage (W)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="psu_efficiency_rating" placeholder="Efficiency Rating">
                    <label for="psu_efficiency_rating">Efficiency Rating</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_modular">
                        <option value="NULL" selected>NULL</option>
                        <option value="None">Non-Modular</option>
                        <option value="Semi">Semi-Modular</option>
                        <option value="Full">Fully-Modular</option>
                    </select>
                    <label for="psu_modular">Modular</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_atx_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_atx_connector">ATX Connector</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_eps_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_eps_connector">EPS Connector</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_sata_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_sata_connector">SATA Connector</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_molex_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_molex_connector">Molex 4-pin Connector</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_pcie_8pin_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_pcie_8pin_connector">PCIe 8-pin Connector</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_pcie_62pin_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_pcie_62pin_connector">PCIe 6+2-pin Connector</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="psu_pcie_6pin_connector">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="psu_pcie_6pin_connector">PCIe 6-pin Connector</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Computer Case -->
<div class="modal fade" id="add_computer_case" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="add_computer_case_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_computer_case_label">Computer Case</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Component Attributes -->

                <div class="mb-3">
                    <label for="case_image" class="form-label">Component Image</label>
                    <input class="form-control" type="file" id="case_image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_name" placeholder="Component Name">
                    <label for="case_name">Component Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_manufacturer" placeholder="Manufacturer">
                    <label for="case_manufacturer">Manufacturer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_series" placeholder="Series">
                    <label for="case_series">Series</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_model" placeholder="Model">
                    <label for="case_model">Model</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_color" placeholder="Color">
                    <label for="case_color">Color</label>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="case_length" placeholder="Length (mm)">
                            <label for="case_length">Length (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="case_width" placeholder="Width (mm)">
                            <label for="case_width">Width (mm)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="case_height" placeholder="Height (mm)">
                            <label for="case_height">Height (mm)</label>
                        </div>
                    </div>
                </div>

                <!-- Computer Case Attributes -->

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_type" placeholder="Computer Case Type">
                    <label for="case_type">Computer Case Type</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_mobo_form_factor"
                           placeholder="Motherboard Form Factor">
                    <label for="case_mobo_form_factor">Motherboard Form Factor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_power_supply" placeholder="Power Supply">
                    <label for="case_power_supply">Power Supply</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_power_supply_shroud">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="case_power_supply_shroud">Power Supply Shroud</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_side_panel_window" placeholder="Side Panel Window">
                    <label for="case_side_panel_window">Side Panel Window</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_water_cooled_support">
                        <option value="NULL" selected>NULL</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="case_water_cooled_support">Water Cooled Support</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_cooler_clearance"
                           placeholder="Cooler Clearance (mm)">
                    <label for="case_cooler_clearance">Cooler Clearance (mm)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_graphics_clearance"
                           placeholder="Graphics Card Clearance (mm)">
                    <label for="case_graphics_clearance">Graphics Card Clearance (mm)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="case_psu_clearance" placeholder="PSU Clearance (mm)">
                    <label for="case_psu_clearance">PSU Clearance (mm)</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_full_height_e_slot">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="case_full_height_e_slot">Full-Height Expansion Slot</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_half_height_e_slot">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="case_half_height_e_slot">Half-Height Expansion Slot</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_external_525_bay">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="case_external_525_bay">External 5.25" Bay</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_external_350_bay">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="case_external_350_bay">External 3.5" Bay</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_internal_350_bay">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="case_internal_350_bay">Internal 3.5" Bay</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="case_internal_250_bay">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>
                    <label for="case_internal_250_bay">Internal 2.5" Bay</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
