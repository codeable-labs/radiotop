@extends('layout.frontend.app')

@section('content')
<section class="section banner_principal">
	<div class="limit">
		<h1 class="banner_principal__title">
			Descubre las canciones <br><strong>más escuchadas</strong> del Perú
		</h1>
		<div class="banner_principal__articles">
			@foreach ($banners as $k=> $banner)

			<article class="banner_principal__article {{$k%2==0?'m--blue':'m--orange'}}">
				<img src="/storage/{{$banner->imagen}}" alt="" class="banner_principal__article__image">
				<div class="banner_principal__article__content">
					<div class="banner_principal__article__inside">
						<!-- <strong class="banner_principal__article__number"></strong> -->
						<strong class="banner_principal__article__title">{{$banner->titulo}}</strong>
						<p class="banner_principal__article__text"><strong>{{$banner->autor}}</strong> {{$banner->cancion}}</p>
						
						<!--<a href="/#ranking" class="button m--black fnSetRanking" data-ranking='input[value="todos"],input[value="total"],input[value="anglo"]'>VER RANKING</a>-->
						<a 
							href="/#ranking" 
							class="button m--black fnSetRanking" 
							data-ranking='input[name="artistas"][value="{{strtolower(@$banner->register->artist->id)}}"],input[name="region"][value="{{strtolower(@$banner->register->region->id)}}"],input[name="genero_musical"][value="{{strtolower(@$banner->register->gender->id)}}"]'
							>VER RANKING</a>
					
					</div>
				</div>
			</article>
			@endforeach
			
		</div>
		<div class="banner_principal__sponsors">
			<strong class="">Gracias a:</strong>
			<a href="https://www.bmat.com/es/" target="_blank"><img src="/images/bmat.svg" alt="BMAT" /></a>
			<a href="https://www.cpi.pe" target="_blank"><img src="/images/cpi.svg" alt="CPI" /></a>
		</div>
	</div>
</section>

<section id="ranking" class="section ranking">
	<div class="limit">
		<div class="title-wrapper">
			<h2 class="title">Conoce los rankings semanales</h2>
			<p class="resume">Selecciona el género y la región para visualizar el último ranking.</p>
		</div>
		<div class="ranking__form" >
			<div class="ranking__form__block fnRegionOptions">
				<strong class="ranking__form__block__title">Artistas</strong>
				<div class="ranking__form__block__options">
					
					<!--foreach ($artistas as $key => $value) : -->
					@foreach ($artistas as $row)										
						<label class="ranking__form__block__option">
							<input type="radio" name="artistas" value="{{$row->id}}" class="fnRankingOption input__artista">
							<span class="button m--white">{{$row->nombre}}</span>
						</label>
					@endforeach
					<!--endforeach-->
				</div>
			</div>
			<div class="ranking__form__block fnRegionOptions">
				<strong class="ranking__form__block__title">Región</strong>
				<div class="ranking__form__block__options">
					
					<!--foreach ($regiones as $key => $value) -->
					@foreach ($regiones as $row)	
					<label class="ranking__form__block__option">
						<input type="radio" name="region" value="{{$row->id}}" class="fnRankingOption input__region">
						<span class="button m--white">{{$row->nombre}}</span>
					</label>
					@endforeach
					<!-- endforeach; -->
				</div>
			</div>
			<div class="ranking__form__block fnGeneroMusicalOptions">
				<strong class="ranking__form__block__title">Género músical</strong>
				<div class="ranking__form__block__options">
					
					<!-- foreach ($generos_musicales as $key => $value) : -->
					@foreach ($generos as $row)	
					<label class="ranking__form__block__option">
						<input type="radio" name="genero_musical" value="{{$row->id}}" class="fnRankingOption input__genero">
						<span class="button m--white">{{$row->nombre}}</span>
					</label>
					@endforeach
					<!-- endforeach -->
				</div>
			</div>
			<div class="ranking__form__block m--result m--empty fnRankingResults">
				<div class="ranking__form__block__result-empty">
					<img src="/images/ico_ranking_default.svg" alt="">
					<p>Aquí podrás ver o descargar el ranking que estás buscando.</p>
				</div>
				<div class="ranking__form__block__result-data">
					<figure class="ranking__form__block__result-data__figure">
						<img class="fnRankingGenderImage" src="/images/anglo.png" alt="">
						<figcaption>
							<strong class="fnRankingName">General</strong>
							<span class="fnRankingDate">Febrero 2023</span>
						</figcaption>
					</figure>
					<div class="ranking__form__block__result-data__buttons">
						<a href="#" class="button m--black fnRankingButtonDetail">VER RANKING</a>
						<a href="#" download class="button m--white fnRankingButtonDownload">DESCARGAR</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section video_radiotop">
	<div class="limit">
		<h3 class="title">Radio TOP TV</h3>
		<div class="video_radiotop__content">
			<iframe class="video_radiotop__video" src="{{$bloques[4]->enlace}}" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<div class="video_radiotop__advertises">
				<picture class="video_radiotop__advertise">
					<source media="(max-width:800px)" srcset="/storage/{{$publicidad1[0]->imagen}}">
					<img src="/storage/{{$publicidad1[0]->imagen}}" alt="" loading="lazy" />
				</picture>
				<picture class="video_radiotop__advertise">
					<source media="(max-width:800px)" srcset="/storage/{{$publicidad2[0]->imagen}}">
					<img src="/storage/{{$publicidad2[0]->imagen}}" alt="" loading="lazy" />
				</picture>
			</div>
		</div>
	</div>
</section>
@endsection 