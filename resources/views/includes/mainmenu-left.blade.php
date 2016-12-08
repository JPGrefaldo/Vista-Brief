<?php
if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        return Request::is($path) ? 'active-blue2' : '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? 'active-blue2' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return 'active-blue2';
        }
        return '';
    }
}
?>

  <aside id="aside" class="app-aside hidden-xs bg-brand-1" style="position:fixed; height:100%">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-white text-xs">
                <span></span>
              </li>
              <li class="hover-blue2 {!! classActivePath('dashboard') !!}">
                <a href="{{ route('dashboard') }}">
                  <i class="glyphicon glyphicon-stats icon text-white"></i>
                  <span class="text-white">Dashboard</span>
                </a>
              </li>
              <li class="hover-blue2 {!! classActivePath('planning_request') !!}">
                <a href="{{ route('planningrequests') }}">
                  <i class="icon icon-doc icon text-white"></i>
                  <span class="text-white">Planning Requests</span>
                </a>
              </li>
              <li class="hover-blue2 {!! classActivePath('job_sheet') !!}">
                <a href="{{ route('briefsheets') }}">
                  <i class="icon icon-briefcase icon text-white"></i>
                  <span class="text-white">Brief Sheets</span>
                </a>
              </li>
              @if (Auth::user()->type == 1)
              <li class="hover-blue2 {!! classActivePath('admin/users') !!}">
                <a href="{{ route('users') }}">
                  <i class="icon icon-user icon text-white"></i>
                  <span class="text-white">Users</span>
                </a>
              </li>
              <li class="hover-blue2 {!! classActivePath('admin/departments') !!}">
                <a href="{{ route('departments') }}">
                  <i class="icon icon-directions icon text-white"></i>
                  <span class="text-white">Departments</span>
                </a>
              </li>
              <li class="hover-blue2 {!! classActivePath('admin/clients') !!}">
                <a href="{{ route('clients') }}">
                  <i class="icon icon-users icon text-white"></i>
                  <span class="text-white">Clients</span>
                </a>
              </li>
              @endif
              <li class="line dk"></li>
            </ul>
          </nav>
          <!-- nav -->
        </div>
      </div>
  </aside>

<script>
if(navigator.userAgent.match(/Trident\/7\./)) { // if IE
        $('body').on("mousewheel", function () {
            // remove default behavior
            event.preventDefault(); 

            //scroll without smoothing
            var wheelDelta = event.wheelDelta;
            var currentScrollPosition = window.pageYOffset;
            window.scrollTo(0, currentScrollPosition - wheelDelta);
        });
}
</script>