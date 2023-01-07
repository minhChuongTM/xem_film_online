<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('administrator') }}/index3.html" class="brand-link">
        <img src="{{ asset('administrator') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('administrator') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
            <div class="info">
                @if (Auth::check())
                    <a href="{{ route('logout') }}" class="d-block"><i class="fas fa-sign-out-alt"></i></a>
                @endif
                
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.createCategories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.language.createLanguage') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Laguage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.company.createCompany') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Company</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viewListCategories') }}" class="nav-link">
                                <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
                                <p>View List</p>
                            </a>
                        </li>                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.film.createFilm') }}" class="nav-link">
                        <i class="fa fa-film nav-icon" aria-hidden="true"></i>
                        <p>Add Film</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.film.indexFilm') }}" class="nav-link">
                        <i class="fa fa-film nav-icon" aria-hidden="true"></i>
                        <p>List Film</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.UploadMovie.create') }}" class="nav-link">
                        <i class="far fa-file-video nav-icon" aria-hidden="true"></i>
                        <p>Add Movie</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.UploadMovie.index') }}" class="nav-link">
                        <i class="far fa-file-video nav-icon" aria-hidden="true"></i>
                        <p>List Movie</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cast.create') }}" class="nav-link">
                        <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                        <p>Add Cast</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cast.index') }}" class="nav-link">
                        <i class="fa fa-film nav-icon" aria-hidden="true"></i>
                        <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                        <p>List Cast</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
