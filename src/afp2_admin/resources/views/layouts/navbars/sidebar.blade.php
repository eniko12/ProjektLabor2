<div id="left_sidebar" class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('AFP2 ADMIN') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <!--li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li-->
        <li class="nav-item{{ $activePage == 'customers' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('customers') }}">
                <i class="material-icons">face</i>
                <p>{{ __('Customers') }}</p>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'books' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('books') }}">
                <i class="material-icons">book</i>
                <p>{{ __('books') }}</p>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'orders' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('orders') }}">
                <i class="material-icons">list</i>
                <p>{{ __('orders') }}</p>
            </a>
        </li>
    </ul>
  </div>
</div>
