<?php
$document_id = get_the_ID();
$document_taxonomy = 'rodzaj';

$document_terms = get_the_terms($document_id, $document_taxonomy);

$document_term_id = $document_terms[0]->term_id;
$document_term_name = $document_terms[0]->name;

$document_term_icon = get_field('document-type-icon', $document_taxonomy . '_' .$document_term_id);

$document_product = get_field('document-product');
$document_product_name = $document_product[0]->post_title;

$document_file = get_field('document-file');
?>

<div class="document-excerpt">
	<?php
	if ($document_term_icon): ?>
		<?php echo wp_get_attachment_image($document_term_icon['ID'], 'fullhd', false, [ 'class' => 'document-excerpt-icon' ]); ?>
	<?php endif; ?>

	<div class="document-excerpt-type document-excerpt-button"><?php echo $document_term_name; ?></div>

	<div class="document-excerpt-product document-excerpt-button"><?php echo $document_product_name; ?></div>

	<?php if ($document_file): ?>
		<ul class="document-excerpt-links">
			<li>
				<a href="<?php echo $document_file['url']; ?>" target="_blank" download>
					<img src="<?php echo get_template_directory_uri(); ?>/resources/img/icon-doc-download.jpg" alt="">
					<span><?php echo get_acf_option('trans_doc_download'); ?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo $document_file['url']; ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/img/icon-doc-open.jpg" alt="">
					<span><?php echo get_acf_option('trans_doc_open'); ?></span>
				</a>
			</li>
		</ul>
	<?php endif; ?>
</div>