@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/contact_us') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-7">
                <p>Name: {{ $contact->name }}</p>
                <p>Mobile: {{ $contact->mobile }}</p>
                <p>Company: {{ $contact->company }}</p>
                <p>Email: {{ $contact->email }}</p>
                <p>Message Body: {{ $contact->body }}</p>
            </div>
        </div>
    </div>
@stop
