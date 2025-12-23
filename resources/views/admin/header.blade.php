<header class="header">
    <nav class="navbar navbar-expand-lg">

        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong
                            class="text-primary">Dark</strong><strong>Admin</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>




            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> {{ Auth::user()->name ?? 'User' }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
                    <a class="dropdown-item" href="{{ url('/') }}">
                        <i class="fa fa-home"></i> Về trang chủ
                    </a>
                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="fa fa-user-circle"></i> Hồ sơ
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item"
                            style="background: none; border: none; cursor: pointer; text-align: left; padding: 0.5rem 1rem; color: #e74c3c;">
                            <i class="fa fa-sign-out"></i> Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </nav>
</header>