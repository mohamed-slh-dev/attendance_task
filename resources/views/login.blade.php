<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('admin-kit-asset/img/icons/icon-48x48.png')}}" />



	<title>Sign In</title>

	<link href="{{asset('admin-kit-asset/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back,</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
                            @include('alerts')
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="assets/img/Logis-Logo-400px.jpg" alt="LOGIS" class="img-fluid" width="150" height="150" />
									</div>
									<form action=" {{route('checkLogin')}} " method="POST">
										@csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your Email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											
										</div>
									
										<div class="text-center my-3">
											
											<button type="submit" class="btn btn-lg btn-info">Login</button> 
										</div>
									</form>
                                    <a href="{{route('register')}}" class="mt-3">Dont have account register now!</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{asset('admin-kit-asset/js/app.js')}}"></script>
	 <!-- jQuery  -->
	 <script src="{{asset('assets/js/jquery.min.js')}}"></script>
	 <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	 <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
	 <script src="{{asset('assets/js/waves.min.js')}}"></script>
	 <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

</body>

</html>