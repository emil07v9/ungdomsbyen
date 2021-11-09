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
.dropbtn, button {
	background-color; #04AA6D;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content button {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content button:hover {
	background-color: #ddd;
	}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
	display: block;
	}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
	background-color: #3e8e41;
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
				<h1>Fysiske kurser</h1>

				<!-- DROPDOWNS -->
				<div id="dropdown_maalgruppe" class="dropdown">
				<button class="dropbtn">Målgruppe</button>
				<div class="dropdown-content">
				<button class="valgt" data-maal="alle">Alle</button>
				</div>
				</div>

				<div id="dropdown_tema" class="dropdown">
				<button class="dropbtn">Tema</button>
				<div class="dropdown-content">
				<button class="valgt" data-tema="alle">Alle</button>
				</div>
				</div>

<!-- TEMPLATE -->
<section id="kursus-oversigt"></section>
<template>
	<article class="fysiske_kurser">
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

// const url = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/kursus/?per_page=100";
const siteUrl = "<?php echo esc_url( home_url( '/' ) ); ?>";
let kurser = [];
let tema = [];
let maalgruppe = [];
const liste = document.querySelector("#kursus-oversigt");
const skabelon = document.querySelector("template");
let filterKursus = "ja";
let filterTema = "alle";
let filterMaalgruppe = "alle";
document.addEventListener("DOMContentLoaded", start);

function start () {
 console.log("id er", <?php echo get_the_ID() ?>);
 console.log(siteUrl);
 
getJson();
}

async function getJson() {
	// hent alle costume posttypes retter
	const url = siteUrl + "wp-json/wp/v2/kursus?per_page=100";
	//hent basis temaer
	const temaUrl = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/tema";
	//hent basis målgrupper
	const maalUrl = "http://emilieschultz.dk/kea/09_CMS/wp-json/wp/v2/maalgruppe";
	let response = await fetch(url);
	let temaResponse = await fetch(temaUrl);
	let maalResponse = await fetch(maalUrl);
	kurser = await response.json();
	tema = await temaResponse.json();
	maalgruppe = await maalResponse.json();
	visKurser();
	console.log(kurser);
	opretKnapper();
}

function opretKnapper(){
            
            tema.forEach(tem=>{
				// console.log(tem.id);
                if(tem.name != "Uncategorized"){
                document.querySelector(".dropdown-content").innerHTML += `<button class="filter" data-tema="${tem.id}">${tem.name}</button>`
                }
            })
              indhold.forEach(maal=>{
				  console.log(maal.id);
                document.querySelector(".dropdown-content").innerHTML += `<button class="filter" data-maal="${maal.id}">${maal.name}</button>`
             
            })
            addEventListenersToButtons();
        }

// 		function visKurser() {
// 			kurser.forEach(kursus => {
// 				if (filterKursus == kursus.fysisk) {
// 				const klon = skabelon.cloneNode(true).content;
// 				klon.querySelector("img").src = kursus.oversigtsbillede.guid;
// 				klon.querySelector("h2").textContent = kursus.kursustitel;
// 				klon.querySelector("p").textContent = kursus.kortbeskrivelse;
// 				klon.querySelector(".tema").textContent = kursus.kursustema;
// 				klon.querySelector(".maalgruppe").textContent = kursus.maalgruppe;
// 				klon.querySelector("button").addEventListener("click", ()=>{location.href = kursus.link;
// 				})
// 				liste.appendChild(klon);
// 				}
// 			});
// 		}

// function filtrerKurser() {
// 	filter = this.dataset.kategori;
// 	document.querySelector(".valgt").classList.remove("valgt");
// 	this.classList.add("valgt");
// 	visKurser();
// }

getJson();
</script>
<?php get_footer();
