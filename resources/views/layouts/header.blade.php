<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}">
    <script src="{{asset('/js/jquery.min.js')}}"></script>

    <script src="{{asset('/js/flat-ui.min.js')}}"></script>
</head>
<body>
<div class="container">
<nav class="navbar navbar-default navbar-lg navbar-embossed" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-9">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tramites</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse-9">
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
                <!--<a href="{{route('users.create')}}"><button type="button" class="btn btn-info" >Register</button></a>-->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Register</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registro</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(array('action'=>'userController@store','class'=>'form-horizontal')) !!}
                        <!--<form action="/users/create" method="post" class="form-horizontal" role="form">-->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputFirstname" class="col-lg-2 control-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputLastname" class="col-lg-2 control-label">LastName</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputNroCi" class="col-lg-2 control-label">Nro ci</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="ci" name="ci"  placeholder="ci">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="col-lg-2 control-label">Address</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="address" name="address" placeholder="address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputOcupation" class="col-lg-2 control-label">Ocupation</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="ocupation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBirthDate" class="col-lg-2 control-label">BirthDate</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="birthdate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">User</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="user" name="user" placeholder="username">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">


                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('registrar',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close () !!}

        </div>

    </div>
</div>


@yield('content')
</div>
</body>
</html>