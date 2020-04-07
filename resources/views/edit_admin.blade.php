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

<script>

    function show_permission_box()
    {
        var selected = $('#type').val();
        if(selected == 'co_admin')
        {
            $('#permission_box').show();
        }
        else
        {
            $('#permission_box').hide();
        }
        

    }

    $(document).ready(show_permission_box); 
    

</script>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Edit Admin</h4>
        <p>Update fields with required data.</p>  
    </div>

    <div class='create_form jumbotron'>

        
        

        <form action="/edit_admin_submit" method="POST" name="edit_admin_form">
        @csrf

            <input type="hidden" name="id" value="{{$targetAdmin->id}}">

            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$targetAdmin->name}}">
                @error('name')
                  <small class="form-text text-muted" style="color:red">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group @error('email') has-error @enderror">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$targetAdmin->email}}" aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                  <small class="form-text text-muted" style="color:red">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Select type</label>
                <select class="form-control" id="type" name="type" onchange="show_permission_box()">
                  <option value="super" {{$targetAdmin->type === "super" ? "selected" : ""}}>Super</option>
                  <option value="co_admin" {{$targetAdmin->type === "co_admin" ? "selected" : ""}}>Co-Admin</option>
                </select>
            </div>
            
            <div style="display: none" id="permission_box">

                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="access_voter" name="access_voter" {{$targetAdmin->access_voter === "yes" ? "checked" : ""}}>
                <label class="form-check-label" for="access_voter">Can manipulate voter info</label>
                </div>

                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="access_collect_vote" name="access_collect_vote" {{$targetAdmin->access_collect_vote === "yes" ? "checked" : ""}}>
                <label class="form-check-label" for="access_collect_vote">Can collect vote</label>
                </div>

            </div>

            <div class="form-group @error('password') has-error @enderror">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{$targetAdmin->password}}" placeholder="Password">
                @error('password')
                  <small class="form-text text-muted" style="color:red">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group @error('password') has-error @enderror">
                <label for="password_confirmation">Retype Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                @error('password')
                  <small class="form-text text-muted" style="color:red">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">Update admin account</button>
        </form>
    </div>



@endsection