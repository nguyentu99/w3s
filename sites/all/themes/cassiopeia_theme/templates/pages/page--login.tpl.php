<div style="display:flex;justify-content: center;align-items: center;height: 100vh">
	<div class="form-structor">
		<div class="signup">
			<div class="center">
				<div class="form-holder">
					<?php
					$user_login = drupal_get_form('user_login');
					$user_login = drupal_render($user_login);
					print($user_login);
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.form-actions {
		display: flex !important;
		justify-content: center !important;
	}
</style>
