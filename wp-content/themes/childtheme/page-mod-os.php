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
h1 {
	margin-top: 3rem;
	margin-bottom: 3rem;
}

img {
	margin-top: 1rem;
	margin-bottom: 1rem;
}

.mod_os {
	max-width: 500px;
	margin-bottom: 2rem;
	box-shadow: 0px 0px 10px 3px rgba(0,0,0,0.35);
	padding: 1rem;
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

.intro {
	margin-bottom: 1rem;
}

#medarbejder-oversigt {
	margin-bottom: 4rem;
}

@media (min-width: 1000px) {
#medarbejder-oversigt {
display: grid;
grid-template-columns: 1fr 1fr;
	}

	.intro {
	display: grid;
	grid-template-columns: 1fr 1fr;
}

p {
	padding-right: 2rem;
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
				<article class="intro">
				<p>Ungdomsbyen består af et stærkt hold af både nye og erfarne kræfter. Vi hylder mangfoldighed uanset alder, køn, race, etnicitet, seksuel orientering, funktionsvariationer, m.m. Her på siden finder du information på alle vores nuværende medarbejdere.

Udover Ungdomsbyens medarbejdere kan du også her finde bestyrelsen. </p>
<p>Bestyrelsen består af repræsentanter af Ungdomsbyens interessentkreds og nedsættes for et år ad gangen. Disse kan du genkende ved de grønne billeder.

Ligger du inde med spørgsmål til nogle af disse, skal du ikke tøve med at kontakte. Vi sidder klar til at hjælpe og vejlede.</p>
</article>
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
