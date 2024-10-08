<?php $social_links = get_acf_option('social_links'); ?>
<?php if ($social_links): ?>
	<ul class="social-links">
		<?php foreach ($social_links as $social_link): ?>
			<li class="anim-slide-left">
				<?php $link = $social_link['link']; ?>
				<?php if ($link): ?>
					<?php
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						<?php $icon = $social_link['icon']; ?>
						<?php if ($icon): ?>
							<?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
