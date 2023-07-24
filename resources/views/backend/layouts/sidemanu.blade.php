      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview
          @if (Request::route()->getPrefix() === '/dashboard')
                  {{ 'menu-open' }}
                  @elseif(Request::route()->getPrefix() === '/dashboard/users')
                  {{ 'menu-open' }}
                  @endif
          ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User managment
                <i class="fas fa-angle-left right pt-1"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.user.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.user.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.user.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.user.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.profile.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.profile.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.profile.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.profile.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User profile</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview
          @if (Request::route()->getPrefix() === '/dashboard/setup/student')
                  {{ 'menu-open' }}
                  @elseif(Request::route()->getPrefix() === '/dashboard/setup/student/fee')
                  {{ 'menu-open' }}
                  @endif
          ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setups managment
                <i class="fas fa-angle-left right pt-1"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.class.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.class.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.class.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.class.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student class</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview
          @if (Request::route()->getPrefix() === '/dashboard/nid')
                  {{ 'menu-open' }}
                  @elseif(Request::route()->getPrefix() === '/dashboard/setup/student/fee')
                  {{ 'menu-open' }}
                  @endif
          ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                NID managment
                <i class="fas fa-angle-left right pt-1"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.zilla.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.zilla.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.zilla.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.zilla.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zilla</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.upozilla.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.upozilla.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.upozilla.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.upozilla.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upo Zilla</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.address.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.address.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.address.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.address.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Address</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.bloodgroup.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.bloodgroup.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.bloodgroup.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.bloodgroup.edit')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blood group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.information.index') }}" class="nav-link
                  @if (Route::current()->getName() =='backend.information.index')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.information.create')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.information.edit')
                  {{ 'active' }}
                  @elseif(Route::current()->getName() =='backend.information.show')
                  {{ 'active' }}
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NID information</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
