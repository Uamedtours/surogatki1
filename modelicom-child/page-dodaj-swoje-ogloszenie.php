<?php
/**
 * Template Name: Dodaj swoje ogłoszenie
 */

$form_status = null;

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['ogloszenie_nonce'] ) ) {
	if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ogloszenie_nonce'] ) ), 'ogloszenie_submit' ) ) {
		$fields = array(
			'Imię' => isset( $_POST['ogloszenie_name'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_name'] ) ) : '',
			'Z jakiego kraju' => isset( $_POST['ogloszenie_country'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_country'] ) ) : '',
			'Jakimi językami rozmawia' => isset( $_POST['ogloszenie_languages'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_languages'] ) ) : '',
			'Waga' => isset( $_POST['ogloszenie_weight'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_weight'] ) ) : '',
			'Wzrost' => isset( $_POST['ogloszenie_height'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_height'] ) ) : '',
			'Wiek' => isset( $_POST['ogloszenie_age'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_age'] ) ) : '',
			'Numer telefonu' => isset( $_POST['ogloszenie_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_phone'] ) ) : '',
			'Grupa krwi' => isset( $_POST['ogloszenie_blood'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_blood'] ) ) : '',
			'Miasto' => isset( $_POST['ogloszenie_city'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_city'] ) ) : '',
			'Typ twarzy' => isset( $_POST['ogloszenie_face'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_face'] ) ) : '',
			'Typ wyglądu' => isset( $_POST['ogloszenie_look'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_look'] ) ) : '',
			'Stan cywilny' => isset( $_POST['ogloszenie_marital'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_marital'] ) ) : '',
			'Liczba dzieci' => isset( $_POST['ogloszenie_children'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_children'] ) ) : '',
			'Kolor włosów' => isset( $_POST['ogloszenie_hair'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_hair'] ) ) : '',
			'Wykształcenie' => isset( $_POST['ogloszenie_education'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_education'] ) ) : '',
			'Doświadczenie w programie' => isset( $_POST['ogloszenie_experience'] ) ? sanitize_text_field( wp_unslash( $_POST['ogloszenie_experience'] ) ) : '',
		);

		$message_lines = array();
		foreach ( $fields as $label => $value ) {
			$message_lines[] = $label . ': ' . $value;
		}

		$attachments = array();
		if ( ! empty( $_FILES['ogloszenie_photo']['name'] ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
			$uploaded = wp_handle_upload( $_FILES['ogloszenie_photo'], array( 'test_form' => false ) );
			if ( isset( $uploaded['file'] ) ) {
				$attachments[] = $uploaded['file'];
				$message_lines[] = 'Zdjęcie: załączone w wiadomości';
			} else {
				$message_lines[] = 'Zdjęcie: nie udało się załączyć';
			}
		}

		$subject = 'Nowe ogłoszenie: Dodaj swoje ogłoszenie';
		$body = implode( "\n", $message_lines );

		$mail_sent = wp_mail( 'inbox@uamedtours.com', $subject, $body, array( 'Content-Type: text/plain; charset=UTF-8' ), $attachments );
		$form_status = $mail_sent ? 'success' : 'error';
	} else {
		$form_status = 'error';
	}
}

get_header();
?>

<section class="ls ms s-py-60 s-py-md-90">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="entry-title">Dodaj swoje ogłoszenie</h1>
				<?php if ( 'success' === $form_status ) : ?>
					<div class="alert alert-success" role="alert">Dziękujemy! Twoje ogłoszenie zostało wysłane.</div>
				<?php elseif ( 'error' === $form_status ) : ?>
					<div class="alert alert-danger" role="alert">Wystąpił błąd podczas wysyłki. Spróbuj ponownie.</div>
				<?php endif; ?>
				<form class="form-wrapper big-form c-gutter-30 c-mb-30" method="post" enctype="multipart/form-data">
					<?php wp_nonce_field( 'ogloszenie_submit', 'ogloszenie_nonce' ); ?>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-name">Imię</label>
								<input id="ogloszenie-name" name="ogloszenie_name" type="text" class="form-control" placeholder="Imię" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-country">Z jakiego kraju</label>
								<input id="ogloszenie-country" name="ogloszenie_country" type="text" class="form-control" placeholder="Z jakiego kraju" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-languages">Jakimi językami rozmawia</label>
								<input id="ogloszenie-languages" name="ogloszenie_languages" type="text" class="form-control" placeholder="Jakimi językami rozmawia" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-weight">Waga</label>
								<input id="ogloszenie-weight" name="ogloszenie_weight" type="number" class="form-control" placeholder="Waga" min="0" step="0.1" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-height">Wzrost</label>
								<input id="ogloszenie-height" name="ogloszenie_height" type="number" class="form-control" placeholder="Wzrost" min="0" step="0.1" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-age">Wiek</label>
								<input id="ogloszenie-age" name="ogloszenie_age" type="number" class="form-control" placeholder="Wiek" min="0" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-phone">Numer telefonu</label>
								<input id="ogloszenie-phone" name="ogloszenie_phone" type="tel" class="form-control" placeholder="Numer telefonu" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-blood">Grupa krwi</label>
								<input id="ogloszenie-blood" name="ogloszenie_blood" type="text" class="form-control" placeholder="Grupa krwi" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-city">Miasto</label>
								<input id="ogloszenie-city" name="ogloszenie_city" type="text" class="form-control" placeholder="Miasto" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-face">Typ twarzy</label>
								<input id="ogloszenie-face" name="ogloszenie_face" type="text" class="form-control" placeholder="Typ twarzy" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-look">Typ wyglądu</label>
								<input id="ogloszenie-look" name="ogloszenie_look" type="text" class="form-control" placeholder="Typ wyglądu" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-marital">Stan cywilny</label>
								<input id="ogloszenie-marital" name="ogloszenie_marital" type="text" class="form-control" placeholder="Stan cywilny" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-children">Liczba dzieci</label>
								<input id="ogloszenie-children" name="ogloszenie_children" type="number" class="form-control" placeholder="Liczba dzieci" min="0" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-hair">Kolor włosów</label>
								<input id="ogloszenie-hair" name="ogloszenie_hair" type="text" class="form-control" placeholder="Kolor włosów" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-education">Wykształcenie</label>
								<input id="ogloszenie-education" name="ogloszenie_education" type="text" class="form-control" placeholder="Wykształcenie" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-experience">Doświadczenie w programie</label>
								<input id="ogloszenie-experience" name="ogloszenie_experience" type="text" class="form-control" placeholder="Doświadczenie w programie" required>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group has-placeholder">
								<label for="ogloszenie-photo">Zdjęcie</label>
								<input id="ogloszenie-photo" name="ogloszenie_photo" type="file" class="form-control" accept="image/*">
							</div>
						</div>
					</div>
					<div class="wrap-forms wrap-forms-buttons mt-10 mt-lg-35 mb-1">
						<div class="form-group">
							<button type="submit" class="btn btn-maincolor">Wyślij ogłoszenie</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
