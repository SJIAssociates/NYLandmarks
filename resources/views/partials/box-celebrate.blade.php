<div class='celebrate-card' data-loop='{!! $loop->index !!}'>
  <a href="{!! $permalink !!}" class='pre-hover' title="Read more about {!! $item['title'] !!}">
    <img src="{!! $thumbnail !!}" alt="{!! $title !!}"/>
    <div class="card-content w-100 bg-red bottom-0 p-5">
      <h3 class='text-white mb-0 text-lg'>{!! $title !!}</h3>
      <p class='mb-0 capitalize'>{!! $borough !!}</p>
    </div>
    <span>{!! $genre !!}</span>
  </a>
  <div class='hover-state'>
    <h3 class='text-black mb-0'>{!! $title !!}</h3>
    <p class=''>{!! $content !!}</p>
    <a href="{!! $permalink !!}" class=''>Learn More <i class="fas fa-chevron-right"></i></a>
  </div>
</div>
