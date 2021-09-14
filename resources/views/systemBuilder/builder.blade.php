@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@extends('layouts.master')
@section('content')
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
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="motherboards">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('motherboards','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('motherboardsPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent">                                          <!-- Motherboards Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="motherboards"
                                       {{session('motherboardsOwned',' ')}}
                                       name="ownedComponentMotherboard"
                                       {{session('motherboardsCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                <!-- Motherboards Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="motherboards">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('motherboardsOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--CPU-->
            <tr>
                <td>CPU</td>
                <td>
                    <form action="/components" method="post">                                       <!-- CPU Button -->
                        <input type="hidden" name="selectedComponents" value="cpus">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('cpus','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('cpusPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent">                                                    <!-- CPU Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       {{session('cpusOwned',' ')}}
                                       value="cpus"
                                       name="ownedComponentCpu"
                                       {{session('cpusCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                        <!-- CPU Order Button -->
                    <form method="post"  action="{{route('control')}}" >
                        <input type="hidden" name="orderComponents" value="cpus">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('cpusOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--CPU COOLER-->
            <tr>
                <td>CPU Cooler</td>
                <td>
                    <form action="/components" method="post">                               <!-- CPU Cooler  Button -->
                        <input type="hidden" name="selectedComponents" value="cpu_coolers">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('cpu_coolers','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('cpu_coolersPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent">                                            <!-- CPU Cooler Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       value="cpu_coolers"
                                       {{session('cpu_coolersOwned',' ')}}
                                       name="ownedComponentCpuCooler"
                                       {{session('cpu_coolersCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                    <!-- CPU cooler Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="cpu_coolers">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('cpu_coolersOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--GRAPHICS CARD-->
            <tr>
                <td>Graphics Card</td>
                <td>
                    <form action="/components" method="post">                             <!-- Graphics Card Button -->
                        <input type="hidden" name="selectedComponents" value="graphics_cards">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('graphics_cards','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('graphics_cardsPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">                          <!-- Graphics Card Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       {{session('graphics_cardsOwned',' ')}}
                                       value="graphics_cards"
                                       name="ownedComponentGpu"
                                       {{session('graphics_cardsCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                <!-- Graphics card Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="graphics_cards">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('graphics_cardsOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--RAM-->
            <tr>
                <td>RAM</td>
                <td>
                    <form action="/components" method="post">                                       <!-- RAMS Button -->
                        <input type="hidden" name="selectedComponents" value="rams">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('rams','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('ramsPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" >                                                   <!-- RAMS Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       {{session('ramsOwned',' ')}}
                                       value="rams"
                                       name="ownedComponentRam"
                                       {{session('ramsCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                         <!-- RAM Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="rams">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('ramsOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--STORAGE-->
            <tr>
                <td>Storage</td>
                <td>
                    <form action="/components" method="post">                                   <!-- Storages Button -->
                        <input type="hidden" name="selectedComponents" value="storages">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('storages','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('storagesPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent">                                             <!-- Storages Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       {{session('storagesOwned',' ')}}
                                       value="storages"
                                       name="ownedComponentStorage"
                                       {{session('storagesCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                      <!-- Storages Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="storages">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('storagesOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--PSU-->
            <tr>
                <td>Power Supply</td>
                <td>
                    <form action="/components" method="post">                                       <!-- PSUS Button -->
                        <input type="hidden" name="selectedComponents" value="psus">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('psus','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('psusPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent">                                                <!-- PSUS Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       {{session('psusOwned',' ')}}
                                       value="psus"
                                       name="ownedComponentPowerSupply"
                                       {{session('psusCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                        <!-- PSU Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="psus">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('psusOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
            <!--COMPUTER CASE-->
            <tr>
                <td>Computer Case</td>
                <td>
                    <form action="/components" method="post">                            <!-- Computer Cases Button -->
                        <input type="hidden" name="selectedComponents" value="computer_cases">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('computer_cases','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('computer_casesPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" >                                       <!-- Computer Cases Checkbox -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"
                                       id="ownedComponent"
                                       {{session('computer_casesOwned',' ')}}
                                       value="computer_cases"
                                       name="ownedComponentComputerCase"
                                       {{session('computer_casesCheckBox','disabled')}}
                                       class="form-check-input"
                                >
                            </label>
                        </div>
                    </form>
                </td>
                <td>                                                                 <!-- Computer Case Order Button -->
                    <form method="post" action="{{route('control')}}">
                        <input type="hidden" name="orderComponents" value="computer_cases">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-info col-12" {{session('computer_casesOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
                @if (session('alert'))
                    <tr>
                    <td colspan="5">
                        <div class="alert alert-danger" role="alert">
                            Please Enter a Build Name
                        </div>
                    </td>
                    </tr>
                @endif
            <!--Name and Save-->
            <tr {{session('saveForm','style=display:none;')}}>
                <form class="form-inline" action="{{route('control')}}" method="post" >
                    <td style="text-align:right;">
                        {{csrf_field()}}
                        <label for="form-label"> Build Name: </label></td>
                    <td colspan="2">

                        <input type="text" class="form-control {{session('alert', ' ' )}} " {{session('saveForm','disabled')}} name="buildName" required>
                    </td>
                    <td><button type="submit" name="saveButton" {{session('saveForm','disabled')}} class="btn btn-info btn-block ">Save Build</button></td>
                </form>
                <td></td>
            </tr>

            </tbody>
        </table>
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
                //console.log(data.success);
            }
        })
        location.reload();
    }
    $("input[type=checkbox]").on("click",countCheck);
</script>
@endsection

