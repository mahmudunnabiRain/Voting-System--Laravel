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
                <a class="navbar-brand">VotingSystem</a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
              </ul>
            </div>
          </nav>
        @show
        
    </div>

    <div class="content">
        @section('content')
        
        <div class="login-form jumbotron">
            <form action="/login_submit" method="POST" class="was-validated">
            @csrf
                <div class="input-group @error('email') has-error @enderror">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                @error('email')
                  <small class="form-text text-muted">{{ $message }}</small>
                  <br>
                @enderror
                <br>
                <div class="input-group @error('password') has-error @enderror">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                @error('password')
                  <small class="form-text text-muted">{{ $message }}</small>
                  <br>
                @enderror               
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
                
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