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

        <div class="row m-0 pt-0 justify-content-center">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Body</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $item)
                        <tr class="text-center">
                            <td><h6>{{ $item->title }}</h6></td>
                            <td class="text-xs"><p style="overflow-y: scroll; height: 200px; width: 700px" >{{ $item->body }}</p></td>
                            <td>
                                <a href="{{ url('admin/static_page/' . $item->id) }}" title="View">
                                    <i style="color: #000000" class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{ url('admin/static_page/' . $item->id . '/edit') }}" title="Edit">
                                    <i style="color: #000000" class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@stop
