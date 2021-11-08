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
				<main id="main" class="site-main">
<div id="tilbage_knap">
<button>Tilbage</button>
</div>

<!-- Singleview restAPI start -->
<section>
<article id="single_liste">
<h1></h1>
<p class="tekst1"></p>
<button class="book_kursus">Book kursus</button>
<figure class="billede1">
<img src="" alt=""></figure>

<!-- Infoboks -->
<div class="infoboks">
<h3>Kursusinformation</h3>
<ul>
<li class="varighed">Varighed:</li>
<li class="deltagere">Deltagere:</li>
<li class="indhold">Indhold:</li>
<li class="pris">Pris:</li>
<li class="fag">Fag:</li>
</ul>
</div>

<!-- Tekster -->
<h2 class="titel2"></h2>
<p class="tekst2"></p>
<h2 class="titel3"></h2>
<p class="tekst3"></p>
<h2 class="titel4"></h2>
<p class="tekst4"></p>
<h2 class="titel5"></h2>
<p class="tekst5"></p>

<!-- Booking og kontakt -->
<h2>Booking og kontakt</h2>
<figure class="bookingboks"></figure>
<div class="kontaktinfo">
<p class="navn"></p>
<p class="mail"></p>
<p class="telefon"></p>
</div>
<figure class="billede2">
<img src="" alt=""></figure>
<h4 class="stilling"></h4>
</article>
</section>



<script>
const url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/kursus/?per_page=100";
const urlParams = new URLSearchParams(windom.location.search);
const id = urlParams.get("id");
let kursus;

document.addEventlistener("DOMContentLoaded", getJson);
async function getJson() {
	const response = await fetch(url + id, options);
	kursus = await response.json();
	visKursus();
	console.log(kursus)
}

function visKurus() {
document.querySelector("h1").textContent = kursus.kursustitel;
document.querySelector(".tekst1").textContent = kursus.tekst_1;
document.querySelector(".billede1").src = kursus.billede_1.guid;
document.querySelector(".varighed").textContent = kursus.fakta_varighed;
document.querySelector(".deltagere").textContent = kursus.fakta_deltagere;
document.querySelector(".indhold").textContent = kursus.fakta_indhold;
document.querySelector(".pris").textContent = kursus.fakta_pris;
document.querySelector(".fag").textContent = kursus.fag;
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
document.querySelector("button").addEventlistener("click", () => {
	window.history.back();
});

</script>
</main>
<?php get_footer();
