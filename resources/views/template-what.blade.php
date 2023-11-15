{{--
  Template Name: What We Do
--}}

@extends('layouts.app')

@section('content')

  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <span class='mx-auto block font-bold text-black text-center text-xl mt-5 px-3'>Our work enriches the quality of life for all New Yorkers.</span>
    <div class='container'>
      <div class='w-full md:w-2/3 xxl:w-1/2 mx-auto mb-10 xl:text-2xl '>
        @include('partials.content-page')
      </div>
    </div>
  @endwhile
<section class='full-section' id="homeWhat" aria-label="NYLC Services Section"  >
  	<div class='container flex flex-wrap'>
      @foreach($service_boxes as $item )
		    @include('partials/trio', $item)
      @endforeach
  	</div>
  </section>
  
  
<!-- <section class='full-section bg-blue-grey' aria-label="Most Recent Success Stories" >
  <div class='container'>
    <div class="text-center">
		  <h2><span class='bg-blue-grey'>50th Anniversary</span></h2>
    </div>
     <div class='flex success-box'>
        <div class='flex w-full p-12 xl:p-24 bg-white my-8'>
          <div class='flex-1 w-full sm:w-1/2 flex flex-col pr-8 justify-center'>
      		    <h3 class='xxl:text-4xl xxl:pr-10'>Celebrate the New York Landmarks Conservancy's 50th anniversary by experiencing the 50 at 50 exhibition.</h3>
      		    <div class="">
        		    <a href="/celebrate-50-at-50/" class='btn bg-red text-white inline-block hover:no-underline'>Explore Exhibit</a><br>
      		    </div>
      		  </div>
          <div class='flex-1 w-full sm:w-1/2'>
          <div class='grow-box'>
        		  <img src="@asset('images/location-placeholder.jpg')" alt="">
            </div>
      		</div>
       </div>
      </div>
        
  </div>    
</section> -->


<section class='full-section bg-blue-grey' aria-label="Most Recent Success Stories"  >
  <div class='container'>
    <div class="text-center">
		  <h2><span class='bg-blue-grey'>Success Stories</span></h2>
    </div>
    <p class='font-bold text-center w-3/4 lg:w-3/5 mx-auto lg:text-2xl'>
      With your support, we’re proud to celebrate a history of accomplishments since our founding in 1973.
    </p>
    @foreach($success_stories_loop as $item)
      @include('partials/box-success', $item)
    @endforeach

    <a href="/what-we-do/success-stories/" class='archive-link underline text-black mx-auto block w-1/2 text-center uppercase font-bold hover:text-primary'>View all Success Stories <i class='fa fa-chevron-right'></i></a>
  </div>
</section>

@endsection
