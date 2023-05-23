@extends('layout.frontend.app')
@section('content')



<section class="section ranking_resultados">
	<div class="limit ranking_resultados__inset">
		<a class="fnRandomImage" href="{{$publicidad4[0]->url}}" data-id="3" href="#">
			<picture class="ultima_transmision__advertise">
				<source media="(max-width:800px)" srcset="/storage/{{$publicidad4[0]->movil}}">
				<img src="/storage/{{$publicidad4[0]->imagen}}" alt="" loading="lazy" />
			</picture>
		</a>
		<div class="ranking_resultados__content">
			<iframe class="ranking_resultados__document" src="/storage/{{$ranking->archivo}}" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<a class="fnRandomImage" href="{{$publicidad4[0]->url}}" data-id="4" href="#">
			<picture class="ranking_resultados__advertise">
				<source media="(max-width:800px)" srcset="/storage/{{$publicidad3[0]->movil}}">
				<img src="/storage/{{$publicidad3[0]->imagen}}" alt="" loading="lazy" />
			</picture>
		</a>
	</div>
</section>

@endsection