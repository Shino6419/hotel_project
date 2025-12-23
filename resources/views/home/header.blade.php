<!-- header inner -->

<div class="header" id="header">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
               <div class="center-desk">
                  <div class="logo">

                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
            <nav class="navigation navbar navbar-expand-md navbar-dark ">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                  aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav ">
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#about"> Giới thiệu</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('index_room') }}#room">Hệ thống phòng</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('index_gallary') }}#gallary">Thư viện ảnh</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#contact">Liên hệ</a>
                     </li>



                     @if (Route::has('login'))

                        @auth
                           @if (Auth::user()->usertype == 'admin')
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('view_room') }}">Bảng điều khiển</a>
                              </li>
                           @endif
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="userDropdown" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">Tài Khoản
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                 <li><a class="dropdown-item" href="{{ route('profile.show') }}">Hồ sơ</a></li>
                                 <li><a class="dropdown-item" href="{{ route('booking_history') }}">Lịch sử đặt phòng</a></li>
                                 <li>
                                    <hr class="dropdown-divider">
                                 </li>
                                 <li>
                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                                       @csrf
                                       <button type="submit" class="dropdown-item">Đăng xuất</button>
                                    </form>
                                 </li>
                              </ul>
                           </li>
                        @else
                           <li class="nav-item">
                              <a class="nav-link" href="{{ url('login') }}">Đăng nhập</a>
                           </li>
                           @if (Route::has('register'))
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('register') }}">Đăng ký</a>
                              </li>
                           @endif
                        @endauth

                     @endif
                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>