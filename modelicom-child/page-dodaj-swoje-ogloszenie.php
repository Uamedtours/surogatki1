<?php
/**
 * Template Name: Dodaj swoje ogłoszenie
 */

get_header();
?>

<section class="ls ms s-py-60 s-py-md-90">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="entry-title">Dodaj swoje ogłoszenie</h1>
				<form class="form-wrapper big-form c-gutter-30 c-mb-30" method="post" enctype="multipart/form-data">
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
