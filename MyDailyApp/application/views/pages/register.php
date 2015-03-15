<div class="regHeading">
	<p class="tagline">My<em>Daily</em>Inspiration</p>
	<h2>Sign Up below to become a member</h2>
	<h3><a href="home">X</a></h3>

	<?php echo validation_errors(); ?>

	<?php echo form_open('create_user') ?>

		<label for="fName">First Name</label>
		<input type="input" placeholder="First Name" name="fName"/><br />
		<label for="lName">Last Name</label>
		<input type="input" placeholder="Last Name" name="lName"/><br />
		<label for="uName">User Name</label>
		<input type="input" placeholder="User Name" name="userName"/><br />
		<label for="email">Email Address</label>
		<input type="email" placeholder="Email Address" name="email"/><br />
		<label for="pass">Password</label>
		<input type="password" placeholder="Password" name="pass"/><br />
		<label for="confirm">Confirm</label>
		<input type="password" placeholder="Confirm" /><br />
		<input type="submit" name="submit" value="Submit" class="button" id="regButn" />

	</form>
</div>