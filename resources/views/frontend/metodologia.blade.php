@extends('layout.frontend.app')
@section('content')

<section class="breadcrumb">
	<div class="limit breadcrumb__inset">
		<div class="breadcrumb__tail">
			<a href="/">INICIO</a> / Metodología</span>
		</div>
		<h3 class="breadcrumb__title">Metodología</h3>
	</div>
</section>

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