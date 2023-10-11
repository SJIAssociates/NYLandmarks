{{--
  Template Name: 50 at 50
--}}

@extends('layouts.app')

@section('content')

<section id="Landing" class='full-section bg-grey' aria-label="Celebrate 50 at 50" style="background: url({!! $landing['background'] !!}); background-position: center center; background-size: cover;">
  <img src="@asset('images/celebrateLogo.png')" class='celebrate-logo'>
  <div class='intro-copy'>
    <strong class='text-2xl font-bold uppercase'>Fifty Unforgettable stories. Fifty Remarkable Years.</strong>
    <p class='mx-2 text-lg'>{!! $landing['content'] !!}</p>
  </div>
</section>
<section class='main-content py-10' id='introCelebrate' aria-label="Intro">
  <div class='container'>
    <div class='flex flex-wrap'>

      @foreach ($celebrate_trio as $item)
        <div class='celebrate-trio w-full lg:flex-1 text-center items-stretch  flex-wrap flex-col mb-5 lg:mb-0'>
          <a href="#{!! $item['link']!!}" class='block mb-1'>
            <img src="{!! $item['icon']['url'] !!}" alt="{!! $item['title'] !!}" class='mb-5 celebrate-icon'>
            <h3 class='text-3xl text-white '>{!! $item['title'] !!}</h3>
            <p class='text-white w-full mx-auto flex-grow lg:mb-4 lg:text-xl px-5 lg:px-12 mb-0'>{!! $item['description'] !!}</p>
          </a>
        </div>
      @endforeach



    </div>
  </div>
</section>
<section id="celebrateVideo" class='bg-white full-section'>
    <div class="embed-container">
        {!! $video_section['video'] !!}
    </div>
  <div class='container text-center my-5'>
    <strong class='text-black text-2xl mt-5 lg:mt-10 block font-condensed'>{!! $video_section['title']  !!}</strong>
    <p class='text-black mx-auto flex-grow my-4 lg:text-xl xl:px-12'>{!! $video_section['copy'] !!}</p>
  </div>
</section>

<!-- Explore NY Locations -->
<section id="celebrateExplore" class='bg-blue-grey full-section'>
  <div class='container'>
    <img src="@asset('images/celebrate-logo-color.png')" class='event-logo mx-auto block w-3/5 md:w-2/5 lg:w-1/3'>
    <div class='text-center'><h2><span class="bg-blue-grey xxl:text-5xl">Explore the Exhibition</span></h2></div>
    <p class='intro-copy text-center mx-auto mb-8 lg:mb-0'><strong class='text-red'>Explore 50 of our most iconic and memorable successes from borough to borough</strong>, where our work has preserved
  not only physical landmarks, but also the stories and the history behind them, all woven into the fabric of the City we love. There’s no place quite like New York, and we look to the future
  with renewed dedication to preserving its unique architectural heritage.</p>
  </div>
  <div class='container'>
    <div class='filter-container'>
      <?php
       echo do_shortcode( '[facetwp facet="celebration_borough"]' );
       echo do_shortcode( '[facetwp facet="building_type"]' );
       ?>

    </div>
    <div class=''>
        <?php echo do_shortcode( '[facetwp template="celebration_locations"]' ); ?>
    </div>
  </div>
</section>

<!-- Timeline -->
<section id="timeline" class='full-section'
  style="
    background: url(@asset('images/timeline-bg.jpg'));
    background-size: cover;
    background-position: center 10%;">
    <!-- Slider main container -->
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">

        <div class="swiper-slide  buffer-slide" style="cursor: auto">

        </div>

          <div class="swiper-slide" id="timeline-slide-start">
            <img src="@asset('images/slide-1.jpg')">
            <div class='slide-title title-slide'>
              <h3>New York</h3>
              <span>When We Were Founded</span>
            </div>
          </div>

          <div class="swiper-slide intro-slide" id="timeline-slide-start">
            <img src="@asset('images/intro-slide.jpg')">
            <div class='slide-title title-slide'>
              <span>The New York Landmarks Conservancy was founded in 1973. Explore the 70's when New York was defined by crises and opportunities.</span>
            </div>
          </div>

          @foreach ($timeline as $item)
            <div class="swiper-slide">
              <div class='close-state'>
                @if ( !empty($item['card_image']) )
                  <img src="{!! $item['card_image']['url'] !!}" alt="{!! $item['title'] !!}">
                @endif
                <div class='slide-title'>
                  <h3>{!! $item['year'] !!}</h3>
                  <span>{!! $item['title'] !!}</span>
                </div>
              </div>
              <div class='open-state'>
                  <div class='image-container'>
                    @if( !empty($item['story_image']))
                    <img src="{!!  $item['story_image']['url'] !!}">
                  @endif
                  </div>
                  {{-- <div class="hidden" id="closeSlide">X</div> --}}
                  <h3 class='text-black'>{!! $item['title'] !!}, <span class='year'>{!! $item['year'] !!}</span></h3>
                  <div class='text-black'>
                    {!! $item['content'] !!}
                  </div>
                  <span class='slide-caption'>Photo: {!!  $item['story_image']['caption'] !!}</span>

              </div>

            </div>
          @endforeach

      </div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

    </div>
</section>
<!-- Events -->
<section id="celebrateEvents" class='bg-blue-grey full-section'>
    <div class="container">
      <div class='text-center'><h2><span class="bg-blue-grey">Events</span></h2></div>
      <p class='text-center w-3/4 lg:w-3/5 mx-auto lg:text-xl'>Explore the <em>50 at 50</em> exhibition by attending one of our public events.</p>

    <div class="flex my-8 flex-wrap justify-center py-5 lg:py-0">
      @foreach($events_loop as $item)
        @include('partials/box-events',$item)
      @endforeach
    </div>
    <div class='text-center w-full'>
      <a href="/events" class='archive-link text-black underline font-bold text-lg uppercase hover:no-underline hover:text-red'>View All Events<i class="fas fa-chevron-right"></i></a>
    </div>
    </div>
</section>

<section id="celebrateCredits" class='full-section'>
  <div class="container">
    <div class='text-center'><h2><span class='bg-white'>Credits</span></h2></div>
    <div class='flex flex-wrap py-5 xxl:py-10 mx-auto xl:w-4/5'>
          <div class='w-1/2 md:w-1/3 text-black'>
            <div class='credit-group'>
              <p class='font-bold mb-0 font-condensed'>Photography</p>
              <span class='block'>Noël Sutherland</span>
              <sub>(Except where noted)</sub>
            </div>
          </div>
          <div class='w-1/2 md:w-1/3 text-black'>
            <div class='credit-group'>
              <p class='font-bold mb-0 font-condensed'>Curators</p>
              <span class='block'>Donald Albrecht</span>
              <span class='block'>Thomas Mellins </span>
            </div>
          </div>
          <div class='w-full md:w-1/3 text-black'>
            <div class='credit-group'>
              <p class=''>Branding Web Design</p>
              <span class=''>SJI Associates</span>
            </div>
          </div>
      </div>
  </div>
</section>
@endsection
