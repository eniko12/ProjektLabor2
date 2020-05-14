<div class="wrapper ">
  @include('layouts.navbars.sidebar')
  <div id="content_main_panel" class="main-panel main-panel-calcwidth">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>
