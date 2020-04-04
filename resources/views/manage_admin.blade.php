@extends('admin_home')

@section('content')

<style>
    .admin_table{
        width: 90%;
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 30;
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

</script>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Admin manager</h4>
        <p>An admin is the end user of this program. </p>  
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session()->get('message')}}
    </div>
    @endif

    <div class='admin_table'>

        <table class="table table-bordered table-condensed table-striped">
            <thead class="black white-text">
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Access voter</th>
                <th>Access collect vote</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($admins as $singleAdmin)

              <tr>
                <td>{{$singleAdmin->id}}</td>
                <td>{{$singleAdmin->name}}</td>
                <td>{{$singleAdmin->email}}</td>
                <td>{{$singleAdmin->type}}</td>
                <td>{{$singleAdmin->access_voter}}</td>
                <td>{{$singleAdmin->access_collect_vote}}</td>
                <td class="center"><a href= "{{ url('/manage_admin/edit/'.$singleAdmin->id) }}" style="color:green">Edit</a> | <a href= "{{ url('/manage_admin/delete/'.$singleAdmin->id) }}" style="color:red">Delete</a></td>
              </tr>

              @endforeach
           
            </tbody>
        </table>
    </div>



@endsection