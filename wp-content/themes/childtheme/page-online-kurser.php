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
				<article class="knapper">
				<nav>
				<button data-kategori="Alle" class="valgt">Alle</button>
				<button data-kategori="Grundskole">Grundskole</button>
				<button data-kategori="Efterskole">Efterskole</button>
				<button data-kategori="Ungdomsuddannelse">Ungdomsuddannelse</button>
				<button data-kategori="Undervisere & ledere">Undervisere & ledere</button>
				<button data-kategori="Kommuner">Kommuner</button>
				<button data-kategori="FNs 17 Verdensmål">FNs 17 Verdensmål</button>
				<button data-kategori="Konflikthåndtering">Konflikthåndtering</button>
				<button data-kategori="LGBTQ+ og normer">LGBTQ+ og normer</button>
				<button data-kategori="Demokrati og medborgerskab">Demokrati og medborgerskab</button>
				<button data-kategori="Økonomi">Økonomi</button>
				<button data-kategori="Uddannelsesvalg">Uddannelsesvalg</button>
				</nav></article>
<section id="kursus-oversigt"></section>
<template>
	<article class="online_kurser">
	<div class="column1">
	<img src="" alt="">
	</div>
	<div class="column2">
		<h2></h2>
		<p></p>
		</div>
		<div class="column3">
		<h4 class="tema"></h4>
		<h4 class="maalgruppe"></h4>
		<button>Læs mere</button>
		</div>
	</article>
</template>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</section>
<script>
console.log("Hip hurra");
let kurser = [];
const liste = document.querySelector("#kursus-oversigt");
const skabelon = document.querySelector("template");
let filterKursus = "nej";
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
		if (filterKursus == kursus.fysisk) {
		const klon = skabelon.cloneNode(true).content;
		klon.querySelector("img").src = kursus.oversigtsbillede.guid;
		klon.querySelector("h2").textContent = kursus.kursustitel;
		klon.querySelector("p").textContent = kursus.kortbeskrivelse;
		klon.querySelector(".tema").textContent = kursus.kursustema;
		klon.querySelector(".maalgruppe").textContent = kursus.maalgruppe;
		klon.querySelector("button").addEventListener("click", ()=> {
			location.href = kursus.link;
		})
		liste.appendChild(klon);
		}
	})
}

function start () {
 const filterKnapper = document.querySelectorAll(".knapper nav button");
 filterKnapper.forEach((knap)=> knap.addEventListener("click", filtrerKurser));
getJson();
}

function filtrerKurser() {
	filter = this.dataset.kategori;
	document.querySelector(".valgt").classList.remove("valgt");
	this.classList.add("valgt");
	visKurser();
}
</script>
<?php get_footer();
