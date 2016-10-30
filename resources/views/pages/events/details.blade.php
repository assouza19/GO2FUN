@extends('layouts.panel')
@section('title', $event->name)
@section('content')
    <div class="content event">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 event-img">
                    <img src="{{ $event->image_url['full'] }}" alt="">
                    <a href="javascript:;"><i class="fa fa-search-plus"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="event-description">
                        <blockquote>
                            <p>{{ $event->description }}</p>
                        </blockquote>
                        <blockquote>
                            <p>Valor: R$ {{ $event->value }}</p>
                            <p>Início: {{ $event->init }}</p>
                            <p>Término: {{ $event->end }}</p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="event-params text-right">
                        <div class="event-params-stars" style="margin-bottom: 15px;">
                            <h4 style="margin-bottom: 0;">
                                <i class="fa fa-comments"></i>
                                Comentários
                            </h4>
                            <span style="font-size: 24px;">45</span>
                        </div>
                        <div class="event-params-stars" style="margin-bottom: 15px;">
                            <h4 style="margin-bottom: 0;">
                                <i class="fa fa-star" style="color: gold;"></i>
                                Avaliação
                            </h4>
                            <span style="font-size: 24px;">4.5</span>
                        </div>
                        <div class="event-params-confirmeds">
                            <h4 style="margin-bottom: 0;">
                                <i class="fa fa-group"></i>
                                Confirmados
                            </h4>
                            <span style="font-size: 24px;">{{ $event->total_confirmeds }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="event-actions">
                        <blockquote>
                            <div class="event-actions-confirm" style="margin-bottom: 15px">
                                @if( $event->is_confirmed )
                                    <span class="text-success">Você está confirmado</span>
                                @else
                                    <a data-event="{{ $event->id  }}" data-id="{{ Auth::user()->id }}" href="javascript:;" class="btn btn-success js-confirm" role="button">Confirmar Presença</a>
                                @endif
                            </div>
                            <div class="event-actions-evaluate">
                                <h4>Avaliar evento</h4>
                                <div class="event-eval-stars">
                                    <a href="javascript:;" data-star="1"><i class="fa fa-star"></i></a>
                                    <a href="javascript:;" data-star="2"><i class="fa fa-star"></i></a>
                                    <a href="javascript:;" data-star="3"><i class="fa fa-star"></i></a>
                                    <a href="javascript:;" data-star="4"><i class="fa fa-star"></i></a>
                                    <a href="javascript:;" data-star="5"><i class="fa fa-star"></i></a>
                                    <span class="js-number-stars text-success"></span>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .event-img {
        width: 100%;
        float: left;
        height: 200px;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
    }

    .event-img img {
        width: 100%;
        float: left;
    }

    .event-img a {
        position: absolute;
        left: 30px;
        top: 15px;
        z-index: 999;
        font-size: 21px;
        color: #fff;
        background: #2A3F54;
        padding: 5px 10px;
    }

    .js-number-stars {
        padding-left: 15px;
    }
</style>
@endpush

@push('scripts')
<script>
    (function($) {
        $('.event-eval-stars a').mouseover(function() {
            var star = $(this).data('star');
            if( star == 1 ) {
                $('.js-number-stars').text('1 estrela');
            } else {
                $('.js-number-stars').text( star + ' estrelas');
            }


        }).mouseout(function() {
            $('.js-number-stars').text('');
        });
    })(jQuery);
</script>
@endpush
