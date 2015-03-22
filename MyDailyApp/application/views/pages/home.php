<div id="container">

	<div class="landing">
		<h1>My Daily Inspiration</h1>
		<h2>Live your life one day at a time.</h2>
		<img src="/images/sunset.jpg" class="imageFix">

		<?php echo validation_errors(); ?>

   		<?php echo form_open('verifyLogin'); ?>

			<input type="input" placeholder="Username" name="userName">
			<input type="password" placeholder="Password" name="pass">
			<input type="submit" value="Login" name="submit" class="button">
			<a href="#" class="passSet">Forgot your password?</a>
			<p id="signUp">Not a member?  <a href="register"> Sign Up Today </a> for<strong> FREE!</strong></p>
		</form>
	</div>

	