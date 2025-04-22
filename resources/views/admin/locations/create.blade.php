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
        <a href="{{ url('admin/location') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0 ">
            <form action="{{ url('admin/location') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">

                    <div class="col-9 mb-2">
                        <label for="title">Location Name</label>
                        <input type="text" class="form-control" placeholder="Enter location name"
                               name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <label for="body">Location Description</label>
                        <input type="text" class="form-control" placeholder="Enter location description"
                               name="body" value="{{old('body')}}">
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <label for="image">Location Main Image</label>
                        <input type="file" class="form-control" placeholder="Enter location main image"
                               name="image" value="{{old('image')}}">
                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <label for="location">Location Address</label>
                        <input type="text" class="form-control" placeholder="Enter location address"
                               name="location" value="{{old('location')}}">
                        <span class="text-danger">@error('location'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <label for="google_link">Location Link</label>
                        <input type="text" class="form-control" placeholder="Enter location link"
                               name="google_link" value="{{old('google_link')}}">
                        <span class="text-danger">@error('google_link'){{$message}} @enderror</span>
                    </div>

                    <div class="col-9 mb-2">
                        <table class="table table-bordered" id="dynamicCreateAddLocationLogo">
                            <tr>
                                <th>Logo Title</th>
                                <th>Logo</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="logoFields[][title]" placeholder="Enter logo title"
                                           class="form-control"/></td>
                                <td><input type="file" name="logoFields[][logo]" placeholder="Enter logo"
                                           class="form-control"/></td>
                                <td class="text-center">
                                    <button type="button" name="add" id="add-btn-dynamicCreateAddLocationLogo" class="btn btn-success">Add More
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
                        <table class="table table-bordered" id="dynamicCreateAddLocationSlide">
                            <tr>
                                <th>Slide</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <tr>
                                <td><input type="file" name="moreFields[]" placeholder="Enter slide"
                                           class="form-control"/></td>
                                <td class="text-center">
                                    <button type="button" name="add" id="add-btn-dynamicCreateAddLocationSlide" class="btn btn-success">Add More
                                    </button>
                                </td>
                            </tr>
                        </table>
                        <span
                            class="text-danger">@error('moreFields'){{'at least 1 slide is required and must be of type jpg,png,jpeg,svg with max 5048kb'}}@enderror</span>
                        <span
                            class="text-danger">@error('moreFields.*'){{'at least 1 slide is required and must be of type jpg,png,jpeg,svg with max 5048kb'}}@enderror</span>
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
<script type="text/javascript">
    var i = 0;
    $("#add-btn-dynamicCreateAddLocationSlide").click(function(){
        ++i;
        $("#dynamicCreateAddLocationSlide").append('<tr><td><input type="file" name="moreFields['+i+']" placeholder="Enter Slide" class="form-control" /></td><td class="text-center"><button type="button" class="btn btn-danger remove-tr-dynamicCreateRemoveLocationSlide">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr-dynamicCreateRemoveLocationSlide', function(){
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#add-btn-dynamicCreateAddLocationLogo").click(function(){
        ++i;
        $("#dynamicCreateAddLocationLogo").append('<tr><td><input type="text" name="logoFields['+i+'][title]" placeholder="Enter logo title" class="form-control" /></td><td><input type="file" name="logoFields['+i+'][logo]" placeholder="Enter logo" class="form-control" /></td><td class="text-center"><button type="button" class="btn btn-danger remove-tr-dynamicCreateRemoveLocationLogo">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr-dynamicCreateRemoveLocationLogo', function(){
        $(this).parents('tr').remove();
    });
</script>
@endpush
