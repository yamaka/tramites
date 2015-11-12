<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}">
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/flat-ui.min.js')}}"></script>
    @yield('scripts')
    <script>
        // Some general UI pack related JS
        // Extend JS String with repeat method
        String.prototype.repeat = function (num) {
            return new Array(Math.round(num) + 1).join(this);
        };
        (function ($) {
            // Add segments to a slider
            $.fn.addSliderSegments = function () {
                return this.each(function () {
                    var $this = $(this),
                            option = $this.slider('option'),
                            amount = (option.max - option.min)/option.step,
                            orientation = option.orientation;
                    if ( 'vertical' === orientation ) {
                        var output = '', i;
                        console.log(amount);
                        for (i = 1; i <= amount - 1; i++) {
                            output += '<div class="ui-slider-segment" style="top:' + 100 / amount * i + '%;"></div>';
                        }
                        $this.prepend(output);
                    } else {
                        var segmentGap = 100 / (amount) + '%';
                        var segment = '<div class="ui-slider-segment" style="margin-left: ' + segmentGap + ';"></div>';
                        $this.prepend(segment.repeat(amount - 1));
                    }
                });
            };

            $(function () {

                // Todo list
                $('.todo').on('click', 'li', function () {
                    $(this).toggleClass('todo-done');
                });

                // Custom Selects
                if ($('[data-toggle="select"]').length) {
                    $('[data-toggle="select"]').select2();
                }

                // Checkboxes and Radio buttons
                $('[data-toggle="checkbox"]').radiocheck();
                $('[data-toggle="radio"]').radiocheck();

                // Tooltips
                $('[data-toggle=tooltip]').tooltip('show');

                // jQuery UI Sliders
                var $slider = $('#slider');
                if ($slider.length > 0) {
                    $slider.slider({
                        max: 15,
                        step: 6,
                        value: 3,
                        orientation: 'horizontal',
                        range: 'min'
                    }).addSliderSegments();
                }

                var $verticalSlider = $('#vertical-slider');
                if ($verticalSlider.length) {
                    $verticalSlider.slider({
                        min: 1,
                        max: 5,
                        value: 3,
                        orientation: 'vertical',
                        range: 'min'
                    }).addSliderSegments($verticalSlider.slider('option').max, 'vertical');
                }

                // Focus state for append/prepend inputs
                $('.input-group').on('focus', '.form-control', function () {
                    $(this).closest('.input-group, .form-group').addClass('focus');
                }).on('blur', '.form-control', function () {
                    $(this).closest('.input-group, .form-group').removeClass('focus');
                });

                // Make pagination demo work
                $('.pagination').on('click', 'a', function () {
                    $(this).parent().siblings('li').removeClass('active').end().addClass('active');
                });

                $('.btn-group').on('click', 'a', function () {
                    $(this).siblings().removeClass('active').end().addClass('active');
                });

                // Disable link clicks to prevent page scrolling
                $(document).on('click', 'a[href="#fakelink"]', function (e) {
                    e.preventDefault();
                });

                // Switches
                if ($('[data-toggle="switch"]').length) {
                    $('[data-toggle="switch"]').bootstrapSwitch();
                }

                // Typeahead
                if ($('#typeahead-demo-01').length) {
                    var states = new Bloodhound({
                        datumTokenizer: function (d) { return Bloodhound.tokenizers.whitespace(d.word); },
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        limit: 4,
                        local: [
                            { word: 'Alabama' },
                            { word: 'Alaska' },
                            { word: 'Arizona' },
                            { word: 'Arkansas' },
                            { word: 'California' },
                            { word: 'Colorado' }
                        ]
                    });

                    states.initialize();

                    $('#typeahead-demo-01').typeahead(null, {
                        name: 'states',
                        displayKey: 'word',
                        source: states.ttAdapter()
                    });
                }

                // make code pretty
                window.prettyPrint && prettyPrint();

            });

        })(jQuery);
    </script>
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
            <a class="navbar-brand" href="/">Tramites</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse-9">
            @if(auth()->guest())
            <form class="navbar-form navbar-right" role="form" method="POST" action="{{ url('/auth/login') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    <!--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>-->
                </div>

                <div class="form-group">
                    <label class="checkbox" for="checkbox1">
                        <input type="checkbox" data-toggle="checkbox" value="" id="checkbox1" name="remember">
                        Remember Me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <!--<a href="{{route('users.create')}}"><button type="button" class="btn btn-info" >Register</button></a>-->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Register</button>
            </form>
            @else
                <ul class="nav navbar-nav">
                    <li class="@yield('active')"><a href="{{route('tramite.index')}}" >Lista de Tramites</a></li>
                </ul>
            @if(!auth()->guest() and strcomp(auth()->role(),'admin'))
            <ul class="nav navbar-nav">
                    <li class="@yield('active')"><a href="{{route('admin.index')}}" >Admin</a></li>
                </ul>
                @endif
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones para el usuario {{Auth::user()->user}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}" >Logout</a></li>
                        </ul>
                </ul>
            @endif
        </div><!--/.navbar-collapse -->
    </div>
</nav>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">First name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Last name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">User name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="user" value="{{old('user')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Occupation</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Birthday</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="birthday" value="{{old('birthday')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">CI</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="ci" value="{{old('ci')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" value="{{old('address')}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@yield('content')
</div>
</body>
</html>