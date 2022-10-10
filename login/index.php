<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5"">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	
						<form action="" class="login-form" method="post">
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Authkey" name="authkey" required>
	            </div>
	            <div class="form-group d-md-flex">
					<div class="w-50">
						<!-- <label style="width: 250px;">Select Login time
						<select class="selectpicker" data-style="btn-success">
							<option selected></option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
						</label> -->
					</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="submit">Get Started</button>
	            </div>
	          </form>
			  <?php
			  if(isset($_POST['submit']))
			  {

				$authkey=$_POST['authkey'];
				$db=mysqli_connect('localhost','web','123456','users');
				$sql="select * from notes where authkey='$authkey'";
				$res=mysqli_query($db,$sql);
				$count=mysqli_num_rows($res);
				if($count==0)
				{
					echo "no such authkey";
				}
				else{
					$status_code;
					for ($i=0; $i < 8; $i++)
					{ 
						$status_code .=rand(1,9);
					}
					setcookie('status_code',$status_code,(time()+60*5),"/");
					$redis=new Redis();
					$redis->connect('localhost',6379);
					$redis->set($status_code,$authkey);
					$redis->expire($status_code,60*5);
					header("Location:/");
				}
			  }
			  ?>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

