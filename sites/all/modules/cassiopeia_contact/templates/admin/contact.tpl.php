<table class="tuna-contact">
	<tr>
		<th>Tên</th>
		<th>Email</th>
		<th>Số điện thoại</th>
		<th>Nội dung</th>
		<th>Ngày gửi</th>
		<th>Xóa</th>
	</tr>
	<?php foreach ($items as $item): ?>
		<tr>
			<td><?php print $item->name ?? '' ?></td>
			<td><?php print $item->email ?? '' ?></td>
			<td><?php print $item->phone ?? '' ?></td>
			<td><?php print $item->message ?? '' ?></td>
			<td><?php print date('d/m/Y', $item->created ?? 0); ?></td>
			<td><a href="#" onclick="Tuna(<?php print($item->id) ?>)"
				   class="btn btn-sm btn-danger">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php print($pagination) ?>
<?php drupal_add_css(drupal_get_path('module', 'cassiopeia_contact') . '/templates/contact.css');?>
<?php drupal_add_js(drupal_get_path('module', 'cassiopeia_contact') . '/templates/contact.js');?>
