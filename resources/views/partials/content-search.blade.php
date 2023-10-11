<article @php post_class('search-card lg:p-12') @endphp>
  <div class='search-card_content w-full md:w-1/2'>
    <header>
      <h2 class="entry-title text-2xl lg:text-4xl"><a href="{{ get_permalink() }}" class='text-black hover:text-primary'>{!! get_the_title() !!}</a></h2>
      @if (get_post_type() === 'post')
        @include('partials/entry-meta')
      @endif
    </header>
    <div class="entry-summary lg:text-lg lg:mb-12 mr-5">
      @php the_excerpt() @endphp
    </div>
  </div>
  <div class='w-full md:w-1/2'>
        {!! the_post_thumbnail(); !!}
  </div>

</article>
