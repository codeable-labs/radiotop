@extends('layout.frontend.app')
@section('content')

<section class="anuncia_con_nosotros">
	<div class="limit anuncia_con_nosotros__inset">
		<div class="anuncia_con_nosotros__content">
			<div class="anuncia_con_nosotros__breadcrumb">
				<a href="/">INICIO</a> / <span>Anuncia con nosotros</span>
			</div>
			<div class="anuncia_con_nosotros__content__inset">
				<h1 class="anuncia_con_nosotros__content__title">Anuncia con nosotros</h1>
				<p class="anuncia_con_nosotros__content__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam tempore consectetur eaque nemo voluptatum similique molestias quis maxime ullam.</p>
				<dl class="anuncia_con_nosotros__content__list">
					<dt>+3.5k</dt>
					<dd>Lorem ipsum dolor, sit amet consectetur adipisicing elit A doloribus debitis.</dd>
					<dt>25%</dt>
					<dd>Sit amet consectetur adipisicing elit. A doloribus debitis ipsum in sit cum maxime.</dd>
				</dl>
			</div>
			<span></span>
		</div>
		<div class="anuncia_con_nosotros__wrapper-form">
			<form action="{{route('home.contacto')}}" method="post" data-tipo="show_thanks" class="anuncia_con_nosotros__form @if(!session('info')) -active- @endif ">
				@csrf
				<strong class="anuncia_con_nosotros__form__title">Déjanos tus datos y te llamaremos</strong>
				<label class="anuncia_con_nosotros__form__label">
					<input class="anuncia_con_nosotros__form__input" type="text" name="full_name" value="" required>
					<span class="anuncia_con_nosotros__form__label__title">Nombres y Apellidos</span>
				</label>
				<label class="anuncia_con_nosotros__form__label">
					<input class="anuncia_con_nosotros__form__input" type="email" name="email" value="" required >
					<span class="anuncia_con_nosotros__form__label__title">Correo electrónico</span>
				</label>
				<label class="anuncia_con_nosotros__form__label">
					<input class="anuncia_con_nosotros__form__input" type="text" name="business_name" value="" required>
					<span class="anuncia_con_nosotros__form__label__title">Nombre de la empresa</span>
				</label>
				<label class="anuncia_con_nosotros__form__label m--x2">
					<input class="anuncia_con_nosotros__form__input" type="tel" name="ruc" value="" required minlength="11" maxlength="12">
					<span class="anuncia_con_nosotros__form__label__title">RUC</span>
				</label>
				<label class="anuncia_con_nosotros__form__label m--x2 m--select">
					<select class="anuncia_con_nosotros__form__input" name="sector">
						<option value="">Seleccionar</option>
						<option value="Opción 1">Opción 1 lorem ipsum vamonos</option>
						<option value="Opción 2">Opción 2</option>
					</select>
					<span class="anuncia_con_nosotros__form__label__title">Sector</span>
				</label>
				<div class="anuncia_con_nosotros__form__actions">
					<p class="anuncia_con_nosotros__form__legal">Al enviar acepto que he leído los <a href="#" target="_blank">términos y condiciones</a></p>
					<button  type="submit" class="button m--black">ENVIAR</button>
					
				</div>
			</form>



			<div id="thanks_message" class="anuncia_con_nosotros__thanks @if(session('info')) -active- @endif ">
				<strong class="anuncia_con_nosotros__thanks__title">¡Gracias por tu interés!</strong>
				<p class="anuncia_con_nosotros__thanks__text">Pronto nos pondremos en contacto contigo</p>
			</div>
		</div>
	</div>
</section>



@endsection