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
		<a href="{{$publicidad4[0]->url}}">
			<picture class="ultima_transmision__advertise">
				<source media="(max-width:800px)" srcset="/storage/{{$publicidad4[0]->movil}}">
				<img src="/storage/{{$publicidad4[0]->imagen}}" alt="" loading="lazy" />
			</picture>
		</a>
		<div class="ultima_transmision__content">
			<h3 class="title m--mini">Mira nuestra última transmisión</h3>
			<iframe class="ultima_transmision__video" src="{{$bloques[4]->enlace}}" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<a href="{{$publicidad3[0]->url}}">
			<picture class="ranking_resultados__advertise">
				<source media="(max-width:800px)" srcset="/storage/{{$publicidad3[0]->movil}}">
				<img src="/storage/{{$publicidad3[0]->imagen}}" alt="" loading="lazy" />
			</picture>
		</a>
	</div>
</section>

@include('layout.frontend.redesbloque')


@endsection