<div class="tableBack">
	<div class="quoteHide">
		<?php echo validation_errors(); ?>

		<?php echo form_open('users/quote_update'); ?>

			<input type="input" name="user_quote" placeholder="Enter your quote here..." class="commentBox">
			<input type="submit" name="submit" value="Add Quote" class="button">
		</form>

	</div>

	<table class="spotBox">
		<tr>
		    <th class="spotHeading">Favorites</th>
		</tr> 
		<tr>
			<td>
				<?php
					$favNum = 1;
					foreach ($fav_view as $row) {
						echo '<p class="favorites">' . $favNum . '. ' . $row . '</p>';
						// print_r($favorite);
						$favNum++;
					}
				?>
			</td>
		</tr>   
	</table>

	<table class="spotBox">
		<tr>	    
			<th class="spotHeading">My Quotes</th>
		</tr>
		<td>
			<a href="#" class="quoteToggle">+Add Quote</a>
		</td>
		<tr>
			<td>
				<?php
					$quoteNum = 1;
					foreach ($userQuote as $row) {
						echo '<p class="quotes">' . $quoteNum . '. ' . ucfirst($row) . '</p>';
						// print_r($favorite);
						$quoteNum++;
					}
				?>
			</td>
		</tr>	
	</table>

	<table class="spotBox">
		<tr>
			<th class="spotHeading">Account Manager</th>
		</tr>
		<td>
			<a href="users/update_user">Edit Profile</a>
			<a href="/delete_warning">Delete Profile</a>
			<a href="users/log_out">Log Out</a>
		</td>	
	</table>
</div>
