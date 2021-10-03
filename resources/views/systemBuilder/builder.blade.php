@extends('layouts.master')
@section('content')

    @auth()
        @include('layouts.subheader')
    @endauth

<style>
    tr {
        width: 100%;
        height:80px;
    }

</style>

    <div class="container-xl  ">
        <table class="table table-hover align-middle">
            <thead>
            <tr>
                <th class="text-center" width="15%">Components</th>
                <th class="text-center" width="40%">Selection</th>
                <th class="text-center" width="10%">Price</th>
                <th class="text-center" width="10%">Owned</th>
                <th class="text-center" width="15%"></th>
            </tr>
            </thead>
            <tbody>
            <!--MOTHERBOARD-->
            <tr>
                <td>Motherboard</td>
                <td>                                                                     <!-- Motherboards Button -->
                    <form action="{{route('components')}}" method="post">
                        <input type="hidden" name="selectedComponents" value="motherboards">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('motherboards.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                    @if(session()->has('motherboards.price'))
                        ₱ {{ number_format(session('motherboards.price'),2) }}
                    @else
                        ---
                    @endif
                   </td>
                <td class="text-center">
                    <form name="ownedComponent">                                          <!-- Motherboards Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="motherboards"
                                       name="ownedComponentMotherboard"
                                       @if(session()->has('motherboards.name'))
                                            @if(session('motherboards.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                <!-- Motherboards Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="motherboards">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('motherboards.owned') == "1" or !session()->has('motherboards.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--CPU-->
            <tr>
                <td>CPU</td>
                <td>
                    <form action="{{route('components')}}" method="post">                                       <!-- CPU Button -->
                        <input type="hidden" name="selectedComponents" value="cpus">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('cpus.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('cpus.price'))
                                             ₱ {{ number_format(session('cpus.price'),2) }}
                                        @else
                                            ---
                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent">                                                    <!-- CPU Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="cpus"
                                       name="ownedComponentCpu"
                                       @if(session()->has('cpus.name'))
                                            @if(session('cpus.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                        <!-- CPU Order Button -->
                    <form method="post"  action="{{route('control')}}" >
                        <input type="hidden" name="orderComponents" value="cpus">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('cpus.owned') == "1" or !session()->has('cpus.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--CPU COOLER-->
            <tr>
                <td>CPU Cooler</td>
                <td>
                    <form action="{{route('components')}}" method="post">                               <!-- CPU Cooler  Button -->
                        <input type="hidden" name="selectedComponents" value="cpu_coolers">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('cpu_coolers.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('cpu_coolers.price'))
                                           ₱ {{ number_format(session('cpu_coolers.price'),2) }}
                                        @else
                                            ---
                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent">                                            <!-- CPU Cooler Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="cpu_coolers"
                                       name="ownedComponentCpuCooler"
                                       @if(session()->has('cpu_coolers.name'))
                                            @if(session('cpu_coolers.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                    <!-- CPU cooler Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="cpu_coolers">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('cpu_coolers.owned') == "1" or !session()->has('cpu_coolers.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--GRAPHICS CARD-->
            <tr>
                <td>Graphics Card</td>
                <td>
                    <form action="{{route('components')}}" method="post">                             <!-- Graphics Card Button -->
                        <input type="hidden" name="selectedComponents" value="graphics_cards">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('graphics_cards.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('graphics_cards.price'))
                                            ₱ {{ number_format(session('graphics_cards.price'),2) }}
                                        @else
                                            ---
                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">                          <!-- Graphics Card Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="graphics_cards"
                                       name="ownedComponentGpu"
                                       @if(session()->has('graphics_cards.name'))
                                            @if(session('graphics_cards.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                <!-- Graphics card Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="graphics_cards">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('graphics_cards.owned') == "1" or !session()->has('graphics_cards.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--RAM-->
            <tr>
                <td>RAM</td>
                <td>
                    <form action="{{route('components')}}" method="post">                                       <!-- RAMS Button -->
                        <input type="hidden" name="selectedComponents" value="rams">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('rams.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('rams.price'))
                                            ₱ {{ number_format(session('rams.price'),2) }}
                                        @else
                                            ---
                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent" >                                                   <!-- RAMS Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="rams"
                                       name="ownedComponentRam"
                                       @if(session()->has('rams.name'))
                                            @if(session('rams.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                         <!-- RAM Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="rams">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('rams.owned') == "1" or !session()->has('rams.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--STORAGE-->
            <tr>
                <td>Storage</td>
                <td>
                    <form action="{{route('components')}}" method="post">                                   <!-- Storages Button -->
                        <input type="hidden" name="selectedComponents" value="storages">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('storages.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('storages.price'))
                                            ₱ {{ number_format(session('storages.price'),2) }}
                                         @else
                                            ---
                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent">                                             <!-- Storages Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="storages"
                                       name="ownedComponentStorage"
                                       @if(session()->has('storages.name'))
                                            @if(session('storages.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                      <!-- Storages Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="storages">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('storages.owned') == "1" or !session()->has('storages.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--PSU-->
            <tr>
                <td>Power Supply</td>
                <td>
                    <form action="{{route('components')}}" method="post">                                       <!-- PSUS Button -->
                        <input type="hidden" name="selectedComponents" value="psus">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('psus.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('psus.price'))
                                            ₱ {{ number_format(session('psus.price'),2) }}
                                        @else
                                            ---

                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent">                                                <!-- PSUS Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="psus"
                                       name="ownedComponentPowerSupply"
                                       @if(session()->has('psus.name'))
                                            @if(session('psus.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                        <!-- PSU Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="psus">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('psus.owned') == "1" or !session()->has('psus.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--COMPUTER CASE-->
            <tr>
                <td>Computer Case</td>
                <td>
                    <form action="{{route('components')}}" method="post">                            <!-- Computer Cases Button -->
                        <input type="hidden" name="selectedComponents" value="computer_cases">
                        @csrf
                        <input type="submit" name="selectedComponent" value="{{session('computer_cases.name','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">
                                        @if(session()->has('computer_cases.price'))
                                            ₱ {{ number_format(session('computer_cases.price'),2) }}
                                        @else
                                            ---
                                        @endif
                </td>
                <td class="text-center">
                    <form name="ownedComponent" >                                       <!-- Computer Cases Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="computer_cases"
                                       name="ownedComponentComputerCase"
                                           @if(session()->has('computer_cases.name'))
                                            @if(session('computer_cases.owned') == "1")
                                                checked
                                            @endif
                                       @else
                                            disabled
                                       @endif

                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                 <!-- Computer Case Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="computer_cases">
                        @csrf
                        <button type="submit" class="btn btn-info col-12"
                                @if(session('computer_cases.owned') == "1" or !session()->has('computer_cases.name'))
                                    disabled
                                @endif
                                name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!-- TOTAL PRICE -->
            <tr>

            </tr>
            </tbody>
        </table>


        @auth
            <!--Name and Save-->
            <div class="mb-3">
                <form class="form-inline" action="{{route('control')}}" method="post" >
                    @csrf
                    <div class="mb-3">
                    <label class="" for="form-label" > Build Name: </label>
                    <input class="form-control @error('buildName') is-invalid @enderror" style="width: 100%;"  type="text"  name="buildName"
                           value="{{old('buildName')}}"
                           required >
                    @error('buildName')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                    <label class="" for="form-label"> Description: </label>
                    <input class="form-control  @error('buildDescription') is-invalid @enderror" style="width: 100%;" type="text"  name="buildDescription"
                           value="{{old('buildDescription')}}" >
                    @error('buildDescription')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                    <button class="d-inline btn btn-info btn-block" type="submit" name="saveButton"  >Save Build</button>
                    </div>
                </form>


            </div>
        @endauth

    </div>


<script>
    let checkArray = new Array();
    let holder;
    let _token   = $('meta[name="csrf-token"]').attr('content');
    function countCheck(){
        checkArray=[];
        $('input[type=checkbox]').each(function (){
            $(this).is(':checked') ? checkArray.push("1") : checkArray.push("0");
        });
        holder=checkArray.join();
        //console.log(holder);

        $.ajax({
            type:'POST',
            url:"{{route('control')}}",
            data:{
                hold:holder,
                _token: _token
            },
            success:function (data){
                console.log(holder);
                console.log(data.success);
            },
        })
        location.reload();


    }
    $("input[type=checkbox]").on("click",countCheck);
</script>
@endsection

