<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->

   <title>HỆ PHỐNG PHÒNG</title>
   @include('home.css')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"></script>
   <style>
      header+.container {
         margin-top: 40px;
      }

      .btn-search {
         background-color: #ff9800;
         border-color: #ff9800;
         color: white;
      }

      .btn-search:hover {
         background-color: #e68900;
         border-color: #e68900;
         color: white;
      }
   </style>
</head>
<!-- body -->

<!-- loader  -->
<div class="loader_bg">
   <div class="loader"><img src="images/loading.gif" alt="#" /></div>
</div>
<header>
   @include('home.header')
</header>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="titlepage">
            <h2>Hệ thống phòng</h2>
            <p>Hệ thống phòng nghỉ rộng rãi, đầy đủ tiện nghi, đảm bảo sự thoải mái và riêng tư cho mọi du khách </p>
         </div>
      </div>
   </div>

   <div class="row" style="margin-bottom: 30px;">
      <div class="col-md-12">
         <form action="{{ url('index_room') }}" method="GET" class="row g-2">
            <div class="col-md-4">
               <input type="text" name="search" class="form-control" placeholder="Tìm kiếm phòng..."
                  value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
               <select name="room_type" class="form-control">
                  <option value="">-- Loại phòng --</option>
                  <option value="regular" @if(request('room_type') == 'regular') selected @endif>Thường</option>
                  <option value="premium" @if(request('room_type') == 'premium') selected @endif>Trung</option>
                  <option value="deluxe" @if(request('room_type') == 'deluxe') selected @endif>Sang</option>
               </select>
            </div>
            <div class="col-md-3">
               <input type="number" name="max_guest" class="form-control" placeholder="Số lượng người"
                  value="{{ request('max_guest') }}" min="1">
            </div>
            <div class="col-md-2">
               <button type="submit" class="btn btn-search w-100">Tìm kiếm</button>
            </div>
            @if(request('search') || request('room_type') || request('max_guest'))
               <div class="col-md-12">
                  <a href="{{ url('index_room') }}" class="btn btn-secondary w-100">Xóa bộ lọc</a>
               </div>
            @endif
         </form>
      </div>
   </div>

   <div class="row">
      @foreach ($room as $rooms)
         <div class="col-md-4 col-sm-6">
            <a href="{{ url('room_details', $rooms->id) }}" style="text-decoration: none; color: inherit;">
               <div id="serv_hover" class="room">
                  <div class="room_img">
                     <figure><img style="max-height:194.6px; max-width:346px; width:100%; height:auto; object-fit:cover;"
                           src="room/{{ $rooms->image }}" alt="#" /></figure>
                  </div>
                  <div class="bed_room">
                     <h3>{{ $rooms->room_title }}</h3>
                     <p>{!! Str::limit($rooms->description, 100)!!}</p>

                  </div>

               </div>
            </a>
         </div>
      @endforeach
   </div>

</div>
@include('home.footer')
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/Javascript">
         $(window).on("scroll", function () {
            let currentPage = window.location.pathname;
            sessionStorage.setItem('scrollTop_' + currentPage, $(this).scrollTop());
         });

         $(document).ready(function () {
            let currentPage = window.location.pathname;
            let savedScroll = sessionStorage.getItem('scrollTop_' + currentPage);
            if (savedScroll !== null) {
               $(window).scrollTop(savedScroll);
            }
         });

         // Xóa scroll position khi click link
         $(document).on('click', 'a:not([data-bs-toggle])', function(e) {
            let href = $(this).attr('href');
            if (href && !href.startsWith('#') && !href.includes('logout')) {
               let targetPage = href.split('?')[0];
               sessionStorage.removeItem('scrollTop_' + window.location.pathname);
            }
         });
      </script>
</body>

</html>