@extends('admin_home')

@section('content')

<style>
    .create_form{
        width: 380;
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 30;
        padding: 40;
    }

    
    .alert{
        width: 90%;
        margin-left: 5%;
        margin-right: 5%;
    }
</style>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Register New Voter</h4>
        <p>Insert fields with required data.</p>  
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session()->get('message')}}
    </div>
    @endif


@endsection