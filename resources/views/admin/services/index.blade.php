@extends('dashboard_layout')
@section('content')

    <div class="container p-0 m-0">
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
                <a href="{{ url('admin/service/create') }}" class="btn btn-success btn-sm" title="Add User">
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
                <th>Logos</th>
                <th>service Plans</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $item)
                <tr class="text-center">
                    <td style="width: 50px">{{ $item->title }}</td>
                    <td><img src="{{asset('images/'.$item->image)}}" width="200" height="auto"></td>
                    <td>
                        @foreach($item->service_logos as $logoo)
                            <div class="row mb-3">
                                <div class="col-9">
                                    {{ $logoo->logo_title }}
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('images/'.$logoo->logo)}}" width="20px"
                                         height="20px">
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($item->service_plans as $plan)
                                <div class="row mb-3">
                                    <div class="col-6"><p>{{$plan->plan->title}}</p></div>
                                    <img class="col-6 mx-0" src="{{asset('images/'.$plan->plan->logo)}}" width="90px"
                                         height="60px">
                                </div>
                        @endforeach
                    </td>

                    <td>
                        <a href="{{ url('admin/service/' . $item->id) }}" title="View">
                            <i style="color: #000000" class="fa-regular fa-eye"></i>
                        </a>
                        <a href="{{ url('admin/service/' . $item->id . '/edit') }}" title="Edit">
                            <i style="color: #000000" class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form method="POST" action="{{ url('admin/service/' . $item->id) }}"
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
