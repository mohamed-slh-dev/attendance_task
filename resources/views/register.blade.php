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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | AdminKit Demo</title>

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
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

                      
						<div class="card">
                          @include('alerts')
                               
							<div class="card-body">
								<div class="m-sm-4">
									<form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input required class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input required class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>

                                        <div class="mb-3">
											<label class="form-label">Phone</label>
											<input required class="form-control form-control-lg" type="text" name="phone" minlength="10" placeholder="Enter phone number" />
										</div>

										<div class="mb-3">
											<label class="form-label">Password</label>
											<input required minlength="6" class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>

                                        <div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input required minlength="6" class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="confirm password" />
										</div>

                                        <div class="mb-3">
											<label class="form-label">Image</label>
											<input required class="form-control form-control-lg" type="file" name="image" placeholder="choose image" />
										</div>

										<div class="text-center mt-3">
											
											<button type="submit" class="btn btn-lg btn-primary">Create Account</button> 
										</div>
									</form>
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