<link rel="stylesheet" href="signup.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


<div>
	<div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div id="signup-feedback-display" class="alert" role="alert"></div>
				<div class="form-wrapper align-items-center">
					<form action="./Signup.php" method="POST">
						<div class="form sign-up">
							<div class="input-group">
								<i class='bx bxs-user'></i>
								<input type="text" placeholder="Username" name="uid">
							</div>
							<div class="input-group">
								<i class='bx bx-mail-send'></i>
								<input type="text" placeholder="Email" name="email">
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="password" placeholder="Password" name="pwd">
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="password" placeholder="Confirm password" name="pwdrepeat">
							</div>
							<button type="submit" name="submit" class="signupbtn">
								Sign up
							</button>
					</form>
					<p>
						<span>
							Already have an account?
						</span>
						<b class="pointer signinLink">
							Sign in here
						</b>
						<hr>
						<span>
							<a href="?page=index" style="text-decoration: none;">Back to frontpage</a>
						</span>
					</p>
				</div>
			</div>
			<div class="form-wrapper">
				<div class="social-list align-items-center sign-up">
					<div class="align-items-center facebook-bg">
						<i class='bx bxl-facebook'></i>
					</div>
					<div class="align-items-center google-bg">
						<i class='bx bxl-google'></i>
					</div>
					<div class="align-items-center twitter-bg">
						<i class='bx bxl-twitter'></i>
					</div>
					<div class="align-items-center insta-bg">
						<i class='bx bxl-instagram-alt'></i>
					</div>
				</div>
			</div>
		</div>
		<!-- END SIGN UP -->
		<!-- SIGN IN -->


		<div class="col align-items-center flex-col sign-in">

			<div id="signin-feedback-display" class="alert" role="alert"></div>




			<div class="form-wrapper align-items-center">

				<form action="./Login.php" method="POST">

					<div class="form sign-in">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" placeholder="Username" name="loginuid">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Password" name="loginpwd">
						</div>
						<button type="submit" name="login">
							Sign in
						</button>
				</form>

				<p>
					<span>
						Don't have an account?
					</span>
					<b class="pointer signupLink">
						Sign up here
					</b>
					<hr>
					<span>
						<a href="?page=index" style="text-decoration: none;">Back to frontpage</a>
					</span>
				</p>

			</div>
		</div>
		<div class="form-wrapper">
			<div class="social-list align-items-center sign-in">
				<div class="align-items-center facebook-bg">
					<i class='bx bxl-facebook'></i>
				</div>
				<div class="align-items-center google-bg">
					<i class='bx bxl-google'></i>
				</div>
				<div class="align-items-center twitter-bg">
					<i class='bx bxl-twitter'></i>
				</div>
				<div class="align-items-center insta-bg">
					<i class='bx bxl-instagram-alt'></i>
				</div>
			</div>

		</div>

		<!-- END SIGN IN -->
	</div>
	<!-- END FORM SECTION -->
	<!-- CONTENT SECTION -->
	<div class="row content-row">
		<!-- SIGN IN CONTENT -->
		<div class="col align-items-center flex-col">

			<div class="text sign-in">
				<h2>
					Welcome back
				</h2>

			</div>

		</div>
		<!-- END SIGN IN CONTENT -->
		<!-- SIGN UP CONTENT -->
		<div class="col align-items-center flex-col">

			<div class="text sign-up">
				<h2>
					Join with us
				</h2>

			</div>
		</div>
		<!-- END SIGN UP CONTENT -->
	</div>
	<!-- END CONTENT SECTION -->
</div>
</div>





<script src="script.js"></script>