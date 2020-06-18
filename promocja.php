<!DOCTYPE html>
<html>
<head lang="pl-PL">
	<meta charset="UTF-8">
	<!--Page Title-->
	<title>Konwersatorium Muzyczne w Warszawie - Promocja</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<!--Favicon-->
	<link rel="shortcut icon" href="/images/favicon.ico" title="Favicon" />
	<!-- Main CSS Files -->
	<link rel="stylesheet" href="/css/style.css?v=<?= filemtime("css/style.css") ?>">
	<!-- Namari Color CSS -->
	<link rel="stylesheet" href="/css/namari-color.css">
	<!--Icon Fonts - Font Awesome Icons-->
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<!-- Animate CSS-->
	<link href="/css/animate.css" rel="stylesheet" type="text/css">
	<!--Google Webfonts-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!-- Youtube Movies CSS-->
	<link href="/css/youtube-gallery.css" rel="stylesheet" type="text/css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status" class="la-ball-triangle-path">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!--End of Preloader-->
	<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
		<div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
		<div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
		<div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
		<div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
	</div>
	<!--Wrapper-->
	<div id="wrapper">
		<header id="banner" class="scrollto clearfix landing-page" data-enllax-ratio=".5">
			<?php include 'menu.php' ?>
			<!--Banner Content-->
			<div id="banner-content" class="row clearfix transp-background">
				<div class="col-38">
					<div class="section-heading">
						<h1>Konwersatorium Muzyczne</h1>
						<h2>Kreatywna szkoła rozbudzająca miłość do muzyki dla dzieci i dorosłych</h2>
					</div>
					<!--Call to Action-->
					<a href="#kontakt" class="button color-white border-gold" id="call-to-action">Spróbuj i umów się<br />na pierwszą lekcję próbną!</a>
					<!--End Call to Action-->
				</div>
			</div>
			<!--End of Row-->
		</header>
		<!--Main Content Area-->
		<main id="content">
			<!--Introduction-->
			<section id="promocja" class="introduction scrollto">
				<!--Promocja-->
				<div class="secondary-color text-center clearfix" style="margin-bottom: 20px;">
					<div class="row clearfix">
						<div class="col-1">
							<div class="section-heading">
								<h2 class="section-title">Promocja<br>specjalnie dla Ciebie</h2>				
							</div>
							<div class="padding-150 wow fadeInUp" data-wow-delay="0.4s">
								

<p>Zapisz się już teraz na wrzesień 2019. Nie czekaj, bo liczba miejsc jest ograniczona.<br><br><b>ZACZNIJ GRAĆ I SPEŁNIJ MARZENIA.</b><br><br>
<a href=" https://youtu.be/r6ThuFthhsE "> Zobacz 2 minutowy film o nas na YT</a><br><br>

- specjalny program dla dorosłych od podstaw<br>
- nie trzeba mieć własnego instrumentu<br>
- 20-letnie doświadczanie<br>
- nowoczesne, skuteczne metody<br>
- zajęcia do 22:00 w centrum Warszawy<br><br>
Kod rabatowy, jaki otrzymałeś w wiadomości obowiązuje przy zapisie na naukę w danej klasie - instrument lub śpiew<br>dla dziecka albo dorosłego na wrzesień 2019.<br><br>

Już dziś zarezerwuj spotkanie aby zobaczyć szkołę i porozmawiać o nauce:<br> 
zadzwoń: 883 489 184<br>
napisz: <a href="mailto:sekretariat@konwersatoriummuzyczne.pl">sekretariat@konwersatoriummuzyczne.pl</a><br><br>

pozdrawiam i do zobaczenia<br>
Bogna Kołodziej<br>
dyrektor Konwersatorium Muzycznego

</p>


