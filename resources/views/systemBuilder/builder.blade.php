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
                @if( session()->has('buildInfo') && isset($is_view))
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
                            <input @if(isset($is_view) ) disabled @endif
                                   {{isset($componentStatus)?  $componentStatus[$key]!='Available'? 'disabled' :' ' : ' '  }}
                            type="submit" name="selectedComponent" value="{{session($component.'.name','+')}}" class=" btn btn-info col-10">
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
                            <button @if(isset($is_view)) disabled @endif
                            {{isset($componentStatus)?  $componentStatus[$key]!='Available'? 'disabled' :' ' :' '  }}
                            type="submit" class="btn btn-info bg-danger">x</button>
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
                                    <input @if(isset($is_view)) disabled @endif
                                    {{isset($componentStatus)?  $componentStatus[$key]!='Available'? 'disabled' :' ' :' '  }}
                                            type="checkbox"
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

                    @if( session()->has('buildInfo') && isset($is_view))                               <!-- ORDER -->
                        <td>
                            @if(!isset($componentStatus) || $componentStatus[$key]=='Available')
                                <button type="button"   class="btn btn-info col-10"  data-bs-toggle="modal"
                                        data-bs-target="#order_{{ $component }}"
                                        @if(session($component.'.owned') == "1" or !session()->has($component.'.name'))
                                        disabled
                                    @endif>
                                    Order
                                </button>
                            @else
                                @if($componentStatus[$key] == 'Ordered')
                                    <button type="button"  disabled
                                            class="btn btn-secondary col-10"
                                            data-bs-toggle="modal"
                                            data-bs-target="#order_{{ $component }}">
                                        Ordered
                                    </button>

                                @elseif($componentStatus[$key] == 'Confirmed')
                                    <button type="button"  disabled
                                            class="btn btn-success col-10"
                                            disabled
                                            data-bs-toggle="modal"
                                            data-bs-target="#order_{{ $component }}">
                                        Confirmed
                                    </button>
                                @elseif($componentStatus[$key] == 'Sold Out')
                                    <button type="button"  disabled
                                            class="btn btn-warning col-10"
                                            disabled
                                            data-bs-toggle="modal"
                                            data-bs-target="#order_{{ $component }}">
                                        Sold Out
                                    </button>

                                @endif
                            @endif
                        </td>

                <!-- Order Component -->
                <div class="modal fade"
                     id="order_{{ $component }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="order_{{ $component }}">
                                    Order Component</h5>
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                Order  {{ session($component.'.name') }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel
                                </button>
                                <form
                                    action="{{route('control')}}"
                                    method="post">
                                    <input type="hidden" name="orderComponents" value="{{$component}}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Order
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <input @if(isset($is_view)) disabled @endif class="form-control @error('buildName') is-invalid @enderror" style="width: 100%;"  type="text"  name="buildName"
                           value="{{old('buildName') ?? session('buildInfo.build_name','')}}"
                           required >
                    @error('buildName')
                    <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label class="" for="form-label"> Description: </label>
                        <div>
                            <textarea @if(isset($is_view)) disabled @endif class="form-control  @error('buildDescription') is-invalid @enderror"  rows="5" name="buildDescription"
                            >{{old('buildDescription') ?? session('buildInfo.build_description','')}}</textarea>
                        </div>
                        @error('buildDescription')
                        <p class="text-danger text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <button @if(isset($is_view)) style="visibility: hidden;" @endif class="d-inline btn custom-btn btn-block" type="submit" name="saveButton"  >
                        {{ session()->has('buildInfo') ? 'Update Build' : 'Save Build'}}
                        </button>
                    </div>
                </form>
            </div>
        @endauth
        {{--            fix the placing of this--}}
        <div class="">
            <form  action="{{route('control')}}" method="post">
                @csrf
                <input type="hidden" name="clearSelection" value="clearSelection">
                <button class="d-inline btn btn-info btn-block bg-danger text-white" name="clearSelection" type="submit"   >Clear Selection</button>
            </form>
        </div>


        <div class="modal fade"
             id="ordered_product" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="ordered_product">
                            Product Unavailable</h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        {{session('unavailable', ' ').' UNAVAILABLE! PLease Select Another Product to order.'}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">OK
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modals -->
    @if(!empty(session('unavailable')) || session()->has('unavailable'))
        <script>
            $(document).ready(function () {
                $('#ordered_product').modal('show');
            });
        </script>
    @endif

    @if(session()->has('alert_message'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-custom-pos",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
            };
            toastr.success("{{ \Illuminate\Support\Facades\Session::get('alert_message') }}")
        </script>

    @endif


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

@section('title','Builder')
