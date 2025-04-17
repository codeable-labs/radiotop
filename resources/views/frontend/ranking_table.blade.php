@extends('layout.frontend.app')
@section('content')

<section class="section ranking_resultados">
    <div class="limit ranking_resultados__inset">
        <div>
            <a class="fnRandomImage" href="#" data-id="4" href="#">
                <img src="{{ asset('images/bmat_banner.png') }}" alt="Descripción de la imagen" class="banner-image filter-container">
                <img src="{{ asset('images/300x60.jpg') }}" alt="Descripción de la imagen" class="banner-image mobile-only-image">
            </a>
        </div>
        <div class="ranking_resultados__content">
            <div class="container">
                <div class="container_table">
                    <div class="container_title_ranking">
                        <h3>Top 20 - Última Semana</h3>
                        <p>
                            <span>Artistas: Todos / </span>
                            <span>Región: Total / </span>
                            <span>Género: General</span>
                        </p>
                    </div>
    
                    <div class="table-container">
                        <div class="table-header">
                            <div class="table-row">
                                <div class="table-cell">POSICIÓN</div>
                                <div class="table-cell">CANCIÓN</div>
                                <div class="table-cell">ARTISTA</div>
                                <div class="table-cell">IMPACTO*</div>
                                <div class="table-cell">TOCADAS</div>
                            </div>
                        </div>
                        <div class="table-body">
                            @if (count($ranking->music_list) > 0)
                            @foreach ($ranking->music_list as $row)
                            <div class="table-row">
                                <div class="table-cell">#{{$row->position}}</div>
                                <div class="table-cell">{{$row->cancion}}</div>
                                <div class="table-cell">{{$row->artista}}</div>
                                <div class="table-cell">{{$row->impacto}}</div>
                                <div class="table-cell">{{$row->tocadas}}</div>
                            </div>
                            @endforeach
                            @else
                            <div class="table-row">
                                <div class="table-cell" colspan="5">No hay datos disponibles.</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="table-footer">
                    <div class="table-cell" colspan="5">*Impacto: Representado en miles</div>
                </div>
            </div>
        </div>
        <div>
            <a class="fnRandomImage" href="#" data-id="4" href="#">
                <img src="{{ asset('images/banner-de-cpi-1.gif') }}" alt="Descripción de la imagen" class="banner-image">
                <img src="{{ asset('images/300x60.jpg') }}" alt="Descripción de la imagen" class="mobile-only-image">
            </a>
        </div>
    </div>
</section>
@endsection