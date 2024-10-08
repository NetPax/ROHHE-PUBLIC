    <footer class="footer">
       <div class="container footer-main">
	       <div class="footer-company-info anim-slide-bottom">
		       <?php echo get_acf_option('company_info'); ?>
	       </div>
	       <div class="footer-menu anim-slide-bottom">
		       <?php
		       wp_nav_menu(array(
			       'depth'           => 10,
			       'container'       => 'nav',
			       'container_class' => 'footer-main-menu-container',
			       'container_id'    => 'footer-main-menu-container',
			       'menu_class'      => 'footer-main-menu',
			       'menu_id'         => 'footer-main-menu',
			       'theme_location'  => 'footer-menu',
			       'walker'          => new WP_Bootstrap_Navwalker(),
			       'items_wrap'      => '<ul id="%1$s" class="%2$s" data-level="1">%3$s</ul>'
		       ));
		       ?>
	       </div>
       </div>
	    <div class="container footer-misc">
			<p class="footer-legal-note">
				<?php echo get_acf_option('legal_note'); ?>
			</p>
		    <?php $legal_links = get_acf_option( 'legal_links'); ?>
		    <?php if ($legal_links): ?>
	            <ul class="footer-legal-links">
				    <?php foreach ($legal_links as $legal_link): ?>
					    <?php $link = $legal_link['link']; ?>
						<?php if ($link): ?>
							<?php
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
						    <li>
							    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								    <?php echo esc_html($link_title); ?>
							    </a>
						    </li>
			            <?php endif; ?>
				    <?php endforeach; ?>
	            </ul>
	        <?php endif; ?>
		    <?php get_template_part( 'parts/parts-tools/social-links' ); ?>
	    </div>
    </footer>

    <?php wp_footer(); ?>

    </body>
</html>
