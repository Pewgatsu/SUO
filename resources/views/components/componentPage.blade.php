<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatable example</title>

    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<div class="container">
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($components as $data)

                <tr>
                    <th scope="row">{{$data->component_id}}</th>
                    <td>{{$data->cpu_socket}}</td>
                    <td>{{$data->mobo_form_factor}}</td>
                    <td>{{$data->mobo_chipset}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{--    <div class="d-flex justify-content-center">--}}
{{--        {{$components->links()}}--}}
{{--    </div>--}}


</div>






<script src="{{asset('js/app.js')}}"></script>



</body>
</html>

