<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route('admin.dashboard') }}">

                    <h2 class="title-1"><i class="fa fa-user"></i>{{ auth::user()->job_title }}</h2>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('show.users') }}">Show Users</a>
                                </li>
                                <li>
                                    <a href="{{ route('create.user') }}">Add New User</a>
                                </li>
                            </ul>
                        </li>
                        @if(auth::user()->job_title == "Admin")
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Questions and answers</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('create.question') }}">Add Question</a>
                                </li>
                                <li>
                                    <a href="{{ route('create.sound') }}">Add Sound or Paragraph</a>
                                </li>
                                <li>
                                    <a href="{{ route('show.questions',1) }}">Test Pre A1</a>
                                </li>
                                <li>
                                    <a href="{{ route('show.questions',2) }}">Test A1</a>
                                </li>
                                <li>
                                    <a href="{{ route('show.questions',3) }}">Test A2</a>
                                </li>
                                <li>
                                    <a href="{{ route('show.questions',4) }}">Test B1</a>
                                </li>
                                <li>
                                    <a href="{{ route('show.questions',5) }}">Test B2</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                        

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->