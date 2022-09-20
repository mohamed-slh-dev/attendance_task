<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dashboard</title>

	<link href="{{asset('admin-kit-asset/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Menu
					</li>


				

					<li class="sidebar-item active">
						<a class="sidebar-link" href=" {{route('dashboard')}} ">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href=" {{route('profile')}} ">
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
								
								<a class="dropdown-item" href=" {{route('logout')}} ">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
                @include('alerts')
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Dashboard</h1>

					<div class="card">
                        <div class="row">
                            <div class="col-md-6 col-12 text-center my-3">
							
								@php
								//check the checkinDisabled status
										if ($checkinDisabled == 'true') {

											print("
												<button disabled
									class='btn btn-success'>
									Check IN
								</button>");
										}else{
											print("<a href='checkin'  > 
												<button 
									class='btn btn-success'>
									Check IN
								</button>
								</a>");	
										}
							@endphp
								
                               

                            </div>

                            <div class="col-md-6 col-12 text-center my-3">

								
								@php
										//check the checkinDisabled status
												if ($checkoutDisabled == 'true') {

													print("
														<button disabled
											class='btn btn-danger'>
											Check OUT
										</button>");
												}else{
													print("<a href='checkout'  > 
														<button 
											class='btn btn-danger'>
											Check OUT
										</button>
									</a>"
									);	
												}
									@endphp
										

                            </div>
                        </div>

                       <div style="overflow-x: auto">

					   
                      <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th >Date</th>
                                <th >Check In Time</th>
                                <th >Check Out Time</th>
                                
                                <th >Difference</th>

                            </tr>
                        </thead>
                        <tbody class="text-white" >
                           
								@foreach ($userRegisters as $register)
								@php
									//get the different betwen checkin and checkout
									$diff = $diff = strtotime($register->checkout) - strtotime($register->checkin);

								 ((number_format((int)$diff/60/60)) < 8) ? print('<tr class="bg-danger">') : 
									print('<tr class="bg-success">') ;
								@endphp
									
										<td > {{$register->id}} </td>
										<td > {{$register->date}} </td>
										<td >{{$register->checkin}}</td>
										<td > {{($register->checkout) ? $register->checkout : 'N/A'}}</td>
										
										<td> 
											<button class="btn btn-sm btn-info">
												@php
													if ($diff < 0) {
													print('N/A');
												}else{
													print(
														date('H', $diff )." H - ".date('i', $diff )." M - ".
														date('s', $diff )." S "
													);
												
													
												}
												@endphp
											</button> 
										</td>

									</tr>
								@endforeach

                        </tbody>
                    </table>
				</div>
                   
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