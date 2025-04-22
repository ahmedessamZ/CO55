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
                <a href="{{ url('admin/plan/create') }}" class="btn btn-success btn-sm" title="Add">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>
        </div>
        <br>
        <div class="row m-0 pt-0 justify-content-center">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="text-center">
                    <th>Plan Title</th>
                    <th>Plan logo</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plans as $item)
                    <tr class="text-center">
                        <td>{{ $item->title }}</td>
                        <td>
                            <img src="{{asset('images/'.$item->logo)}}"
                                 width="30px" height="30px">
                        </td>
                        <td>
                            <a href="{{ url('admin/plan/' . $item->id) }}" title="View">
                           <i style="color: #000000" class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ url('admin/plan/' . $item->id . '/edit') }}" title="Edit">
                                 <i style="color: #000000" class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form method="POST" action="{{ url('admin/plan/' . $item->id) }}"
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
    </div>
@stop
