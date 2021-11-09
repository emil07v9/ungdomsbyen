<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Markup
 */
get_header();
?>
<section id="content" class="site-content posts-container">
    <div class="container">
        <div class="row">
        	<div class="col-sm-12">
				<div class="breadcrumbs-wrap">
					<?php 
					// Breadcrumb hook
					do_action('markup_breadcrumb_options_hook'); ?> 
				</div>
			</div>
			<div id="primary" class="col-md-8 col-lg-9 col-xs-12 content-area mx-auto">
<style>
	@media (min-width: 1000px) {
.content {
	display: grid;
	grid-template-columns: 1fr 1fr;
}
	}
</style>
				<main id="main" class="site-main">
<div id="tilbage_knap">
<button class="tilbage">Tilbage</button>
</div>

<!-- Singleview restAPI start -->
<article id="single_liste">
	<h1 class="overskrift"></h1>
	<section class="content">
	<div class="element1">
<p class="tekst1"></p>
<button class="book_kursus">Book kursus</button>
</div>
<div class="element2">
<figure>
<img class="billede1" src="" alt=""></figure>
</div>

<!-- Infoboks -->

<div class="element3">
<h3>Kursusinformation</h3>
<ul>
<li class="varighed"></li>
<li class="deltagere"></li>
<li class="indhold"></li>
<li class="pris"></li>
<li class="fag"></li>
</ul>
</div>

<!-- Tekster -->
<div class="element4">
<h2 class="titel2"></h2>
<p class="tekst2"></p>
</div>
<div class="element5">
<h2 class="titel3"></h2>
<p class="tekst3"></p>
</div>
<div class="element6">
<h2 class="titel4"></h2>
<p class="tekst4"></p>
</div>
<div class="element7">
<h2 class="titel5"></h2>
<p class="tekst5"></p>
</div>

<!-- Booking og kontakt -->
<div class="element8">
<h2>Booking og kontakt</h2>
<figure class="bookingboks">hej</figure>
</div>
<div class="element9">
<div class="kontaktinfo">
<p class="navn"></p>
<p class="mail"></p>
<p class="telefon"></p>
</div>
<figure>
<img class="billede2" src="" alt=""></figure>
<h4 class="stilling"></h4>
</div>
</article>
</section>



<script>
let kursus;
const Url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;

document.addEventListener("DOMContentLoaded", getJson);
async function getJson() {
	const response = await fetch(Url);
	kursus = await response.json();
	visKursus();
	console.log(kursus);
}

function visKursus() {
document.querySelector(".overskrift").textContent = kursus.kursustitel;
document.querySelector(".tekst1").textContent = kursus.tekst_1;
document.querySelector(".billede1").src = kursus.billede_1.guid;
document.querySelector(".varighed").textContent = "Varighed: " + kursus.fakta_varighed;
document.querySelector(".deltagere").textContent = "Deltagere: " + kursus.fakta_deltagere;
document.querySelector(".indhold").textContent = "Indhold: " + kursus.fakta_indhold;
document.querySelector(".pris").textContent = "Pris: " + kursus.fakta_pris;
document.querySelector(".fag").textContent = "Fag: " + kursus.fag;
document.querySelector(".titel2").textContent = kursus.tekst_2_titel;
document.querySelector(".tekst2").textContent = kursus.tekst_2;
document.querySelector(".titel3").textContent = kursus.tekst_3_titel;
document.querySelector(".tekst3").textContent = kursus.tekst_3;
document.querySelector(".titel4").textContent = kursus.tekst_4_titel;
document.querySelector(".tekst4").textContent = kursus.tekst_4;
document.querySelector(".titel5").textContent = kursus.tekst_5_titel;
document.querySelector(".tekst5").textContent = kursus.tekst_5;
document.querySelector(".navn").textContent = kursus.kontakt_navn;
document.querySelector(".mail").textContent = kursus.kontakt_mail;
document.querySelector(".telefon").textContent = kursus.kontakt_telefon;
document.querySelector(".billede2").src = kursus.kontaktbillede.guid;
document.querySelector(".stilling").textContent = kursus.kontakt_stilling;
}
document.querySelector(".tilbage").addEventListener("click", () => {
	window.history.back();
});

getJson();
</script>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</section>
<section class="">
    <div class="container">
        <div class="row">
        	
		</div>
	</div>
</section>
<?php  get_footer();

