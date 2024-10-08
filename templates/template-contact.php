<?php
/*
	Template name: Kontakt
*/
?>

<?php get_header(); ?>
<?php
$top_title = get_the_title();

$top_type_class = 'top-type-image top-type-map';
$contact_data_map = get_field('contact-data-map');
?>
<main class="subpage contact">
	<section class="top <?php echo $top_type_class; ?>" data-zoom="<?php echo $contact_data_map['zoom']; ?>" data-lat="<?php echo $contact_data_map['lat']; ?>" data-lng="<?php echo $contact_data_map['lng']; ?>">
		<div class="container">
			<?php include(locate_template('parts/breadcrumbs.php')); ?>
		</div>
		<div class="container">
			<div class="top-wrapper">
				<div class="top-image top-map"></div>
				<h1 class="top-headline"><?php echo $top_title; ?></h1>
			</div>
		</div>
	</section>

	<section class="contact-data">
		<div class="container">

			<?php $contact_data = get_field('contact-data'); ?>
			<?php if ($contact_data): ?>
				<ul class="contact-data-nav">
					<?php foreach ($contact_data as $index => $contact): ?>
						<li>
							<button
								class="button button-brand button-large js-contact-select<?php echo $index == 0 ? ' select' : ''; ?>"
								data-email="<?php echo $contact['contact-data-email']; ?>"
								data-department="<?php echo sanitize_title($contact['contact-data-department']); ?>"
							>
								<?php echo $contact['contact-data-department']; ?>
							</button>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<h2 class="as-h1"><?php echo get_field('contact-headline'); ?></h2>

			<div class="contact-data-wrap">
				<?php if ($contact_data): ?>
					<ul class="contact-data-addresses">
						<?php foreach ($contact_data as $contact): ?>
							<li id="<?php echo sanitize_title($contact['contact-data-department']); ?>">
								<p><?php echo $contact['contact-data-address']; ?></p>
								<?php $picture = $contact['contact-data-picture']; ?>
								<?php if ($picture): ?>
									<?php echo wp_get_attachment_image( $picture['ID'], 'medium_large', false, [ 'class' => 'contact-picture' ] ); ?>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<div class="contact-data-form">
					<form id="contact-form" class="form">
						<div class="form-field-group form-field-group-text">
							<label for="contact-fullname"><?php echo get_acf_option('contact_form_fullname_label'); ?></label>
							<input type="text" id="contact-fullname" name="contact-fullname" required>
						</div>
						<div class="form-field-group form-field-group-text">
							<label for="contact-email"><?php echo get_acf_option('contact_form_email_label'); ?></label>
							<input type="text" id="contact-email" name="contact-email" required>
						</div>
						<div class="form-field-group form-field-group-text">
							<label for="contact-message"><?php echo get_acf_option('contact_form_message_label'); ?></label>
							<textarea id="contact-message" name="contact-message" rows="4" required></textarea>
						</div>
						<div class="form-field-group form-field-group-checkbox">
							<input type="checkbox" id="contact-consent" name="contact-consent" required>
							<label for="contact-consent"><?php echo get_acf_option('contact_form_consent_content'); ?></label>
						</div>
						<div class="form-field-group">
							<button type="submit" class="form-send button button-brand button-large js-form-send"><?php echo get_acf_option('contact_form_send_label'); ?></button>
							<div class="ajax-info">
								<div class="ajax-loading">
									<div class="loader loader-small"></div>
									<?php echo get_acf_option('contact_form_loading'); ?>
								</div>
								<div class="ajax-success"><?php echo get_acf_option('contact_form_success'); ?></div>
								<div class="ajax-error"><?php echo get_acf_option('contact_form_error'); ?></div>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</section>
</main>

<?php get_footer(); ?>
