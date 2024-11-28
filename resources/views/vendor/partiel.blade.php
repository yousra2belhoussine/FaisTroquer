<div id="featured-offers" class="flex flex-col my-4 ml-2 mr-2 md:mr-24 md:ml-24 pb-12">
    {{-- <div id="featured-offers" class="flex flex-col my-4 ml-2 mr-2 md:mr-24 md:ml-24 pb-12"> --}}
    <div id="featured-offers-title" class="flex justify-between">
        <h4>Offres en vedette</h4>
        <div class="flex  ">
            <i class="owl-carousel__prev pl-2 fa fa-long-arrow-left"></i>
            <i class="owl-carousel__next pl-2 fa fa-long-arrow-right"></i>
            les offres

        </div>
    </div>
    <div id="featured-offers-container" class="owl-carousel owl-six" data-inner-pagination="true"
        data-white-pagination="true" data-nav="false" data-autoPlay="true">

        @for ($i = 0; $i < count($featuredOffers); $i++)
            <div class=" grow-0 shrink-0 @if ($i > 0)  @endif h-full" style="width: 100%;">
                <x-offer-present-card :offer=$featuredOffers[$i]></x-offer-present-card>
            </div>
        @endfor

    </div>

    @if (count($featuredOffers) > 3)
        <div class="col-span-full d-flex items-center justify-end">
            <a class="more-btn" style="font-size:14px;margin:0" href="{{ route('alloffers.index') }}">Voir
                plus<i class="pl-2 fa fa-long-arrow-right"></i></a>
        </div>
    @endif
</div>




</div>

<div id="recent-offers" class="flex flex-col  ml-2 mr-2 md:mr-24 md:ml-24 pb-12">
    <div id="recent-offers-title" class="flex justify-between">
        <h4>Plus récentes</h4>
        <div class="flex">
            <i class="owl-carousel__prev pl-2 fa fa-long-arrow-left"></i>
            <i class="owl-carousel__next pl-2 fa fa-long-arrow-right"></i>

        </div>

    </div>
    <div id="recent-offers-container" class="owl-carousel owl-six" data-inner-pagination="true"
        data-white-pagination="true" data-nav="false" data-autoPlay="true">
        @for ($i = 0; $i < count($recentOffers); $i++)
            <div class=" grow-0 shrink-0 @if ($i > 0)  @endif h-full" style="width: 100%;">
                <x-offer-present-card :offer=$recentOffers[$i]></x-offer-present-card>
            </div>
        @endfor
    </div>


    @if (count($recentOffers) > 3)
        <div class="col-span-full d-flex items-center justify-end">
            <a class="more-btn" style="font-size:14px;margin:0"
                href="{{ route('alloffers.index', ['sort_by' => 'latest']) }}">Voir plus<i
                    class="pl-2 fa fa-long-arrow-right"></i></a>
        </div>
    @endif
</div>
