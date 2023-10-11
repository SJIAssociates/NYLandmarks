@if ( $header_image != false && !is_single() && !is_search() )
<section class='img-bg' style="background-color: #ddd; background-image: url({{ $header_image }});">
  <h1 class='text-center text-white text-4xl xl:text-5xl xxl:w-1/2 animate__animated animate__fadeInUp'>{!! App::title() !!}</h1>
</section>
  @if( get_page_template_slug() != 'views/template-ssoh.blade.php' && !is_singular('tribe_events') )
    <div class="container">
    {!! $breadcrumbs !!}
    </div>
    @endif
@else

  @if ( is_singular('landmark') )
   {!! $tour_video!!}
  @endif

  @if ( is_singular('location') )
    @php the_post_thumbnail() @endphp
  @endif

  @if( get_page_template_slug() != 'views/template-portal.blade.php' && !is_singular('tribe_events') )
    <div class="container">
    {!! $breadcrumbs !!}
    </div>
  @endif

  @if( is_singular('location') )
    <section class='page-title py-5 xxl:py-10 text-center xxl:pb-5'>
      <h1 class='text-center text-black text-4xl xl:text-5xl mx-auto mb-0'>{!! App::title() !!}</h1>
    </section>
  @elseif( !is_singular('tribe_events'))
    <section class='page-title py-5 xxl:py-10 text-center'>
      <h1 class='text-center text-black text-4xl xl:text-5xl xl:w-1/2 mx-auto'>{!! App::title() !!}</h1>
      @if(is_singular('staff') )<span class="text-primary font-bold block uppercase my-2"><?php the_staff_title(); ?></span> @endif
    </section>
  @endif
@endif
