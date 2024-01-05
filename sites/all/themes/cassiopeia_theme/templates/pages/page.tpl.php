<div class="wrapper-app">
	<section class="content container cassiopeia-container">
		<div id="content" class="clearfix">
			<?php if ($messages): ?>
				<div id="console"
					 class="clearfix"><?php print $messages; ?></div>
			<?php endif; ?>
			<?php if ($action_links): ?>
				<ul class="action-links"><?php print render($action_links); ?></ul>
			<?php endif; ?>
			<?php if ($tabs): ?>
				<div class="tabs">
					<?php print render($tabs); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php print render($page['content']); ?>

</div>

