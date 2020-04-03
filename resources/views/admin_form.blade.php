@extends('admin_home')

@section('content')

<style>
    .create_form{
        width: 400;
        margin-left: 5%;
        margin-top: 30;
        padding: 40;
    }

    .btn{
        width: 100%;
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

</script>

    <div class='create_form jumbotron'>
        <form action="create_admin_submit" method="POST">
        @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="type">Select type</label>
                <select class="form-control" id="type" name="type" onchange="show_permission_box()">
                  <option value="super">Super</option>
                  <option value="co_admin">Co-Admin</option>
                </select>
            </div>
            
            <div style="display: none" id="permission_box">

                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="access_collect_vote" name="access_collect_vote">
                <label class="form-check-label" for="access_collect_vote">Can collect vote</label>
                </div>

                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="access_voter" name="access_voter">
                <label class="form-check-label" for="access_voter">Can manipulate voter info</label>
                </div>

            </div>

            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="pwd_retype">Retype Password</label>
                <input type="password" class="form-control" id="pwd_retype" name="pwd_retype" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Create admin account</button>
        </form>
    </div>



@endsection