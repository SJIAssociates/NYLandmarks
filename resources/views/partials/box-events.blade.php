<div class='news-card w-full md:mx-5 lg:flex-1 lg:max-w-1/3' data-loop='{!! $loop->index !!}'>
  <a href="{!! $permalink !!}" class='card-image' title="Read more about {!! $item['title'] !!}">
    <img src="{!! $thumbnail !!}" alt="{!! $title !!}"/>
  </a>
  <div class=" card-content">
    <time class='text-primary mb-3 uppercase font-bold block'>{!! $time !!}</time>
    <h3 class='mb-3 xxl:mb-5 text-xl xl:text-2xl xxl:text-4xl '><a href="{!! $permalink !!}" class="text-black hover:text-primary">{!! $title !!}</a></h3>
    <p>{!! $content !!}</p>
  </div>
  <a href="{!! $permalink !!}" class='btn bg-red text-white text-center absolute' title="Read more about {!! $item['title'] !!}">Find Out More</a>
</div>
