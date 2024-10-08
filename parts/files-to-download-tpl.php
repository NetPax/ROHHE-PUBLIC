<?php $files = isset($args) ? $args : null; ?>
<?php if ($files): ?>
	<ul class="files-excerpts">
		<?php foreach ($files as $file): ?>
			<li class="file">
				<?php $file_icon = $file['file-icon']; ?>
				<?php if ($file_icon): ?>
					<?php echo wp_get_attachment_image($file_icon['ID'], 'fullhd', false, [ 'class' => 'file-icon' ]); ?>
				<?php endif; ?>

				<p class="file-name"><?php echo $file['file-name']; ?></p>

				<ul class="file-links">
					<li>
						<a href="<?php echo $file['file']['url']; ?>" target="_blank" download>
							<img src="<?php echo get_template_directory_uri(); ?>/resources/img/icon-doc-download.jpg" alt="">
							<span><?php echo get_acf_option('trans_doc_download'); ?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo $file['file']['url']; ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/resources/img/icon-doc-open.jpg" alt="">
							<span><?php echo get_acf_option('trans_doc_open'); ?></span>
						</a>
					</li>
				</ul>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>