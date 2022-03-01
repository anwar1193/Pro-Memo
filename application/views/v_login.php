<!doctype html>
<html lang="en">
  <head>
  	<title>Pro-Memo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url().'asset/' ?>css/style.css">

	</head>

	<body>
	<section class="ftco-section">
		<div class="container">
      
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">

						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2 style="text-shadow: 5px 5px 5px black;">Pro-Memo</h2>
								<!-- <p style="text-shadow: 5px 5px 5px black;">PT Procar International Finance</p> -->
								<img src="<?php echo base_url().'gambar/procar.png' ?>" alt="">
							</div>
			      </div>

						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Log In</h3>
			      		</div>
			      	</div>

				<form method="post" action="<?php echo base_url().'login/proses' ?>" class="signin-form">
					
					<div class="form-group mb-3">
						<label class="label" for="name">Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off" autofocus>
					</div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required id="password">
		            </div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3" style="border-color: white;">Log In</button>
		            </div>

		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0" style="color: orange;">Show Password
							<input type="checkbox" id="show_password">
							<span class="checkmark"></span>
							</label>
						</div>

						<div class="w-50 text-md-right">
							<a href="#">Forgot Password</a>
						</div>

		            </div>

					<div class="form-group d-md-flex">
		            	<div class="w-100 text-left">
							<span>
							Lupa Logout? Klik :
							</span>
							<a class="btn btn-success text-white" id="clear_session" href="#" data-toggle="modal" data-target="#modal-clear">
							Clear Session
							</a>
						</div>
		            </div>

		        </form>

		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script src="<?php echo base_url().'asset/' ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url().'asset/' ?>js/popper.js"></script>
  <script src="<?php echo base_url().'asset/' ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url().'asset/' ?>js/main.js"></script>

  <!-- Modal Clear Session -->
  <form method="POST" action="<?php echo base_url().'login/hapus_session' ?>">
  <div class="modal fade" id="modal-clear">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Clear Login Session</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
		<input class="form-control" type="text" name="username" placeholder="Masukan Username" autocomplete="off" required> <br>

		<input class="form-control" type="password" name="password" placeholder="Masukan Password" autocomplete="off" required>

		</div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-success text-white">Clear Session</button>
		</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
  </div>
  </form>
  <!-- / Modal Clear Session -->

  <!-- Script Show Password -->
  <script>
    $(document).ready(function(){

      $('#show_password').click(function(){
        if($(this).is(':checked')){
          $('#password').attr('type','text');
        }else{
          $('#password').attr('type', 'password');
        }
      });

    });
  </script>

	</body>
</html>

