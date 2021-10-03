@extends('layouts.master')

@section('content')
    @include('layouts.subheader')
    <div class="container" style="margin-top: 58px; width: 50rem;" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        <div id="card" class="card-header">
            <h3 class="card-title text-center">{{ $generals->name }}</h3>
        </div>
    </div>

    <div class="row container-fluid">
        <!-- left Column -->
        <div class="p-5 col-md-3">

            <div class="card" style="width: 28.5rem">
                <div class= "card-body" style="width: 28.5rem">
                    <img src="" alt="" width="100%" height="300" />
                </div>
            </div>

            <div class="card" style="margin-top: 58px; width: 28.5rem;">
                <div class= "card-body" style="width:100%">
                    <h6 class="card-text gap-3"> Name:{{ $generals->name }} </h6>
                    <h6 class="card-text gap-3"> Type:{{ $generals->type }} </h6>
                    <h6 class="card-text gap-3"> Price:{{ $generals->price }} </h6>
                    <h6 class="card-text gap-3"> Manufacturer:{{ $generals->manufacturer }} </h6>
                    <h6 class="card-text gap-3"> Series:{{ $generals->series }} </h6>
                    <h6 class="card-text gap-3"> Model:{{ $generals->model }} </h6>
                    <h6 class="card-text gap-3"> Color:{{ $generals->color }} </h6>
                    <h6 class="card-text gap-3"> Length:{{ $generals->length }} </h6>
                    <h6 class="card-text gap-3"> Width:{{ $generals->width }} </h6>
                    <h6 class="card-text gap-3"> Height:{{ $generals->height }} </h6>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="p-5 col-lg-auto container-fluid">
            <div class="card" style="margin-top: 1px; width: 70rem;height: 21rem;">
                <div class= "card-body">
                    @for(array(sizeof($holder))){
                    <h6 class="card-text"> Gen Info 1: </h6>
                    }
                    <h6 class="card-text"> Gen Info 1: </h6>
                    <h6 class="card-text"> Gen Info 1: </h6>
                    <h6 class="card-text"> Gen Info 1: </h6>
                    <h6 class="card-text"> Gen Info 1: </h6>
                </div>
            </div>
            <div class="p-3 container justify-content-center" style="margin-top: 116px; width: 28.5rem;">
                <button type="button" href="" class="btn btn-info">Edit Information</button>
            </div>
        </div>
    </div>

@endsection
