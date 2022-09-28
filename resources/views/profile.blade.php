<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Profile</title>

	<link href="{{asset('admin-kit-asset/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Profile</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Menu
					</li>


				

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('dashboard')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item active" >
						<a class="sidebar-link" href="{{route('profile')}}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

						
					<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
						<img src="{{asset('assets/usersImages/'.Session::get('image'))}}" class="avatar img-fluid rounded me-1" alt="user image" /> <span class="text-dark">{{Session::get('name')}}</span>
					</a>
							<div class="dropdown-menu dropdown-menu-end">
								
								<a class="dropdown-item" href="{{route('logout')}} ">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
                @include('alerts')
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Profile</h1>

					<div class="card p-5">
                       
                        <form class="row" action=" {{route('updateProfile')}} " method="POST" enctype="multipart/form-data">
                        	@csrf

							<h4>Update profile</h4>
                            <div class="col-sm-12 col-lg-4 col-md-6 mb-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" required value="{{$userInfo->name}}" class="form-control">
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <label for="name">Phone</label>
                                <input type="text" name="phone" required value="{{$userInfo->phone}}" minlength="10" class="form-control">
                            </div>

                            <div class="col-sm-12 col-lg-4 col-md-6 mb-4 ">
                                <label for="name">Email</label>
                                <input type="email" name="email" required value="{{$userInfo->email}}" class="form-control">
                            </div>


                          


							<div class="col-sm-12 col-lg-4 col-md-6 mb-4">
                                <label for="name">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

							<div class="col-12 text-center my-4">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>

                        </form>
						<hr>

						<form class="row" action=" {{route('updatePassword')}} " method="POST">
							@csrf
							<h4>Update password</h4>
							  <div class="col-sm-12 col-lg-4 col-md-6 mb-4">
                                <label for="name">Password</label>
                                <input type="password" minlength="6" name="password" class="form-control">
                            </div>

							<div class="col-12 text-center my-4">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>

                   
                </div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>logis</strong></a> - <a class="text-muted" href="#" target="_blank"><strong>For logistics services</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('admin-kit-asset/js/app.js')}}"></script>

		 <!-- jQuery  -->
		 <script src="{{asset('assets/js/jquery.min.js')}}"></script>
		 <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
		 <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
		 <script src="{{asset('assets/js/waves.min.js')}}"></script>
		 <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

</body>

</html>