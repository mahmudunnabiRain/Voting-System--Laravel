<html>
    <head>
        <title>Voting System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            
            .login-form{
                width: 30%;
                margin:auto;
                margin-top: 120;
            }
            .btn{
        
            }
            .error-msg{
              color:red;
              text-align: center;
            }
            .navbar-right{
                padding-right: 10;
                padding-left: 15;
            }


            
        </style>

      </head>

<body>

    <div class="header">
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">VotingSystem</a>
              </div>
              <ul class="nav navbar-nav">

                <li class="{{ (request()->is('admin_home')) ? 'active' : '' }}"><a href="admin_home">Home</a></li>
                
                @if (Session::get('adminData')->type == 'super')
                    <li><a href="#">Create Poll</a></li>
                @endif

                @if (Session::get('adminData')->type == 'super')
                    <li class="{{ (request()->is('co_admin')) ? 'active' : '' }}"><a href="co_admin">Co-Admin</a></li>
                @endif

                <li><a href="#">Voter</a></li>
                <li><a href="#">Collect Vote</a></li>
                <li><a href="#">Progress</a></li>

              </ul>
              <div class="nav navbar-nav navbar-right">
                <a href="logOut" class="btn btn-danger navbar-btn">LogOut</a>
              </div>
            </div>
        </nav>
        
    </div>

    <div class="content">
        @section('content')
        <h4>
            {{Session::get('adminData')}}
            
        </h4>
        @show

    </div>

    <div class="footer">
        @section('footer')
        
        @show
    </div>  

</body>





</html>