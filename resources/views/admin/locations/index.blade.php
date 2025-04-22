@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0 justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ url('admin/location/create') }}" class="btn btn-success btn-sm" title="Add User">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>
        </div>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr class="text-center">
                <th>Name</th>
                <th>Main Image</th>
                <th>Address</th>
                <th>Logos</th>
                <th>slides</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($locations as $item)
                <tr class="text-center">
                    <td>{{ $item->title }}</td>
                    <td><img src="{{asset('images/'.$item->image)}}" width="150px" height="auto"></td>
                    <td style="width: 150px">{{ $item->location }}</td>
                    <td style="width: 250px">
                        @foreach($item->location_logos as $logoo)
                            <div class="row mb-3">
                                <div class="col-8">
                                    {{ $logoo->logo_title }}
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('images/'.$logoo->logo)}}" width="20px"
                                         height="20px">
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <div class="row mb-3">
                        @foreach($item->images as $slidee)

                                    <img class="col-6 px-2 py-2" src="{{asset('images/'.$slidee->slide)}}" width="100px"
                                         height="auto">
                        @endforeach
                        </div>
                    </td>
                    <td class="col-1">
                        <a href="{{ url('admin/location/' . $item->id) }}" title="View">
                            <i style="color: #000000" class="fa-regular fa-eye"></i>
                        </a>
                        <a href="{{ url('admin/location/' . $item->id . '/edit') }}" title="Edit">
                            <i style="color: #000000" class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form method="POST" action="{{ url('admin/location/' . $item->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button onclick="return confirm(&quot;Confirm delete?&quot;)"
                                    style="border:none; background:none; padding:0;" type="submit" title="Delete">
                                <i style="color: #000000" class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
