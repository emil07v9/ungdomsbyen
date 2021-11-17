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
button {
	background-color: #415079;
	color: white;
	padding-left: 2rem;
	padding-top: 1rem;
	padding-right: 2rem;
	padding-bottom: 1rem;
	border-radius: 12px;
	text-decoration: underline;
	border: none;
	cursor: pointer;
	margin-bottom: 1rem;
}

article {
	margin-bottom: 3rem;
}

button:hover {
background-color: #7184AB;
}

	#element8 .navn{
		font-weight: bold;
	}

	.bookingboks2 {
		display: none;
	}

@media (min-width: 1000px) {
	#single_liste{
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 1rem;
	}
	
	h1, #element6{
		grid-column: 1/3;
	}

	.bookingboks1 {
		display: none;
	}

	.bookingboks2 {
		display: inline;
	}
}
</style>
				<main id="main" class="site-main">
<section id="tilbage_knap">
<button class="tilbage">TILBAGE</button>
</section>

<!-- Singleview restAPI start -->
<article id="single_liste">
	<h1 class="overskrift"></h1>
	
		
<article id="element1">
	<p class="tekst1"></p>
	<button class="book_kursus">BOOK KURSUS</button>
</article>
		
<article id="element2">
	<figure>
	<img class="billede1" src="" alt=""></figure>
</article>

<!-- Infoboks -->

<article id="element3">
	<h3>Kursusinformation</h3>
	<ul>
	<li class="varighed"></li>
	<li class="deltagere"></li>
	<li class="indhold"></li>
	<li class="pris"></li>
	<li class="fag"></li>
	</ul>
</article>

<!-- Tekster -->
<article id="element4">
	<h2 class="titel2"></h2>
	<p class="tekst2"></p>
</article>
		
<article id="element5">
	<h2 class="titel3"></h2>
	<p class="tekst3"></p>
</article>

<!-- Booking og kontakt -->
<article id="element6">
	<h2>Booking og kontakt</h2>
	<img class="bookingboks1" src="kalender_booking_lille" alt="kalender">
	<img class="bookingboks2" src="kalender_booking" alt="kalender">
</article>
	
<article id="element7">
	<figure>
	<img class="billede2" src="" alt="">
	</figure>
</article>

<article id="element8">
		<h4 class="overskrift">Brug for yderligere kontakt?</h4>
		<p class="navn"></p>
		<p class="stilling"></p>
		<p class="mail"></p>
		<p class="telefon"></p>
</article>

					
</article>



<script>
let kursus;
const Url = "https://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;

document.addEventListener("DOMContentLoaded", getJson);
async function getJson() {
	const response = await fetch(Url);
	kursus = await response.json();
	console.log(kursus);
	visKursus();
	
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
// document.querySelector(".bookingboks").src = kursus.booking_boks.guid;
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

