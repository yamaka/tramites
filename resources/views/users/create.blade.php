<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}">

   <!-- $table->string('first_name');
    $table->string('last_name');
    $table->string('ci',10);
    $table->string('address');
    $table->string('occupation');
    $table->dateTime('birthday');
    $table->string('email')->unique();
    $table->enum('role',['user','editor','admin']);
    $table->string('user');
    $table->string('password', 60);
    $table->rememberToken();
    $table->timestamps();
    -->
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <h4>Register</h4>

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
                   {!! Form::submit('registrar',['class'=>'btn btn-primary']) !!}

                </div>
            </div>
        {!! Form::close () !!}

    </div><!-- /.col-md-12 -->
</div><!-- /.row -->
</body>
</html>