</li>
										</ol>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<!--End of Polityka Prywatnosci-->
			</section>
			<section>
				<div>
					<ul class="partners">
						<li><img src="/images/partnerzy/partner1.jpg" /></li>
						<li><img src="/images/partnerzy/partner2.jpg" /></li>
						<li><img src="/images/partnerzy/partner3.jpg" /></li>
						<li><img src="/images/partnerzy/partner4.jpg" /></li>
						<li><img src="/images/partnerzy/partner5.jpg" /></li>
						<li><img src="/images/partnerzy/partner6.jpg" /></li>
						<li><img src="/images/partnerzy/partner7.jpg" /></li>
					</ul>
				</div>
			</section>

			<section id="kontakt" class="scrollto text-center" data-enllax-ratio=".2">
				<div class="section-heading">
					<h3>KONTAKT</h3>
					<h2 class="section-title">Jak nas znaleźć?</h2>
				</div>
				<div class="row clearfix">
					<div class="col-2">
						<div class="google-maps">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4887.590899055631!2d21.009294!3d52.228934!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471eccf2e795e4bb%3A0xdab272eb2a228b21!2sAleje+Jerozolimskie+47%2C+Warszawa%2C+Poland!5e0!3m2!1sen!2spl!4v1504094526830" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-2">
						<form id="ajax-contact" method="post" action="/mailer.php">
							<div class="field">
								<input type="text" id="name" name="name" placeholder="Twoj imię" required>
							</div>
							<div class="field">
								<input type="email" id="email" name="email" placeholder="Adres email" required>
							</div>
							<div class="field">
								<textarea id="message" name="message" placeholder="Twoja wiadomość..." required></textarea>
							</div>
							<div class="g-recaptcha" data-sitekey="6LePgS8UAAAAACsBnGlHt1kk4lZrlxsvQFsy8GQR">
							</div>
							<div class="field">
								<button id="button" class="button" type="submit">Wyślij</button>
							</div>
						</form>
						<div id="form-messages">
							<p></p>
						</div>
					</div>
				</div>
				<div id="address" class="row clearfix">
					<div class="col-3">
						<p><strong>Adres korespondencyjny:</strong></p>
						<p>Aleje Jerozolimskie 47/20
						<br/>00-697, Warszawa
						<br />Polska</p>
					</div>
					<div class="col-3">
						<p><strong>Główna siedziba:</strong></p>
						<p>wejście ul. Poznańska 39 domofon 20, piąte piętro
						<br /> vis a vis wejścia do Hotelu Polonia
						<br />tuż obok Pałacu Kultury i Nauki oraz Metra Centrum</p>
						<p>poniedziałek-sobota 12:00 – 21:00</p>
						<p><strong>I Filia:</strong></p>
						<p>Prywatne Szkoły im. Cecylii Plater-Zyberkówny
						<br />ulica Piękna 24/26</p>
						<p>poniedziałek-piątek 15:00-19:00</p>
						<p>
					</div>
					<div class="col-3">
						<p><strong>Prosimy o wcześniejszy kontakt telefoniczny:</strong></p>
						<p>+48 22 628 01 13
						<br />+48 883 489 184</p>
					</div>
				</div>
			</section>
		</main>
		<!--End Main Content Area-->
		<!--Footer-->
		<footer id="landing-footer" class="clearfix">
			<div class="row clearfix">
			<!--Social Icons in Footer-->
				<ul class="col-1 social-icons textr\-right">
					<li>
						<a target="_blank" title="facebook" href="https://www.facebook.com/konwersatoriummuzyczne/">
						<i class="fa fa-facebook fa-1x"></i><span>facebook</span>
						</a>
					</li>
					<li>
						<a target="_blank" title="YouTube" href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA">
						<i class="fa fa-youtube fa-1x"></i><span>youtube</span>
						</a>
					</li>
				</ul>
			<!--End of Social Icons in Footer-->
			</div>
		</footer>
		<!--End of Footer-->
	</div>
	<!--End of Wrapper-->
<!-- Include JavaScript resources -->
<script src="/js/jquery.1.8.3.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/featherlight.min.js"></script>
<script src="/js/featherlight.gallery.min.js"></script>
<script src="/js/jquery.enllax.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/jquery.stickyNavbar.min.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/images-loaded.min.js"></script>
<script src="/js/lightbox.min.js"></script>
<script src="/js/site.js"></script>
<script src="/js/contact.js"></script>
<script src="/js/stats.js"></script>
<script src="/js/youtube-modal.js"></script>
</body>
</html>