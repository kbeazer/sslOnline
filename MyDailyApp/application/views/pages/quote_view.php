<div class="quote">
	<div>
		<h3>Quote of the Day</h3>
		<?php echo '<p class="dailyQuote"><em>' . '<a href="#"><img src="/images/favorites.png" class="favLogo"/></a>' . $quote . '</em></p>'; ?>
	</div>

	<div class="comHide">
		<?php  
			foreach ($comment as $row) {
			 	echo '<p class="dailyComments">' . '<em>' . 'Added by: ' . $username . '</em>' . '    ' . $row->comment . '</p>';
			}

		?>

		<div>
			<?php echo validation_errors(); ?>

			<?php echo form_open('users/comment_update'); ?>

				<input type="input" name="user_comment" placeholder="Enter a comment..." class="commentBox">
				<input type="submit" name="submit" value="Leave Comment" class="button">
			</form>
		</div>

	</div>

	<a href="#" id="comToggle"><img src="/images/comment.png" class="comFix"> Comments</a>

</div>

