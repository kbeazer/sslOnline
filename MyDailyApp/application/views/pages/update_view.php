<div class="userUpdate">
	<p class="tagline lineUp">My<em>Daily</em>Inspiration</p>
	<h3><a href="../verifyLogin/load_page">X</a></h3>
	<h3 class="pageHeading">Account Update</h3>

	<?php echo validation_errors(); ?>

	<?php echo form_open('users/db_update'); ?>
		
		<label for="fName">First Name</label>
		<input type='input' name="fName" value= 
		<?php 

			foreach ($userInfo as $row) 
			{
				echo $row->fName; 
			}
		
		?> 
		/><br />

		<label for="lName">Last Name</label>
		<input type='input' name="lName" value=
		<?php 

			foreach ($userInfo as $row) 
			{
				echo $row->lName; 
			}
		
		?> 
		/><br />

		<label for="userName">User Name</label>
		<input type='input' name="userName" value=
		<?php 

			foreach ($userInfo as $row) 
			{
				echo $row->userName; 
			}
		
		?> 
		/><br />

		<label for="email">Email</label>
		<input type='email' name="email" value=
		<?php 

			foreach ($userInfo as $row) 
			{
				echo $row->email; 
			}
		
		?> 
		/><br />

		<input type='submit' name="submit" value='Update' class="button"/>

	</form>
</div>