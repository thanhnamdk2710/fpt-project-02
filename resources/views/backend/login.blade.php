<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login || TN Fashion Management</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="{{asset('backend/css/icons.css')}}" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="{{asset('backend/css/bootstrap.css')}}" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="{{asset('backend/css/plugins.css')}}" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="{{asset('backend/css/main.css')}}" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="icon" href="{{asset('images/icon.png')}}" type="image/png">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body class="login-page">
        <!-- Start login container -->
        <div class="container login-container">
            <div class="login-panel panel panel-default plain animated bounceIn">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title text-center">
                        <img id="logo" src="{{asset('images/logo.png')}}" width="100%" alt="TN Fashion logo">
                    </h4>
                </div>
                <div class="panel-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger mt10">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <i class="glyphicon glyphicon-ban-circle alert-icon"></i>
                            <strong>Oh snap!</strong> {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success mt10">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <i class="fa fa-check alert-icon"></i>
                            <strong>Well done!</strong> {{ Session::get('success') }}
                        </div>
                    @endif

                    <form class="form-horizontal mt0" action="{{route('admin.login')}}" id="login-form" method="post">
                        @csrf

                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="input-group input-icon">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Your email ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="input-group input-icon">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Your password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb0">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="checkbox-custom">
                                    <input type="checkbox" name="remember" id="remember" value="option">
                                    <label for="remember">Remember me ?</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                                <button class="btn btn-default pull-right" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- End login container -->
        <div class="container">
            <div class="footer">
                <p class="text-center">&copy;2018 Copyright TN Fashion Admin. All right reserved !!!</p>
            </div>
        </div>
        <!-- Javascripts -->
        <!-- Important javascript libs(put in all pages) -->
        <script src="{{asset('backend/assets/js/libs/jquery-2.1.1.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/libs/jquery-ui-1.10.4.min.js')}}"></script>
        <!--[if lt IE 9]>
            <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
            <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script type="text/javascript" src="js/libs/respond.min.js"></script>
        <![endif]-->
        <!-- Bootstrap plugins -->
        <script src="{{asset('backend/js/bootstrap/bootstrap.js')}}"></script>
        <!-- Form plugins -->
        <script src="{{asset('backend/plugins/forms/validation/jquery.validate.js')}}"></script>
        <script src="{{asset('backend/plugins/forms/validation/additional-methods.min.js')}}"></script>
        <!-- Init plugins olny for this page -->
        <script src="{{asset('backend/js/pages/login.js')}}"></script>
    </body>
</html>
