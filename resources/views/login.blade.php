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
                width: 400;
                margin:auto;
                margin-top: 120;
                padding: 40;
            }
            .btn{
                width: 100%;
            }
            .error-msg{
              padding-top: 20;
              color:red;
              text-align: center;
            }
        </style>

      </head>

<body>

    <div class="header">
        
        @section('header')
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">VotingSystem</a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
              </ul>
            </div>
          </nav>
        @show
        
    </div>

    <div class="content">
        @section('content')
        
        <div class="login-form jumbotron">
            <form action="/login_submit" method="POST">
            @csrf
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                    @if($errors->any())
                    <h5 class="error-msg">{{$errors->first()}}</h5>
                    @endif
              </form>
            </div>
        @show

    </div>

    <div class="footer">
        @section('footer')

        @show

    </div>  

</body>





</html>