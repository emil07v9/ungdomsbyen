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
	.valgt{
		background-color: #7184AB;
	}
	
.dropbtn, button {
	background-color: #415079;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
	cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content1, .dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #7184AB;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content1 button {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  width: 12rem;
}

.dropdown-content2 button {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  width: 12rem;
}

/* Change color of dropdown links on hover */
.dropdown-content1 button:hover{
	background-color: #7184AB;

}

	.dropdown-content2 button:hover{
	background-color: #7184AB;
	}


/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content1 {
	display: block;
	}

	.dropdown:hover .dropdown-content2 {
	display: block;
	}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
	background-color: #7184AB;
	}

.læs_mere {
	border-radius: 12px;
}

.læs_mere:hover {
background-color: #7184AB;
}
	
/* Vis hele filtreringsmenu */
	main{
		margin-bottom: 5rem;
	}

#introtekst p {
	margin: 1rem;
}

.column3 {
	padding-bottom: 1rem;
}

.online_kurser {
box-shadow: 0px 0px 10px 3px rgba(0,0,0,0.35);
}

img {
	padding-top: 1rem;
}

.posts-container {
    margin-top: 60px;
    overflow: visible;
    border-top: 1px solid #e5e5e5;
    border-bottom: 1px solid #e5e5e5;
}

@media (min-width: 1000px) {
	.online_kurser {
	display: grid;
	grid-template-columns: 1fr 2fr 1fr;
	margin-bottom: 1.5rem;
}

img {
	padding-top: 0rem;
}

#introtekst {
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
				<h1>ONLINE KURSER</h1>
<section id="introtekst">
<p>Ungdomsbyen har i flere år lavet fysiske kurser for både lærere og elever. Nu har vi taget det bedste fra vores kurser og lavet webinar og workshops online.</p>
<p>Herunder ser du vores udvalg af online kurser. Scroll ned for at se alle udbud af kurser eller brug vores filtrering til at finde det helt perfekte kursus for dig.</p>
</section>
<!-- DROPDOWNS -->
				<div id="dropdown_maalgruppe" class="dropdown">
				<button class="dropbtn">Målgruppe</button>
				<div class="dropdown-content1">
				<button class="valgt" data-maal="alle">Alle</button>
				</div>
				</div>

				<div id="dropdown_tema" class="dropdown">
				<button class="dropbtn">Tema</button>
				<div class="dropdown-content2">
				<button class="valgt" data-tema="alle">Alle</button>
				</div>
				</div>

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
		<button class="læs_mere">Læs mere</button>
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
const url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/kursus/?per_page=100";
let kurser = [];
let tema = [];
let maalgruppe = [];
const liste = document.querySelector("#kursus-oversigt");
const skabelon = document.querySelector("template");
let filterKursus = "nej";
let filterTema = "alle";
let filterMaalgruppe = "alle";
document.addEventListener("DOMContentLoaded", start);

function start() {
console.log("id er", <?php echo get_the_ID() ?>);
 console.log(url);
 getJson();
}

async function getJson() {
	//hent basis temaer
	const temaUrl = "https://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/tema";
	//hent basis målgrupper
	const maalUrl = "https://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/maalgruppe";
	const response = await fetch(url);
	let temaResponse = await fetch(temaUrl);
	let maalResponse = await fetch(maalUrl);
	kurser = await response.json();
	tema = await temaResponse.json();
	maalgruppe = await maalResponse.json();
	visKurser();
	console.log(tema);
	opretKnapper();
}

function opretKnapper(){
            
            tema.forEach(tem=>{
                if(tem.name != "Uncategorized"){
                document.querySelector(".dropdown-content2").innerHTML += `<button class="filter" data-tema="${tem.id}">${tem.name}</button>`
                }
            })
              maalgruppe.forEach(maal=>{
                document.querySelector(".dropdown-content1").innerHTML += `<button class="filter" data-maal="${maal.id}">${maal.name}</button>`
             
            })
            addEventListenersToButtons();
        }

function visKurser() {
			liste.textContent = "";
			kurser.forEach(kursus => {
				if (filterKursus == kursus.fysisk) {
				if ((filterTema === "alle" || kursus.tema.includes(parseInt(filterTema))) && (filterMaalgruppe === "alle" || kursus.maalgruppe.includes(parseInt(filterMaalgruppe)))) {
				const klon = skabelon.cloneNode(true).content;
				klon.querySelector("img").src = kursus.oversigtsbillede.guid;
				klon.querySelector("h2").textContent = kursus.kursustitel;
				klon.querySelector("p").textContent = kursus.kortbeskrivelse;
				klon.querySelector(".tema").textContent = kursus.kursustema;
				klon.querySelector(".maalgruppe").textContent = kursus.klassetrin;
				klon.querySelector("article").addEventListener("click", ()=>{location.href = kursus.link;
				})
				liste.appendChild(klon);
				}
				}
			});
			console.log(kurser);
		}

function addEventListenersToButtons() {
	document.querySelectorAll(".dropdown-content2 button").forEach(elm => {
		elm.addEventListener("click", filtreringTema);
	})
	document.querySelectorAll(".dropdown-content1 button").forEach(elm => {
		elm.addEventListener("click", filtreringMaalgruppe);
	})
	// console.log("line berner");
}

function filtreringTema() {
	filterTema = this.dataset.tema;
	//fjern .valgt fra alle
	document.querySelectorAll(".dropdown-content2 .filter").forEach(elm => {
		elm.classList.remove("valgt");
	});

	//tilføj .valgt til den valgte
	this.classList.add("valgt");
	visKurser();
}

function filtreringMaalgruppe() {
	filterMaalgruppe = this.dataset.maal;
	console.log(filterMaalgruppe)
	//fjern .valgt fra alle
	document.querySelectorAll(".dropdown-content1 .filter").forEach(elm => {
		elm.classList.remove("valgt");
	});

	//tilføj .valgt til den valgte
	this.classList.add("valgt");
	visKurser();
}
</script>
<?php get_footer();
