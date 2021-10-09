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

    <div class="container-xl">

        <table class="table table-hover align-middle">
            <thead>
            <tr>
                <th class="text-center" width="15%">Components</th>
                <th class="text-center" width="40%">Selection</th>
                <th class="text-center" width="10%">Price</th>
                <th class="text-center" width="10%">Owned</th>
                @if( session()->has('buildInfo'))
                    <th class="text-center" width="15%"></th>
                @endif

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


                        @if( isset($validateComponents) && $validateComponents[$key] ==1  )
                        <div>
                            <p class="text-danger text-center fw-bold col-10">Please Choose a {{$title[$key]}}</p>
                        </div>
                        @endif


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

                    @if( session()->has('buildInfo'))
                        <td>
                            <form method="post" action="{{route('control')}}">
                                <input type="hidden" name="orderComponents" value="{{$component}}">
                                @csrf
                                <button type="submit" class="btn btn-info col-10"
                                        @if(session($component.'.owned') == "1" or !session()->has($component.'.name'))
                                        disabled
                                        @endif
                                        name="orderComponent">Order</button>
                            </form>
                        </td>
                     @endif
                </tr>
            @endforeach


            </tbody>
        </table>


        @auth
            <!--Name and Save-->
            <div class="mb-3 form-inline">
                <form class="form-inline" action="{{route('control')}}" method="post" >
                    @csrf
                    <div class="mb-3">
                    <label class="" for="form-label" > Build Name: </label>
                    <input class="form-control @error('buildName') is-invalid @enderror" style="width: 100%;"  type="text"  name="buildName"
                           value="{{old('buildName') ?? session('buildInfo.build_name','')}}"
                           required >
                    @error('buildName')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="" for="form-label"> Description: </label>
                        <div>
                            <textarea class="form-control  @error('buildDescription') is-invalid @enderror"  rows="5" name="buildDescription">
                                {{old('buildDescription') ?? session('buildInfo.build_description','')}}
                            </textarea>
                        </div>
                        @error('buildDescription')
                        <p class="text-danger text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <button class="d-inline btn btn-info btn-block" type="submit" name="saveButton"  >
                        {{ session()->has('buildInfo') ? 'Update Build' : 'Save Build'}}
                        </button>
                    </div>
                </form>
            </div>

{{--            fix the placing of this--}}
            <div class="float-end">
                <form  action="#" method="post">
                    <button class="d-inline btn btn-info btn-block bg-danger " type="submit" name="saveButton"  >Clear Selection</button>
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

