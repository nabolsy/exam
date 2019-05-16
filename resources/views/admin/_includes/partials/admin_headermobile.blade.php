<!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ route('admin.dashboard') }}" style="width: 40%;
    height: 100px;">
                            <img src="{{ asset('assets/images/passion.png') }}" alt="passion" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a  href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('show.users') }}">Show Users</a>
                                </li>
                                <li>
                                    <a href="{{ route('create.user') }}">Add New User</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Questions and answers</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('create.question') }}">Add Question</a
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
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->