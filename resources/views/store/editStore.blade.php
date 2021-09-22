@section('head')
@endsection
@extends('layouts.master')
@section('content')

<div class="container-xl mt-4 ">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form  class="mb-4"  method="get" action="{{route('saveInfo')}}" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="storeBanner" class="form-label">Store Image Banner</label>
            <input class="form-control" type="file"
                   id="storeBanner" name="storeBanner">
        </div>

        <div class="mb-3">
            <label for="storeName" class="form-label">Store Name</label>
            <input type="text" class="form-control" id="storeName" name="storeName" value="{{old('storeName')}}">
        </div>
        <div class="mb-3">
            <label for="storeAddress" class="form-label">Store Address</label>
            <input type="text" class="form-control" id="storeAddress" name="storeAddress" value="{{old('storeAddress')}}">
            <div id="storeAddressHelp" class="form-text"> To enter the correct address:
                <ul>
                    <li>Go to <a href = "https://www.google.com/maps/">https://www.google.com/maps/</a></li>
                    <li>Input Your Store Address</li>
                    <li>Click Share and Choose the "Embed a map" tab</li>
                    <li>Copy ONLY the text inside src=""</li>
                </ul>
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="control-label " for="storeDescription">Store Description</label>
            <div class="col-sm-12">
                <textarea class="form-control" rows="5" id="storeDescription"
                          name="storeDescription">{{old('storeDescription')}}</textarea>
            </div>
        </div>



        Choose A Component to Feature:

        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="motherboards">MotherBoard:</label>
            <select name="motherboards" id="motherboards" style="width: 80%;"> Select A MotherBoard to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="cpus">CPU:</label>
            <select name="cpus" id="cpus" style="width: 80%;"> Select A CPU to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="cpu_coolers">CPU Cooler:</label>
            <select name="cpu_coolers" id="cpu_coolers" style="width: 80%;"> Select A CPU Cooler to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="graphics_cards">Graphics Card:</label>
            <select name="graphics_cards" id="graphics_cards" style="width: 80%;"> Select A Graphics Card to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="rams">RAM:</label>
            <select name="rams" id="rams" style="width: 80%;"> Select A RAM to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="storages">Storage:</label>
            <select name="storages" id="storages" style="width: 80%;">Select A Storage to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="psus">Power Supply:</label>
            <select name="psus" id="psus" style="width: 80%;"> Select A Powerr Supply to Feature
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-1" for="computer_cases">ComputerCase:</label>
            <select name="computer_cases" id="computer_cases" style="width: 80%;">
                <option value="0">----------</option>
                <option value="1">4asdasdsad</option>
                <option value="2">3asdasdsad</option>
                <option value="3">2asdasdsad</option>
                <option value="4">1asdasdsad</option>
            </select>
        </div>

        @csrf

        <button name="storeInfo" type="submit" class="btn btn-primary mb-3">Save</button>
    </form>


</div>
@endsection
