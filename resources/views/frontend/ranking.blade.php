@extends('layout.frontend.app')
@section('content')



<section class="section ranking_resultados">
	<div class="limit ranking_resultados__inset">
		<a href="{{$publicidad4[0]->url}}">
			<picture class="ultima_transmision__advertise">
				<source media="(max-width:800px)" srcset="/storage/{{$publicidad4[0]->imagen}}">
				<img src="/storage/{{$publicidad4[0]->imagen}}" alt="" loading="lazy" />
			</picture>
		</a>
		<div class="ranking_resultados__content">
			<iframe class="ranking_resultados__document" src="/storage/{{$ranking->archivo}}" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<a href="{{$publicidad4[0]->url}}">
			<picture class="ranking_resultados__advertise">
				<source media="(max-width:800px)" srcset="{{$publicidad3[0]->imagen}}">
				<img src="/storage/{{$publicidad3[0]->imagen}}" alt="" loading="lazy" />
			</picture>
		</a>
	</div>
</section>

@endsection