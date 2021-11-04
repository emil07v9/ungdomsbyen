<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markup
 */
get_header();
?>
<section id="content" class="site-content posts-container">
    <div class="container">
        <div class="row">
			<div class="breadcrumbs-wrap">
				<?php do_action('markup_breadcrumb_options_hook'); ?> <!-- Breadcrumb hook -->
			</div>
			<div id="primary" class="col-md-8 col-lg-9 col-xs-12 content-area mx-auto">
			<style>
			/* img {
  width: 200px;
  height: auto;
} */
</style>
				<main id="main" class="site-main">
				<h1>Mød os</h1>
<section id="medarbejder-oversigt"></section>
</main>
<template>
	<article>
	<img src="" alt="">
	<h3></h3>
	<p class="stilling"></p>
	<p class="email"></p>
	<p class="telefon"></p>
	</article>
</template>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<script>
console.log("Hip hurra");
let medarbejdere = [];
const liste = document.querySelector("#medarbejder-oversigt");
const skabelon = document.querySelector("template");
document.addEventListener("DOMContentLoaded", start);

function start() {
}

const url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/medarbejder";
async function getJson() {
	const response = await fetch(url);
	medarbejdere = await response.json();
	visMedarbejdere();
	console.log(medarbejdere);
}
function visMedarbejdere() {
	medarbejdere.forEach(medarbejder => {
		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("img").src = medarbejder.billede.guid;
		klon.querySelector("h3").textContent = medarbejder.navn;
		klon.querySelector(".stilling").textContent = medarbejder.stilling;
		klon.querySelector(".email").textContent = medarbejder.email;
		klon.querySelector(".telefon").textContent = medarbejder.telefon;
		liste.appendChild(klon);
	})
}

getJson();
</script>
<?php get_footer();
