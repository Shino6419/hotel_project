<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->

   <base href="/public">
   @include('home.css')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <style type="text/css">
      .banner {
         padding-top: 50px;
         padding-bottom: 20px;
         margin-bottom: 0;
      }

      .room-detail-container {
         background: #f9f9f9;
         padding: 30px;
         border-radius: 8px;
         margin-bottom: 30px;
         margin-top: 0;
      }

      .room-image-section {
         text-align: center;
         margin-bottom: 30px;
      }

      .room-image-section img {
         max-width: 100%;
         height: auto;
         border-radius: 8px;
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }

      .room-info-section {
         display: flex;
         flex-direction: column;
         gap: 20px;
      }

      .room-info-item {
         padding: 15px 0;
         border-bottom: 1px solid #e0e0e0;
      }

      .room-info-item:last-child {
         border-bottom: none;
      }

      .room-info-label {
         font-weight: 600;
         font-size: 14px;
         color: #666;
         text-transform: uppercase;
         margin-bottom: 5px;
      }

      .room-info-value {
         font-size: 18px;
         color: #333;
      }

      .booking-form-section {
         background: #fff;
         padding: 0;
         border-radius: 8px;
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }

      .booking-form-section .banner {
         margin: 0;
         padding-top: 50px;
         padding-left: 30px;
         padding-right: 30px;
         padding-bottom: 20px;
      }

      .booking-form-section form {
         padding: 0 30px 30px 30px;
      }


      .form-group-custom {
         margin-bottom: 18px;
      }

      .form-group-custom label {
         display: block;
         font-weight: 600;
         margin-bottom: 8px;
         font-size: 14px;
         color: #333;
      }

      .form-group-custom input {
         width: 100%;
         padding: 12px;
         border: 1px solid #ddd;
         border-radius: 4px;
         font-size: 16px;
         box-sizing: border-box;
      }

      .form-group-custom input:focus {
         outline: none;
         border-color: #4CAF50;
         box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
      }

      .submit-btn {
         width: 100%;
         padding: 12px;
         margin-top: 10px;
      }

      .price-calculation {
         background: #f0f0f0;
         padding: 15px;
         border-radius: 4px;
         margin: 20px 0;
         border-left: 4px solid #e74c3c;
      }

      .price-row {
         display: flex;
         justify-content: space-between;
         margin-bottom: 10px;
         font-size: 16px;
      }

      .price-row:last-child {
         margin-bottom: 0;
         border-top: 1px solid #ddd;
         padding-top: 10px;
         font-weight: 600;
         font-size: 18px;
         color: #e74c3c;
      }

      .price-label {
         font-weight: 500;
         color: #333;
      }

      .price-value {
         color: #333;
      }

      /* Dropdown fix */
      .dropdown-menu {
         display: none;
         position: absolute;
         z-index: 1050 !important;
         min-width: 10rem;
         padding: 0.5rem 0;
         margin: 0.125rem 0 0;
         font-size: 1rem;
         color: #212529;
         text-align: left;
         list-style: none;
         background-color: #fff;
         background-clip: padding-box;
         border: 1px solid rgba(0, 0, 0, 0.15);
         border-radius: 0.25rem;
      }

      .dropdown-menu.show {
         display: block !important;
      }

      .dropdown-item {
         display: block;
         width: 100%;
         padding: 0.25rem 1rem;
         clear: both;
         font-weight: 400;
         color: #212529;
         text-align: inherit;
         white-space: nowrap;
         background-color: transparent;
         border: 0;
         cursor: pointer;
      }

      .dropdown-item:hover,
      .dropdown-item:focus {
         color: #16213e;
         background-color: #e9ecef;
      }

      .dropdown-divider {
         height: 0;
         margin: 0.5rem 0;
         overflow: hidden;
         border-top: 1px solid #e9ecef;
      }

      .nav-item.dropdown:hover .dropdown-menu,
      .dropdown-toggle:focus~.dropdown-menu {
         display: block !important;
      }
   </style>
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      @include('home.header')
   </header>
   <!-- end header -->


   <div class="container">
      <div class="row">
         <div class="col-md-8 ">
            <div class="banner">
               <div class="titlepage">
                  <h2>Chi tiết phòng</h2>
               </div>
            </div>
            <div id="serv_hover" class="room-detail-container">
               <div class="room-image-section">
                  <img src="/room/{{$room->image}}" alt="{{$room->room_title}}" />
               </div>
               <div class="room-info-section">
                  <div>
                     <h2 style="margin: 0 0 20px 0; font-size: 28px;">{{$room->room_title}}</h2>
                  </div>
                  <div class="room-info-item">
                     <div class="room-info-label">Mô tả</div>
                     <div class="room-info-value">{{$room->description}}</div>
                  </div>
                  <div class="room-info-item">
                     <div class="room-info-label">Số khách tối đa</div>
                     <div class="room-info-value">{{$room->max_guest}} người</div>
                  </div>
                  <div class="room-info-item">
                     <div class="room-info-label">Loại phòng</div>
                     <div class="room-info-value">
                        @if($room->room_type == 'regular')
                           Thường
                        @elseif($room->room_type == 'premium')
                           Trung
                        @elseif($room->room_type == 'deluxe')
                           Sang
                        @else
                           {{$room->room_type}}
                        @endif
                     </div>
                  </div>
                  <div class="room-info-item">
                     <div class="room-info-label">Giá</div>
                     <div class="room-info-value" style="font-size: 24px; color: #e74c3c; font-weight: 600;">
                        {{ number_format($room->price, 0, ',', '.') }} vnđ/đêm
                     </div>
                  </div>
               </div>
            </div>


         </div>
         <div class="col-md-4">
            <div class="booking-form-section">
               <div class="banner">
                  <div class="titlepage">
                     <h2>Đặt phòng</h2>
                  </div>
               </div>
               <div>
                  @if(session()->has('success'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        {{session()->get('success')}}
                     </div>
                  @endif

               </div>


               <form action="{{ url('add_booking', $room->id)}}" method="Post">
                  @csrf
                  <div class="form-group-custom">
                     <label>Họ và tên</label>
                     <input type="text" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif>
                  </div>
                  <div class="form-group-custom">
                     <label>Email</label>
                     <input type="text" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif>
                  </div>
                  <div class="form-group-custom">
                     <label>Số điện thoại</label>
                     <input type="number" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif>
                  </div>
                  <div class="form-group-custom">
                     <label>Ngày đặt phòng</label>
                     <input type="date" name="startDate" id="startDate">
                  </div>
                  <div class="form-group-custom">
                     <label>Ngày trả phòng</label>
                     <input type="date" name="endDate" id="endDate">
                  </div>

                  <!-- Tính toán tiền -->
                  <div class="price-calculation" id="priceCalculation" style="display: none;">
                     <div class="price-row">
                        <span class="price-label">Giá mỗi đêm:</span>
                        <span class="price-value">{{ number_format($room->price, 0, ',', '.') }} vnđ</span>
                     </div>
                     <div class="price-row">
                        <span class="price-label">Số đêm:</span>
                        <span class="price-value"><span id="nights">0</span> đêm</span>
                     </div>
                     <div class="price-row">
                        <span class="price-label">Tổng tiền:</span>
                        <span class="price-value"><span id="totalPrice">0</span> vnđ</span>
                     </div>
                  </div>

                  @if($errors)
                     <div style="padding-top: 20px">

                        @foreach($errors->all() as $errors)
                           <div class="alert alert-danger">
                              <button type="button" class="close" data-bs-dismiss="alert">x</button>
                              <li> {{$errors}} </li>

                           </div>
                        @endforeach
                     </div>
                  @endif
                  @if(session()->has('error'))
                     <div class="alert alert-danger" style="padding-top: 20px">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        {{session()->get('error')}}
                     </div>

                  @endif

                  <input class="btn btn-primary submit-btn" type="submit" value="Đặt phòng">
               </form>

            </div>


         </div>

      </div>
   </div>

   <!--  footer -->
   @include('home.footer')
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>
   <script src="js/jquery.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>

   <script type="text/javascript">

      document.addEventListener('DOMContentLoaded', function () {
         const dropdownToggles = document.querySelectorAll('[data-bs-toggle="dropdown"]');
         dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
               e.preventDefault();
               const menu = this.nextElementSibling;
               if (menu && menu.classList.contains('dropdown-menu')) {
                  menu.classList.toggle('show');
               }
            });
         });


         document.addEventListener('click', function (e) {
            const dropdowns = document.querySelectorAll('.dropdown-menu.show');
            dropdowns.forEach(menu => {
               if (!menu.parentElement.contains(e.target)) {
                  menu.classList.remove('show');
               }
            });
         });
      });

      <script type="text/javascript">
         $(function () {
         var dtToday = new Date();

         var month = dtToday.getMonth() + 1;

         var day = dtToday.getDate();

         var year = dtToday.getFullYear();

         if (month < 10)
         month = '0' + month.toString();

         if (day < 10)
         day = '0' + day.toString();

         var maxDate = year + '-' + month + '-' + day;
         $('#startDate').attr('min', maxDate);
         $('#endDate').attr('min', maxDate);


         const roomPrice = {{ $room->price }};
         const priceCalculation = $('#priceCalculation');
         const nightsSpan = $('#nights');
         const totalPriceSpan = $('#totalPrice');

         function calculatePrice() {
            const startDate = $('#startDate').val();
         const endDate = $('#endDate').val();

         if (startDate && endDate) {
               const start = new Date(startDate);
         const end = new Date(endDate);
         const diffTime = Math.abs(end - start);
         const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

               if (diffDays > 0) {
                  const totalPrice = diffDays * roomPrice;
         nightsSpan.text(diffDays);
         totalPriceSpan.text(totalPrice.toLocaleString('vi-VN'));
         priceCalculation.show();
               } else {
            priceCalculation.hide();
               }
            } else {
            priceCalculation.hide();
            }
         }

         $('#startDate, #endDate').on('change', function () {
            calculatePrice();
         });

      });
   </script>
</body>

</html>