  <aside id="aside" class="app-aside hidden-xs bg-brand-1" style="position:fixed; height:100%">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-white text-xs">
                <span></span>
              </li>
              <li>
                <a href="{{ url('dashboard') }}">
                  <i class="glyphicon glyphicon-stats icon text-white"></i>
                  <span class="text-white">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="{{ route('planningrequests') }}">
                  <i class="icon icon-doc icon text-white"></i>
                  <span class="text-white">Planning Requests</span>
                </a>
              </li>
              <li> 
                <a href="{{ route('briefsheets') }}">
                  <i class="icon icon-briefcase icon text-white"></i>
                  <span class="text-white">Brief Sheets</span>
                </a>
              </li>
              @if (Auth::user()->type == 1)
              <li>
                <a href="{{ route('users') }}">
                  <i class="icon icon-user icon text-white"></i>
                  <span class="text-white">Users</span>
                </a>
              </li>
              <li>
                <a href="{{ route('departments') }}">
                  <i class="icon icon-directions icon text-white"></i>
                  <span class="text-white">Departments</span>
                </a>
              </li>
              <li>
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
