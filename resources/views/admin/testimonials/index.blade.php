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
                <a href="{{ url('admin/testimonial/create') }}" class="btn btn-success btn-sm" title="Add User">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>
        </div>
        <br>
        <div class="row m-0 pt-0 justify-content-center">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="text-center">
                    <th>Author</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Company</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonials as $item)
                    <tr class="text-center">
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->author_title }}</td>
                        <td class="text-xs">{{ $item->body }}</td>
                        <td>{{ $item->company }}</td>
                        <td>
                            <img src="{{asset('images/'.$item->company_logo)}}"
                                 width="50px" height="50px">
                        </td>
                        <td>
                            <a href="{{ url('admin/testimonial/' . $item->id) }}" title="View">
                           <i style="color: #000000" class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ url('admin/testimonial/' . $item->id . '/edit') }}" title="Edit">
                                 <i style="color: #000000" class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form method="POST" action="{{ url('admin/testimonial/' . $item->id) }}"
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
