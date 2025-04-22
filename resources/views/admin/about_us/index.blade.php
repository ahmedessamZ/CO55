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
                    <th>About Us</th>
                    <th>Our Philosophy</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($abouts as $item)
                    <tr class="text-center">
                        <td>{{ $item->about }}</td>
                        <td>{{ $item->philosophy }}</td>
                        <td>
                            <a href="{{ url('admin/about_us/' . $item->id) }}" title="View">
                           <i style="color: #000000" class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ url('admin/about_us/' . $item->id . '/edit') }}" title="Edit">
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
