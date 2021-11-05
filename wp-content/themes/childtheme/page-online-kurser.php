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
img {
  width: 200px;
  height: auto;
}
</style>
				<main id="main" class="site-main">
				<h1>Online kurser</h1>
<section id="kursus-oversigt"></section>
</main>
<template>
	<article>
	<img src="" alt="">
		<h2></h2>
		<p></p>
		<h4 class="tema"></h4>
		<h4 class="maalgruppe"></h4>
		<button>Læs mere</button>
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
let kurser = [];
const liste = document.querySelector("#kursus-oversigt");
const skabelon = document.querySelector("template");
let filter = "nej";
document.addEventListener("DOMContentLoaded", start);

function start() {
}
const url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/kursus/?per_page=100";
async function getJson() {
	const response = await fetch(url);
	kurser = await response.json();
	visKurser();
	console.log(kurser)
}
function visKurser() {
	kurser.forEach(kursus => { 
		if (filter == kursus.fysisk) {
		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("img").src = kursus.oversigtsbillede.guid;
		klon.querySelector("h2").textContent = kursus.kursustitel;
		klon.querySelector("p").textContent = kursus.kortbeskrivelse;
		klon.querySelector(".tema").textContent = kursus.kursustema;
		klon.querySelector(".maalgruppe").textContent = kursus.maalgruppe;
		klon.querySelector("button");
		liste.appendChild(klon);
		}
	})
}

getJson();
</script>
<?php get_footer();
