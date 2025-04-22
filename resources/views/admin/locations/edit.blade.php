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

        <div class="row justify-content-center">
            <div class="col-9">
                <div class="row justify-content-center text-center mt-3">
                    @foreach($location->location_logos as $logoo)
                        <div class="col">
                            <p> {{ $logoo->logo_title }} </p>

                            <img class="mx-5" src="{{asset('images/'.$logoo->logo)}}" width="20px"
                                 height="20px">
                            <p>
                            <form method="POST" action="{{ url('admin/location_logo/' . $logoo->id) }}"
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
                    @foreach($location->images as $slidee)
                        <div class="col">
                            <img src="{{asset('images/'.$slidee->slide)}}" class="mb-3 mx-5" width="100px"
                                 height="auto">
                            <form method="POST" action="{{ url('admin/image/' . $slidee->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button onclick="return confirm(&quot;Confirm delete?&quot;)"
                                        style="border:none; background:none; padding:0;" type="submit"
                                        title="Delete">
                                    <i style="color: #000000" class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>


                <form action="{{ url('admin/location/'.$location->id) }}" method="post"
                      enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    <input type="hidden" name="id" value="{{$location->id}}" id="id"/>

                    <div class="row my-3 justify-content-center">

                        <div class="col-9 mb-2">
                            <label for="title">Location Name</label>
                            <input type="text" class="form-control" placeholder="Enter location name"
                                   name="title" value="{{$location->title}}">
                            <span class="text-danger">@error('title'){{$message}} @enderror</span>
                        </div>
                        <div class="col-9 mb-2">
                            <label for="body">Location Description</label>
                            <input type="text" class="form-control" placeholder="Enter location description"
                                   name="body" value="{{$location->body}}">
                            <span class="text-danger">@error('body'){{$message}} @enderror</span>
                        </div>
                        <div class="col-9 mb-2">
                            <label for="image">Location Main Image</label>
                            <input type="file" class="form-control" placeholder="Enter location main image"
                                   name="image">
                            <span class="text-danger">@error('image'){{$message}} @enderror</span>
                        </div>
                        <div class="col-9 mb-2">
                            <label for="location">Location Address</label>
                            <input type="text" class="form-control" placeholder="Enter location address"
                                   name="location" value="{{$location->location}}">
                            <span class="text-danger">@error('location'){{$message}} @enderror</span>
                        </div>
                        <div class="col-9 mb-2">
                            <label for="google_link">Location Link</label>
                            <input type="text" class="form-control" placeholder="Enter location link"
                                   name="google_link" value="{{$location->google_link}}">
                            <span class="text-danger">@error('google_link'){{$message}} @enderror</span>
                        </div>

                        <div class="col-9 mb-2">
                            <table class="table table-bordered" id="dynamicEditAddLocationLogo">
                                <tr>
                                    <th>Logo Title</th>
                                    <th>Logo</th>
                                </tr>
                                @foreach($location->location_logos as $logoo)
                                    <tr>
                                        <td><input value="{{$logoo->logo_title}}" type="text"
                                                   name="logoFields[{{$logoo->id}}][title]"
                                                   placeholder="Enter logo title" class="form-control"/></td>
                                        <td><input type="file" name="logoFields[{{$logoo->id}}][logo]"
                                                   placeholder="Enter logo"
                                                   class="form-control"/></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><input type="text" name="editLogoFields[][title]"
                                               placeholder="Enter logo title"
                                               class="form-control"/></td>
                                    <td><input type="file" name="editLogoFields[][logo]"
                                               placeholder="Enter logo"
                                               class="form-control"/></td>
                                    <td>
                                        <button type="button" name="add" id="add-btn-dynamicEditAddLocationLogo"
                                                class="btn btn-success">Add More
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
                            <table class="table table-bordered" id="dynamicEditAddLocationSlide">
                                <tr>
                                    <th>Slide</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <td><input type="file" name="moreFields[]" placeholder="Enter slide"
                                               class="form-control"/></td>
                                    <td class="text-center">
                                        <button type="button" name="add"
                                                id="add-btn-dynamicEditAddLocationSlide"
                                                class="btn btn-success">Add More
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
                    <div class="row pb-4 m-0 justify-content-center">
                        <div>
                            <button value="Update" class="btn btn-success" type="submit">update</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        var i = 0;
        $("#add-btn-dynamicEditAddLocationSlide").click(function () {
            ++i;
            $("#dynamicEditAddLocationSlide").append('<tr><td><input type="file" name="moreFields[' + i + ']" placeholder="Enter Slide" class="form-control" /></td><td class="text-center"><button type="button" class="btn btn-danger remove-tr-dynamicEditRemoveLocationSlide">Remove</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-dynamicEditRemoveLocationSlide', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#add-btn-dynamicEditAddLocationLogo").click(function () {
            ++i;
            $("#dynamicEditAddLocationLogo").append('<tr><td><input type="text" name="editLogoFields[' + i + '][title]" placeholder="Enter logo title" class="form-control" /></td><td><input type="file" name="editLogoFields[' + i + '][logo]" placeholder="Enter logo" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr-dynamicEditRemoveLocationLogo">Remove</button></td></tr>');
        });
        $(document).on('click', '.remove-tr-dynamicEditRemoveLocationLogo', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
