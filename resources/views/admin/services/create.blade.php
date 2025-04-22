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
        <div class="col-12 p-0 ">
            <form action="{{ url('admin/service') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">

                    <div class="col-9 mb-2">
                        <label for="title">Service Name</label>
                        <input type="text" class="form-control" placeholder="Enter service Name"
                               name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <label for="body">Service Description</label>
                        <input type="text" class="form-control" placeholder="Enter service description"
                               name="body" value="{{old('body')}}">
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <label for="image">Service Main Image</label>
                        <input type="file" class="form-control" placeholder="Enter location main image"
                               name="image" value="{{old('image')}}">
                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <table class="table table-bordered" id="dynamicCreateAddServiceLogo">
                            <tr>
                                <th>Logo Title</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="logoFields[][title]" placeholder="Enter logo title"
                                           class="form-control"/></td>
                                <td><input type="file" name="logoFields[][logo]" placeholder="Enter logo"
                                           class="form-control"/></td>
                                <td>
                                    <button type="button" name="add" id="add-btn-dynamicCreateAddServiceLogo" class="btn btn-success">Add More
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
                    </div>

                    <div class="col-9 mb-2">
                        <table class="table table-bordered" id="dynamicCreateAddServicePlan">
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
                                    </select></td>
                                <td class="text-center">
                                    <button type="button" name="add" id="add-btn-dynamicCreateAddServicePlan" class="btn btn-success">Add
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
                <div class="row pb-3 m-0 justify-content-center">
                    <div>
                        <button class="px-5 btn btn-success" value="Save" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop



@push('scripts')
    <script>
        var i = 0;
        $("#add-btn-dynamicCreateAddServicePlan").click(function () {
            ++i;
            $("#dynamicCreateAddServicePlan").append('<tr><td><select name="moreFields[' + i + ']" class="form-control"> <option value="">please select your plan</option>@foreach($plans as $item)<option value="{{$item->id}}">{{$item->title}}</option>@endforeach</select></td> <td class="text-center"><button type="button" class="btn btn-danger remove-tr-dynamicCreateRemoveServicePlan">Remove</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-dynamicCreateRemoveServicePlan', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#add-btn-dynamicCreateAddServiceLogo").click(function () {
            ++i;
            $("#dynamicCreateAddServiceLogo").append('<tr><td><input type="text" name="logoFields[' + i + '][title]" placeholder="Enter logo title" class="form-control" /></td><td><input type="file" name="logoFields[' + i + '][logo]" placeholder="Enter logo" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr-dynamicCreateRemoveServiceLogo">Remove</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-dynamicCreateRemoveServiceLogo', function () {
            $(this).parents('tr').remove();
        });
    </script>

@endpush
