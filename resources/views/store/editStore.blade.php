@section('head')
@endsection
@extends('layouts.master')
@section('content')
    @auth()
        @include('layouts.subheader')
    @endauth
<div class="container-sm mt-4 " style="width: 70%;" >


    <form  class="mb-4"  method="post" action="{{route('saveInfo')}}" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="storeBanner" class="form-label">Store Image Banner</label>
            <input class="form-control @error('storeBanner') is-invalid @enderror" type="file"
                   id="storeBanner" name="storeBanner">
            @error('storeBanner')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="storeName" class="form-label">Store Name</label>
            <input type="text" class="form-control @error('storeName') is-invalid @enderror" id="storeName" name="storeName" value="{{ old('storeName') ?? session('storeInfo.storeName')}}">
            @error('storeName')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="storeAddress" class="form-label">Store Address</label>
            <input type="text" class="form-control @error('storeAddress') is-invalid @enderror" id="storeAddress" name="storeAddress" value="{{old('storeAddress') ??session('storeInfo.storeAddress') }}">
            @error('storeAddress')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="storeLocation" class="form-label">Store Google Map Location</label>
            <input type="text" class="form-control @error('storeLocation') is-invalid @enderror" id="storeLocation" name="storeLocation" value="{{old('storeLocation') ?? session('storeInfo.storeLocation')}}">
            @error('storeLocation')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div id="storeLocationHelp" class="form-text"> To enter the correct Location:
                <ul>
                    <li>Go to <a href = "https://www.google.com/maps/">https://www.google.com/maps/</a></li>
                    <li>Input Your Store Address</li>
                    <li>Click Share and choose the "Embed a map" tab</li>
                    <li>Copy ONLY the text inside src=""</li>
                </ul>
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="control-label " for="storeDescription">Store Description</label>
            <div class="col-sm-12">
                <textarea class="form-control @error('storeDescription') is-invalid @enderror" rows="5" id="storeDescription"
                          name="storeDescription">{{old('storeDescription') ?? session('storeInfo.storeDescription') }}</textarea>
            </div>
            @error('storeDescription')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>



        Choose A Component to Feature:

        <div class="mt-3 mb-2">
            <label class="control-label col-sm-2" for="motherboards">MotherBoard:</label>
            <select name="motherboards" id="motherboards" style="width: 80%;">
                <option value="{{ old('motherboards') ?? session('storeInfo.featured_motherboards')}}">
                        {{session('productsArray.motherboards.0.name','------')}}
                </option>
                @foreach($productArray["motherboards"]  as $motherboard)
                    @if(session('storeInfo.featured_motherboards') ==$motherboard['component_id'] )
                        @continue
                    @else
                    <option value="{{$motherboard['component_id']}}">{{$motherboard['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="cpus">CPU:</label>
            <select name="cpus" id="cpus" style="width: 80%;"> Select A CPU to Feature
                <option value="{{ old('cpus') ?? session('storeInfo.featured_cpus')}}">
                            {{session('productsArray.cpus.0.name','------')}}
                </option>
                @foreach($productArray["cpus"]  as $cpu)
                    @if(session('storeInfo.featured_cpus') == $cpu['component_id'] )
                        @continue
                    @else
                    <option value="{{$cpu['component_id']}}">{{$cpu['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="cpu_coolers">CPU Cooler:</label>
            <select name="cpu_coolers" id="cpu_coolers" style="width: 80%;"> Select A CPU Cooler to Feature
                <option value="{{ old('cpu_coolers') ?? session('storeInfo.featured_cpu_coolers')}}">
                    {{session('productsArray.cpu_coolers.0.name','------')}}
                </option>
                @foreach($productArray["cpu_coolers"]  as $cpu_cooler)
                    @if(session('storeInfo.featured_cpu_coolers') == $cpu_cooler['component_id'])
                        @continue
                    @else
                    <option value="{{$cpu_cooler['component_id']}}">{{$cpu_cooler['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="graphics_cards">Graphics Card:</label>
            <select name="graphics_cards" id="graphics_cards" style="width: 80%;"> Select A Graphics Card to Feature
                <option value="{{ old('graphics_cards') ?? session('storeInfo.featured_graphics_cards')}}">
                    {{session('productsArray.graphics_cards.0.name','------')}}
                </option>
                @foreach($productArray["graphics_cards"]  as $graphics_card)
                    @if(session('storeInfo.featured_graphics_cards')== $graphics_card['component_id'])
                        @continue
                    @else
                    <option value="{{$graphics_card['component_id']}}">{{$graphics_card['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="rams">RAM:</label>
            <select name="rams" id="rams" style="width: 80%;"> Select A RAM to Feature
                <option value="{{ old('rams') ?? session('storeInfo.featured_rams')}}">
                    {{session('productsArray.rams.0.name','------')}}
                </option>
                @foreach($productArray["rams"]  as $ram)
                    @if(session('storeInfo.featured_rams') == $ram['component_id'])
                        @continue
                    @else
                    <option value="{{$ram['component_id']}}">{{$ram['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="storages">Storage:</label>
            <select name="storages" id="storages" style="width: 80%;">Select A Storage to Feature
                <option value="{{ old('storages') ?? session('storeInfo.featured_storages')}}">
                    {{session('productsArray.storages.0.name','------')}}
                </option>
                @foreach($productArray["storages"]  as $storage)
                    @if(session('storeInfo.featured_storages') ==$storage['component_id'] )
                        @continue
                    @else
                    <option value="{{$storage['component_id']}}">{{$storage['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="psus">Power Supply:</label>
            <select name="psus" id="psus" style="width: 80%;"> Select A Power Supply to Feature
                <option value="{{ old('psus') ?? session('storeInfo.featured_psus')}}">
                    {{session('productsArray.psus.0.name','------')}}
                </option>
                @foreach($productArray["psus"]  as $psu)
                    @if(session('storeInfo.featured_psus') == $psu['component_id'] )
                        @continue
                    @else
                    <option value="{{$psu['component_id']}}">{{$psu['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mt-4 mb-2">
            <label class="control-label col-sm-2" for="computer_cases">Computer Case:</label>
            <select name="computer_cases" id="computer_cases" style="width: 80%;">
                <option value="{{ old('computer_cases') ?? session('storeInfo.featured_computer_cases')}}">
                    {{session('productsArray.computer_cases.0.name','------')}}
                </option>
                @foreach($productArray["computer_cases"]  as $computer_case)
                    @if(session('storeInfo.featured_computer_cases')== $computer_case['component_id'])
                        @continue
                    @else
                    <option value="{{$computer_case['component_id']}}">{{$computer_case['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        @csrf

        <button name="storeInfo" type="submit" class="btn btn-primary mb-3">Save</button>
    </form>


</div>
@endsection
