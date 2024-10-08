<?php if ($tiles_list): ?>
	<ul class="tiles-graphics-list">
		<?php foreach ($tiles_list as $tiles_list_item): ?>
			<li class="anim-slide-bottom">
				<p><?php echo $tiles_list_item['tile-caption']; ?></p>
				<?php $graphic = $tiles_list_item['tile-graphic'];  ?>
				<?php if ($graphic): ?>
					<div>
						<?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
					</div>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>