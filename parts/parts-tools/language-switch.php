<?php
$languages_list = pll_languages_list();
$current_language = pll_current_language();
?>
<div class="language-switch">
	<button class="lang-toggle js-lang-toggle" aria-label="<?php echo get_acf_option('aria_lang_select') . implode(', ', $languages_list); ?>">
		<?php echo $current_language; ?>
	</button>
	<ul class="lang-list js-lang-list">
		<li>
			<a href="https://rohhe.pl" aria-label="<?php echo get_acf_option('aria_lang_switch_to') . 'PL'; ?>">
				PL
			</a>
		</li>
		<li>
			<a href="https://rohhe.com" aria-label="<?php echo get_acf_option('aria_lang_switch_to') . 'EN'; ?>">
				EN
			</a>
		</li>
		<li>
			<a href="https://rohhe.de" aria-label="<?php echo get_acf_option('aria_lang_switch_to') . 'DE'; ?>">
				DE
			</a>
		</li>
	</ul>
</div>