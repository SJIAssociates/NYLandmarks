<header class="banner bg-primary" aria-label="Main Navigation"  >
  <div class="px-8 mx-auto">
    <div class='flex items-start'>
      <div class='flex row items-center flex-grow'>
          <a class="brand" href="{{ home_url('/') }}" label="Logo for the NYLC. Link to the Homepage">
            <img src="{!! $logo['url'] !!}" alt="Logo for the New York Landmark Conservancy" width="180">
          </a>
        <nav class="nav-primary">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
          @endif
        </nav>
      </div>
      <div class='header-btns text-right'>
        {!! get_search_form() !!}
        <a href="/join" class='btn-join text-sm hover:bg-white hover:text-primary'>Join / Renew</a>
        <a href="/donate" class='btn btn-donate hover:bg-primary hover:text-white border-2 border-primary hover:border-white'>Donate</a>
      </div>
      <button id='mobile-menu' class='lg:hidden menu-toggle' type='button'>
        <span class='bar top'></span>
        <span class='bar middle'></span>
        <span class='bar bottom'></span>
        <span class='menu-title text-white'>Menu</span>
      </button>
    </div>
  </div>
</header>
