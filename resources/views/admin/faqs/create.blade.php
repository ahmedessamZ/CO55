@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/faqs') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/faqs') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row my-3 justify-content-center">
                    <div class="col-8 my-2">
                        <label for="type">Question Type</label>
                        <select name="type" class="form-control" value="{{old('type')}}">
                            <option value="">please select your question type</option>
                            <option value="membership">Membership Question</option>
                            <option value="general">General Question</option>
                        </select>
                        <span class="text-danger">@error('type'){{$message}} @enderror</span>
                    </div>
                    <div class="col-8 my-2">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" placeholder="Enter your Question"
                               name="question" value="{{old('question')}}">
                        <span class="text-danger">@error('question'){{$message}} @enderror</span>
                    </div>
                    <div class="col-8 my-2">
                        <label for="answer">Answer</label>
                        <input type="text" class="form-control" placeholder="Enter your Answer"
                               name="answer" value="{{old('answer')}}">
                        <span class="text-danger">@error('answer'){{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row pt-5 pb-3 m-0 justify-content-center">
                    <div>
                        <button class="btn btn-success" value="Save" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
