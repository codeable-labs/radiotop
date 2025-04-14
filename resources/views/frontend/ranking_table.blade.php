@extends('layout.frontend.app')
@section('content')

<section class="section ranking_resultados">
	<div class="limit ranking_resultados__inset">
		<a class="fnRandomImage" href="#" data-id="4" href="#">
		</a>
		<div class="ranking_resultados__content">
			<div class="container_table">
				<div class="container_title_ranking">
					<h3>Top 20 - Última Semana</h3>
					<p>
						<span>Artistas: Todos / </span>
						<span>Región: Total / </span>
						<span>Género: General</span>
					</p>
				</div>
				
				<table>
					<thead>
						<tr>
							<th>POSICIÓN</th>
							<th>CANCIÓN</th>
							<th>ARTISTA</th>
							<th>IMPACTO*</th>
							<th>TOCADAS</th>
						</tr>
					</thead>
					<tbody>
            @if (count($ranking->music_list) > 0)
            @foreach ($ranking->music_list as $row)
            <tr>
                <td>#{{$row->position}}</td>
                <td>{{$row->cancion}}</td>
                <td>{{$row->artista}}</td>
                <td>{{$row->impacto}}</td>
                <td>{{$row->tocadas}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No hay datos disponibles.</td>
            </tr>
            @endif
					</tbody>
					
					<tfoot>
						<tr>
							<td colspan="5">*Impacto: Representado en miles</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<a class="fnRandomImage" href="#" data-id="4" href="#">
		</a>
	</div>
</section>
@endsection