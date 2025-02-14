<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="{{url('admin/all-student-admissions')}}" class="brand-link">
   <img src="{{ asset('public/admin/dist/img/AdminLTELogoNew.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Rainbow International School</span>
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-student-admissions') }}" class="nav-link {{ Request::is('admin/all-student-admissions') || Request::is('admin/edit-student/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user-graduate"></i> 
                  <p>Students Admission List</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-categories') }}" class="nav-link {{ Request::is('admin/all-categories') || Request::is('admin/edit-category/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>Event Categories list</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-events') }}" class="nav-link {{ Request::is('admin/all-events') || Request::is('admin/edit-event/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Events List</p>
               </a>
            </li>
            <!-- <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-posts') }}" class="nav-link {{ Request::is('admin/all-posts') ? 'active' : '' }}">
                  <i class="fas fa-blog nav-icon"></i>
                  <p>Posts List</p>
               </a>
            </li> -->
            <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-notifications') }}" class="nav-link {{ Request::is('admin/all-notifications') || Request::is('admin/edit-notification/*') ? 'active' : '' }}">
                  <i class="fas fa-bell nav-icon"></i>
                  <p>Notification List</p>
               </a>
            </li>
            <!-- <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-testimonials') }}" class="nav-link {{ Request::is('admin/all-testimonials') ? 'active' : '' }}">
                  <i class="fas fa-quote-left nav-icon"></i> 
                  <p>Testimonials List</p>
               </a>
            </li> -->
            <li class="nav-item has-treeview">
               <a href="{{ url('admin/all-inquiries') }}" class="nav-link {{ Request::is('admin/all-inquiries') ? 'active' : '' }}">
                  <i class="fas fa-question-circle nav-icon"></i>
                  <p>Inquiries List</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                     Logout
                  </p>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </li>
         </ul>
      </nav>
   </div>
</aside>