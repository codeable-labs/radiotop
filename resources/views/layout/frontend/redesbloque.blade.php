<section class="section bloques_de_informacion">
	<div class="limit bloques_de_informacion__inset">
		<article class="bloques_de_informacion__article">
			<img src="/images/box_youtube.png" alt="" loading="lazy" class="bloques_de_informacion__article__image" />
			<div class="bloques_de_informacion__article__content">
				<strong class="bloques_de_informacion__article__title">Canal de Youtube</strong>
				<p class="bloques_de_informacion__article__text">{{@$bloques[0]->descripcion}}</p>
				<a href="{{$bloques[0]->enlace}}" target="{{$bloques[0]->tipo_enlace==1?'_blank':'_self'}}" class="button m--black">SUSCRIBIRME</a>
			</div>
		</article>
		<article class="bloques_de_informacion__article">
			<img src="/images/box_ranking.png" alt="" loading="lazy" class="bloques_de_informacion__article__image" />
			<div class="bloques_de_informacion__article__content">
				<strong class="bloques_de_informacion__article__title">Ranking semanal</strong>
				<p class="bloques_de_informacion__article__text">{{@$bloques[1]->descripcion}}</p>
				<a href="{{$bloques[1]->enlace}}"   target="{{$bloques[1]->tipo_enlace==1?'_blank':'_self'}}" class="button m--black">VER RANKING</a>
			</div>
		</article>
	</div>
</section>