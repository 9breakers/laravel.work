
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @vite([ 'resources/admin/css/styles.css',
    'resources/admin/js/scripts.js'])
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form method="post" action="{{ route('registration') }}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error ('name') is-invalid @enderror" value="{{old('name')}}" id="inputName" type="text" name="name" placeholder="Enter your name" />
                                        <label for="inputName">Name</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error ('email') is-invalid @enderror" value="{{old('email')}}" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Email address</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control @error ('password') is-invalid @enderror" value="{{old('password')}}"  id="inputPassword" type="password" name="password" placeholder="Create a password" />
                                                <label for="inputPassword">Password</label>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control @error ('password_confirmation') is-invalid @enderror" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirm password" />
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Account</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
