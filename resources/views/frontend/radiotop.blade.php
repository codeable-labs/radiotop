@extends('layout.frontend.app')
@section('content')


<section class="breadcrumb">
	<div class="limit breadcrumb__inset">
		<div class="breadcrumb__tail">
			<a href="/">INICIO</a> / Radio TOP TV</span>
		</div>
		<h3 class="breadcrumb__title">Radio TOP TV</h3>
	</div>
</section>


<section class="section ultima_transmision">
	<div class="limit ultima_transmision__inset">
		<a href="https://www.bmat.com/es/">
			<picture class="ultima_transmision__advertise">
				<source media="(max-width:800px)" srcset="/images/bmat_banner_mobile.png">
				<img src="/images/bmat_banner.png" alt="" loading="lazy" />
			</picture>
		</a>
		<div class="ultima_transmision__content">
			<h3 class="title m--mini">Mira nuestra última transmisión</h3>
			<iframe class="ultima_transmision__video" src="https://www.youtube.com/embed/2_D8K1esSo0" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<a href="https://radiotop.jhonatanweb.com/ranking-resultados.php">
			<picture class="ranking_resultados__advertise">
				<source media="(max-width:800px)" srcset="/images/bmat_banner_mobile.png">
				<img src="/images/banner-de-cpi-1.gif" alt="" loading="lazy" />
			</picture>
		</a>
	</div>
</section>

<section class="section bloques_de_informacion">
	<div class="limit bloques_de_informacion__inset">
		<article class="bloques_de_informacion__article">
			<img src="/images/box_youtube.png" alt="" loading="lazy" class="bloques_de_informacion__article__image" />
			<div class="bloques_de_informacion__article__content">
				<strong class="bloques_de_informacion__article__title">Canal de Youtube</strong>
				<p class="bloques_de_informacion__article__text">Suscríbete a nuestro canal de Youtube para no perderte nuestros últimos vídeos.</p>
				<a href="#" class="button m--black">SUSCRIBIRME</a>
			</div>
		</article>
		<article class="bloques_de_informacion__article">
			<img src="/images/box_ranking.png" alt="" loading="lazy" class="bloques_de_informacion__article__image" />
			<div class="bloques_de_informacion__article__content">
				<strong class="bloques_de_informacion__article__title">Ranking semanal</strong>
				<p class="bloques_de_informacion__article__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
				<a href="/#ranking" class="button m--black">VER RANKING</a>
			</div>
		</article>
	</div>
</section>


@endsection