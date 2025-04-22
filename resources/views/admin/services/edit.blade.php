@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <div class="row m-0 p-0 justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
        </div>

        <a href="{{ url('admin/service') }}" class="btn btn-danger float-end">BACK</a>

        <div class="row justify-content-center">
            <div class="col-9">
                <div class="row justify-content-center text-center mt-3">
                    @foreach($service->service_logos as $logoo)
                        <div class="col">
                            <p> {{ $logoo->logo_title }} </p>

                            <img class="mx-5" src="{{asset('images/'.$logoo->logo)}}" width="20px"
                                 height="20px">

                            <p>
                            <form method="POST" action="{{ url('admin/service_logo/' . $logoo->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button onclick="return confirm(&quot;Confirm delete?&quot;)"
                                        style="border:none; background:none; padding:0;" type="submit"
                                        title="Delete">
                                    <i style="color: #000000" class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-center text-center mt-3">
                    @foreach($service->service_plans as $plan)
                        <div class="col">
                            <div><p>{{$plan->plan->title}}</p></div>
                            <img src="{{asset('images/'.$plan->plan->logo)}}" class="mb-3 mx-0" width="90px"
                                 height="60px">
                            <p>
                            <form method="POST" action="{{ url('admin/service_plan/' . $plan->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button onclick="return confirm(&quot;Confirm delete?&quot;)"
                                        style="border:none; background:none; padding:0;" type="submit"
                                        title="Delete">
                                    <i style="color: #000000" class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <form action="{{ url('admin/service/'.$service->id) }}" method="post" enctype="multipart/form-data">
            @method("PATCH")
            @csrf
            <input type="hidden" name="id" value="{{$service->id}}" id="id"/>

            <div class="row my-3 justify-content-center">

                <div class="col-9 mb-2">
                    <label for="title">Service Name</label>
                    <input type="text" class="form-control" placeholder="Enter Service name"
                           name="title" value="{{$service->title}}">
                    <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
                <div class="col-9 mb-2">
                    <label for="body">Service Description</label>
                    <input type="text" class="form-control" placeholder="Enter Service description"
                           name="body" value="{{$service->body}}">
                    <span class="text-danger">@error('body'){{$message}} @enderror</span>
                </div>
                <div class="col-9 mb-2">
                    <label for="image">Service Main Image</label>
                    <input type="file" class="form-control" placeholder="Enter Service main image"
                           name="image">
                    <span class="text-danger">@error('image'){{$message}} @enderror</span>
                </div>
                <div class="col-9 mb-2">

                    <table class="table table-bordered" id="dynamicEditAddServiceLogo">
                        <tr>
                            <th>Logo Title</th>
                            <th>Logo</th>
                        </tr>
                        @foreach($service->service_logos as $logoo)
                            <tr>
                                <td>
                                    <input value="{{$logoo->logo_title}}" type="text"
                                           name="logoFields[{{$logoo->id}}][title]"
                                           placeholder="Enter logo title" class="form-control"/>
                                </td>
                                <td>
                                    <input type="file" name="logoFields[{{$logoo->id}}][logo]"
                                           placeholder="Enter logo"
                                           class="form-control"/></td>
                            </tr>
                        @endforeach

                        <tr>
                            <td><input type="text" name="editLogoFields[][title]" placeholder="Enter logo title"
                                       class="form-control"/></td>
                            <td><input type="file" name="editLogoFields[][logo]" placeholder="Enter logo"
                                       class="form-control"/></td>
                            <td>
                                <button type="button" name="add" id="add-btn-more-dynamicEditAddServiceLogo" class="btn btn-success">
                                    Add More
                                </button>
                            </td>
                        </tr>
                    </table>
                    <p><span
                            class="text-danger">@error('logoFields.*.title'){{'the title field is required'}}@enderror</span>
                    </p>
                    <p><span
                            class="text-danger">@error('logoFields.*.logo'){{'the logo field is required and must be [ jpg, png, jpeg, svg ] with max:5048 kb'}}@enderror</span>
                    </p>
                    <p><span
                            class="text-danger">@error('editLogoFields.*.title'){{'the title field is required'}}@enderror</span>
                    </p>
                    <p><span
                            class="text-danger">@error('editLogoFields.*.logo'){{'the logo field is required and must be [ jpg, png, jpeg, svg ] with max:5048 kb'}}@enderror</span>
                    </p>
                </div>
                <div class="col-9 mb-2">
                    <table class="table table-bordered" id="dynamicEditAddServicePlan">
                        <tr>
                            <th>Service Plan</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="moreFields[]" class="form-control">
                                    <option value="">please select your plan</option>
                                    @foreach($plans as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" name="add" id="add-btn-more-dynamicEditAddServicePlan"
                                        class="btn btn-success">Add
                                    More
                                </button>
                            </td>
                        </tr>
                    </table>
                    <span
                        class="text-danger">@error('moreFields'){{'at least 1 Plan is Required'}}@enderror</span>
                    <span
                        class="text-danger">@error('moreFields.*'){{'at least 1 Plan is Required'}}@enderror</span>
                </div>
            </div>
            <div class="row pb-4 m-0 justify-content-center">
                <div>
                    <button value="Update" class="btn btn-success px-5" type="submit">update</button>
                </div>
            </div>
        </form>
    </div>
@stop




@push('scripts')
    <script type="text/javascript">
        var i = 0;
        $("#add-btn-more-dynamicEditAddServicePlan").click(function () {
            ++i;
            $("#dynamicEditAddServicePlan").append('<tr><td><select name="moreFields[' + i + ']" class="form-control"> <option value="">please select your plan</option>@foreach($plans as $item)<option value="{{$item->id}}">{{$item->title}}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger remove-tr-dynamicEditRemoveServicePlan">Remove</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-dynamicEditRemoveServicePlan', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#add-btn-more-dynamicEditAddServiceLogo").click(function () {
            ++i;
            $("#dynamicEditAddServiceLogo").append('<tr><td><input type="text" name="editLogoFields[' + i + '][title]" placeholder="Enter logo title" class="form-control" /></td><td><input type="file" name="editLogoFields[' + i + '][logo]" placeholder="Enter logo" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr-dynamicEditRemoveServiceLogo">Remove</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-dynamicEditRemoveServiceLogo', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
