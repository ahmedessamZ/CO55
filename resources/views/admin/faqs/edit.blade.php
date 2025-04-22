@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/faqs') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/faqs/'.$faq->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$faq->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">
                    <div class="col-8 my-2">
                        <label for="type">Question Type</label>
                        <select name="type" class="form-control">
                            <option value="">please select your question type</option>
                            <option {{ $faq->type == "membership" ? "selected" : "" }} value="membership">Membership Question</option>
                            <option {{ $faq->type == "general" ? "selected" : "" }} value="general">General Question</option>
                        </select>
                        <span class="text-danger">@error('type'){{$message}} @enderror</span>
                    </div>

                    <div class="col-8 my-2">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" placeholder="Enter full question"
                               name="question" value="{{$faq->question}}">
                        <span class="text-danger">@error('question'){{$message}} @enderror</span>
                    </div>

                    <div class="col-8 my-2">
                        <label for="answer">Answer</label>
                        <input type="text" class="form-control" placeholder="Enter your answer"
                               name="answer" value="{{$faq->answer}}">
                        <span class="text-danger">@error('answer'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row pt-3 pb-3 m-0 justify-content-center">
                    <div>
                        <button value="Update" class="btn btn-success" type="submit">update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
