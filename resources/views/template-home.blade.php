{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
<section class='full-section flex items-center justify-center relative z-10' id='homeLanding'>
  <div class="absolute video-container">
    <div class='video-filter'></div>
    <video poster="{!! $video_background['poster'] !!}" autoplay="autoplay" loop="loop" muted playsinline preload="auto" defaultMuted>
      <source src="{!! $video_background['video'] !!}" type="video/mp4">
    </video>
  </div>
	<div class='w-11/12 sm:w-2/3 lg:w-1/3 text-center relative z-20'>
		<h1 class=''>@php echo get_bloginfo('description'); @endphp</h1>
		<p class='text-white mx-auto font-bold mb-5 animate__animated animate__fadeInUp'>We're on the frontlines, protecting the unique landmarks and neighborhoods that make up the heart and soul of New York.</p>
		<a href="/who-we-are" class='btn text-white my-4 px-12 inline-block animate__animated animate__fadeInUp'>About Us</a>
	</div>
</section>
<section class='full-section' id="homeWhat" aria-label="What We Do Section"  >
	<div class='container'>
		<div class='text-center'><h2><span class='bg-white'>What We Do</span></h2></div>
		<p class='text-center font-bold xxl:mb-10'>Our work enriches the quality of life for all New Yorkers.</p>
    <div class='flex my-10 flex-wrap'>
      @foreach($service_boxes as $item )
		    @include('partials/trio', $item)
      @endforeach
    </div>
	</div>
</section>
<section class='full-section' id='homeNews' aria-label="The Three most recent news items">
	<div class='container'>
		<div class='text-center'><h2><span class='bg-grey'>News</span></h2></div>
		<p class='text-black text-2xl text-center font-semibold my-3 xxl:mb-10'>Stay informed about the latest preservation issues.</p>
		<div class='flex my-8 flex-wrap'>
      @foreach($news_loop as $item)
        @include('partials/box-news',$item)
      @endforeach
		</div>
    <div class='text-center w-full'>
      <a href="/news" class='archive-link text-black underline font-bold text-lg uppercase hover:no-underline hover:text-red'>View All News<i class="fas fa-chevron-right"></i></a>
    </div>
	</div>
</section>
<section class='full-section' aria-label="The Featured Success Story"  >
  <div class='container'>
    <div class='text-center'><h2><span class='bg-white'>Success Stories</span></h2></div>
    <div class='flex success-box'>
        <div class='w-full p-5 md:p-24 bg-blue-grey my-8'>
          <div class='flex flex-wrap'>
            <div class='w-full lg:w-1/2 flex flex-wrap flex-col lg:pr-8 text-center lg:text-left'>
              <h3 class='lg:mb-10'>{!! $featured_success->title !!}</h3>
              <div class="">
                <a href="{!! $featured_success->link !!}" class='btn bg-red text-white inline-block mb-12 hover:no-underline'>Read The Story</a><br>
              </div>
              <a href="/what-we-do/success-stories" class='archive-link hover:no-underline hover:text-red'>View All Success Stories<i class="fas fa-chevron-right"></i></a>
            </div>
            <div class='box-image w-full lg:w-1/2 lg:text-left text-center'>
              <img src="{!! $featured_success->image !!}" alt="{!! $featured_success->title !!}">
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
<section class='full-section' id='exploreHome' aria-label="The most recent Explore NY Video Landmark"  >
	<div class='container'>
		<div class='text-center'><h2><span class='bg-white'>Explore NY</span></h2></div>
		<p class='text-black font-bold text-center w-full lg:w-1/2 mx-auto xxl:mb-10'>Visit some of New York’s best hidden gems as well as some of the classic iconic landmarks.</p>

    <div class="owl-carousel owl-theme">
      @foreach($landmark as $item)

        @include('partials/landmark-card', $item)

      @endforeach
    </div>
	</div>
</section>
@endsection
