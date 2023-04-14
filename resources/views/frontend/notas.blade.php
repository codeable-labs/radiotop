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



<section class="section notas_de_prensa">
	<div class="limit m--mini">
		
		@foreach ($notas as $item)
			
		
		<article class="notas_de_prensa__item">
			<figure class="notas_de_prensa__item__figure">
				<img class="notas_de_prensa__item__figure__image" src="/storage/{{$item['imagen']}}" alt="" />
				<figcaption class="notas_de_prensa__item__figure__date"><b>{{$item['dia']}}</b><span></span>{{$item['mes']}}</figcaption>
			</figure>
			<div class="notas_de_prensa__item__content">
				<h3 class="notas_de_prensa__item__content__title">{{$item['titulo']}}</h3>
				<p class="notas_de_prensa__item__content__text">{{$item['descripcion']}}</p>
				<a href="/storage/{{$item['archivo']}}" download class="button m--black">DESCARGAR PDF</a>
			</div>
		</article>

		@endforeach
		
		
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