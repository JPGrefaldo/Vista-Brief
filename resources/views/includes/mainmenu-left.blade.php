  <aside id="aside" class="app-aside hidden-xs bg-brand-1">
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
                <a href="{{ route('briefs') }}">
                  <i class="glyphicon glyphicon-envelope icon text-white"></i>
                  <span class="text-white">Brief Sheets</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="glyphicon glyphicon-envelope icon text-white"></i>
                  <span class="text-white">Planning Requests</span>
                </a>
              </li>
              <li>
                <a href="{{ url('users') }}">
                  <i class="glyphicon glyphicon-envelope icon text-white"></i>
                  <span class="text-white">Users</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="glyphicon glyphicon-envelope icon text-white"></i>
                  <span class="text-white">Departments</span>
                </a>
              </li>
              <li class="line dk"></li>
            </ul>
          </nav>
          <!-- nav -->
        </div>
      </div>
  </aside>