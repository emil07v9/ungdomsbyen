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
<style>
article {
	max-width: 500px;
	margin: 2rem;
	box-shadow: 10px 10px 17px -9px #888888;
}

.tilbage {
	background-color: #415079;
	color: white;
	padding-left: 2rem;
	padding-top: 1rem;
	padding-right: 2rem;
	padding-bottom: 1rem;
	border-radius: 12px;
	text-decoration: underline;
	border: none;
}

.tilbage:hover {
	background-color: #7184AB;
	color: white;
}

#first {
	margin-bottom: 3rem;
}

@media (min-width: 1000px) {
#medarbejder-oversigt {
display: grid;
grid-template-columns: 1fr 1fr;
	}
}

</style>
<section id="content" class="site-content posts-container">
    <div class="container">
        <div class="row">
			<div class="breadcrumbs-wrap">
				<?php do_action('markup_breadcrumb_options_hook'); ?> <!-- Breadcrumb hook -->
			</div>
			<div id="primary" class="col-md-8 col-lg-9 col-xs-12 content-area mx-auto">
				<main id="main" class="site-main">
				<section id="first">
				<a href="http://emilieschultz.dk/kea/09_CMS/kontakt-os/" class="tilbage">TILBAGE</a>
				</section>
				<h1>MØD OS</h1>
<section id="medarbejder-oversigt"></section>
<template id="skabelon">
	<article class="mod_os">
	<img src="" alts="">
	<h3></h3>
	<p class="stilling"></p>
	<p class= "kurser"></p>
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
const skabelon = document.querySelector("#skabelon");
// let filter = "ja";
document.addEventListener("DOMContentLoaded", start);

function start() {
}

const url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/medarbejder/?per_page=100";
async function getJson() {
	const response = await fetch(url);
	medarbejdere = await response.json();
	visMedarbejder();
	console.log(medarbejder);
}

function visMedarbejder() {
	medarbejdere.forEach(medarbejder => {
// if (filter == medarbejder.bestyrelse) {
		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("img").src = medarbejder.billede.guid;
		klon.querySelector("h3").textContent = medarbejder.navn;
		klon.querySelector(".stilling").textContent = medarbejder.stilling;
		klon.querySelector(".kurser").textContent = medarbejder.kurser;
		klon.querySelector(".email").textContent = medarbejder.email;
		klon.querySelector(".telefon").textContent = medarbejder.telefon;
		liste.appendChild(klon);
// }
	})
}

getJson();
</script>
<?php get_footer();
