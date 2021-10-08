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

            @foreach($components as $key=>$component)
                <tr>
                    <td>{{$title[$key]}}</td>                                                <!--Name -->
                    <td>
                        <form action="{{route('products.'.$component)}}" method="post" class="d-inline">             <!--Button -->
                            @csrf
                            <input type="submit" name="selectedComponent" value="{{session($component.'.name','+')}}" class=" btn btn-info col-10">
                        </form>

                        <form method="post" action="{{route('control')}}"
                              @if(!session()->has($component.'.name'))
                              class="d-none"
                              @else
                              class="d-inline"
                            @endif
                        >
                            <input type="hidden" name="unsetSelected" value="{{$component}}">
                            @csrf
                            <button type="submit" class="btn btn-info bg-danger">x</button>
                        </form>
                    </td>
                    <td class="text-center">
                        @if(session()->has($component.'.price'))
                            ₱ {{ number_format(session($component.'.price'),2) }}
                        @else
                            ---
                        @endif
                    </td>
                    <td class="text-center">
                        <form name="ownedComponent">                                          <!--  Checkbox -->
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox"
                                           id="ownedComponent"
                                           value="motherboards"
                                           name="ownedComponentMotherboard"
                                           @if(session()->has($component.'.name'))
                                           @if(session($component.'.owned') == "1")
                                           checked
                                           @endif
                                           @else
                                           disabled
                                           @endif
                                           class="form-check-input">
                                </label>
                            </div>
                        </form>
                    </td>
                    <td>
                        @if( session()->has('buildInfo'))
                            <form method="post" action="{{route('control')}}">
                                <input type="hidden" name="orderComponents" value="{{$component}}">
                                @csrf
                                <button type="submit" class="btn btn-info col-10"
                                        @if(session($component.'.owned') == "1" or !session()->has($component.'.name'))
                                        disabled
                                        @endif
                                        name="orderComponent">Order</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach


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
{{--                           value="{{old('buildName')}}"--}}
                           value="{{old('buildName') ?? session('buildInfo.build_name','')}}"
                           required >
                    @error('buildName')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                    <label class="" for="form-label"> Description: </label>
                    <input class="form-control  @error('buildDescription') is-invalid @enderror" style="width: 100%;" type="text"  name="buildDescription"
{{--                           value="{{old('buildDescription')}}" --}}
                            value="{{old('buildDescription') ?? session('buildInfo.build_description','')}}"
                    >
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

