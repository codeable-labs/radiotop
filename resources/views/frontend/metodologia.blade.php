@extends('layout.frontend.app')
@section('content')

<section class="section metodologia">
	<div class="limit m--mini">

		@foreach ($metodos as $metodo )

		<article class="metodologia__block fnAcordeonItem">
			<header class="metodologia__block__header fnButtonShowAcordeon">
				<h2 class="metodologia__block__header__title">{{$metodo->titulo}}</h2>
				<div class="metodologia__block__header__button"></div>
			</header>
			<div class="metodologia__block__content">
				{!! $metodo->contenido !!}
			</div>
		</article>
		<hr class="metodologia__break" />

		@endforeach

	
	</div>
</section>

@include('layout.frontend.redesbloque')




@endsection