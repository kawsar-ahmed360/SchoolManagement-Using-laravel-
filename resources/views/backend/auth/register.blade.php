<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:30 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Register 2 | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('public/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('public/backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('public/backend/images/bg.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="index.html"><img src="public/backend/images/logo-dark.png" height="22" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Free Register</h4>
                                <p class="text-muted text-center">Get your free Veltrix account now.</p>

                              <form method="POST" class="mt-4" action="{{ route('register') }}">
                                         @csrf

                                <div class="form-group">
                                    <label for="useremail">User Name</label>
                                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
    

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                                  <div class="form-group">
                                    <label for="userpassword">Re-type Password</label>
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                             
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <p class="mb-0">By registering you agree to the Veltrix <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Already have an account ? <a href="{{ route('login') }}" class="font-weight-medium text-primary"> Login </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <!-- JAVASCRIPT -->
        <script src="{{ asset('public/backend/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('public/backend/js/app.js') }}"></script>

    </body>

<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:30 GMT -->
</html>
