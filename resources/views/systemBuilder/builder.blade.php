@extends('layouts.app')
@section('content')

<div class="container-sm p-3 my-3">
    <table class="table table-hover">
        <thead>
            <tr >
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
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="motherboards">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('motherboards','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('motherboardsPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedMotherboard" value="">
                                <input type="checkbox" id="ownedComponentMotherboard" name="ownedComponentMotherboard" {{session('motherboardsCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentMotherboard">
                        <button type="submit" class="btn btn-info col-12" {{session('motherboardsOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--CPU-->
            <tr>
                <td>CPU</td>
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="cpus">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('cpus','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('cpusPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedCpu" value="">
                                <input type="checkbox" id="ownedComponentCpu" name="ownedComponentCpu" {{session('cpusCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentCpu">
                        <button type="submit" class="btn btn-info col-12" {{session('cpusOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--CPU COOLER-->
            <tr>
                <td>CPU Cooler</td>
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="cpu_coolers">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('cpu_coolers','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('cpu_coolersPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedCpuCooler" value="">
                                <input type="checkbox" id="ownedComponentCpuCooler" name="ownedComponentCpuCooler" {{session('cpu_coolersCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentCpuCooler">
                        <button type="submit" class="btn btn-info col-12" {{session('cpu_coolersOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--GRAPHICS CARD-->
            <tr>
                <td>Graphics Card</td>
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="graphics_cards">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('graphics_cards','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('graphics_cardsPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedGpu" value="">
                                <input type="checkbox" id="ownedComponentGpu" name="ownedComponentGpu" {{session('graphics_cardsCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentGpu">
                        <button type="submit" class="btn btn-info col-12" {{session('graphics_cardsOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--RAM-->
            <tr>
                <td>RAM</td>
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="rams">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('rams','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('ramsPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedRam" value="">
                                <input type="checkbox" id="ownedComponentRam" name="ownedComponentRam" {{session('ramsCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentRam">
                        <button type="submit" class="btn btn-info col-12" {{session('ramsOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--STORAGE-->
            <tr>
                <td>Storage</td>
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="storages">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('storages','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('storagesPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedStorage" value="">
                                <input type="checkbox" id="ownedComponentStorage" name="ownedComponentStorage" {{session('storagesCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentStorage">
                        <button type="submit" class="btn btn-info col-12" {{session('storagesOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--PSU-->
            <tr>
                <td>Power Supply</td>
                <td>
                    <form action="/components" method="post">
                        <input type="hidden" name="selectedComponents" value="psus">
                        {{csrf_field()}}
                        <input type="submit" name="selectedComponent" value="{{session('psus','+')}}" class="btn btn-info col-12">
                    </form>
                </td>
                <td class="text-center">{{session('psusPrice','--')}}</td>
                <td class="text-center">
                    <form name="ownedComponent" method="post">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" name="ownedPowerSupply" value="">
                                <input type="checkbox" id="ownedComponentPowerSupply" name="ownedComponentPowerSupply" {{session('psusCheckBox','disabled')}} class="form-check-input">Owned
                            </label>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="orderComponentPowerSupply">
                        <button type="submit" class="btn btn-info col-12" {{session('psusOrder','disabled')}} name="orderComponent">Order</button>
                    </form>
                </td>
            </tr>
        <!--COMPUTER CASE-->
        <tr>
            <td>Computer Case</td>
            <td>
                <form action="/components" method="post">
                    <input type="hidden" name="selectedComponents" value="computer_cases">
                    {{csrf_field()}}
                    <input type="submit" name="selectedComponent" value="{{session('computer_cases','+')}}" class="btn btn-info col-12">
                </form>
            </td>
            <td class="text-center">{{session('computer_casesPrice','--')}}</td>
            <td class="text-center">
                <form name="ownedComponent" method="post">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" name="ownedComputerCase" value="">
                            <input type="checkbox" id="ownedComponentComputerCase" name="ownedComponentComputerCase" {{session('computer_casesCheckBox','disabled')}} class="form-check-input">Owned
                        </label>
                    </div>
                </form>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="orderComponentComputerCase">
                    <button type="submit" class="btn btn-info col-12" {{session('computer_casesOrder','disabled')}} name="orderComponent">Order</button>
                </form>
            </td>
        </tr>
        <!--Name and Save-->
        <tr>
            <form class="form-inline" action="" method="post">
                <td style="text-align:right">
                    <label for="form-label"> Build Name: </label></td>
                <td colspan="2">
                    <input type="text" class="form-control" id="buildName" name="buildName">
                </td>
                <td><button type="submit" name="saveButton" class="btn btn-info btn-block ">Save Build</button></td>
            </form>
            <td></td>

        </tr>
        </tbody>
    </table>

</div>
@endsection
