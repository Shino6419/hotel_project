<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <title>LỊCH SỬ ĐẶT PHÒNG</title>
    @include('home.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <style>
        .table_wrapper {
            max-height: auto;
            overflow-y: auto;
        }

        .table_deg {
            border: 2px solid #e0e0e0;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .th_deg {
            background-color: #4a90e2;
            padding: 15px;
            color: white;
            font-weight: 600;
        }

        .table_deg tr {
            border-bottom: 1px solid #e0e0e0;
        }

        .table_deg td {
            padding: 12px;
            color: #333;
        }

        .btn-fixed {
            width: 90px;
            text-align: center;
            font-size: 12px;
        }

        .status-approve {
            color: #27ae60;
            font-weight: 600;
        }

        .status-rejected {
            color: #e74c3c;
            font-weight: 600;
        }

        .status-waiting {
            color: #f39c12;
            font-weight: 600;
        }

        .no-bookings {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }

        .no-bookings p {
            font-size: 16px;
        }

        .btn-orange {
            font-size: 17px;
            transition: ease-in all 0.5s;
            background-color: #fff;
            color: #ff0909;
            padding: 8px 15px;
            font-weight: 500;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
        }

        .btn-orange:hover {
            background-color: #ff0909;
            transition: ease-in all 0.5s;
            color: #fff;
        }

        .btn-edit {
            background-color: #f39c12 !important;
            color: white !important;
            border: none !important;
        }

        .btn-edit:hover {
            background-color: #e67e22 !important;
            color: white !important;
        }

        .btn-cancel-small {
            background-color: #e74c3c !important;
            color: white !important;
            border: none !important;
        }

        .btn-cancel-small:hover {
            background-color: #c0392b !important;
            color: white !important;
        }
    </style>
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <header>
        @include('home.header')
    </header>

    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Lịch sử đặt phòng</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{session()->get('success')}}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{session()->get('error')}}
                </div>
            @endif

            @if($bookings->count() > 0)
                <div class="table_wrapper">
                    <table class="table_deg">
                        <tr>
                            <th class="th_deg">Tên phòng</th>
                            <th class="th_deg">Tên khách</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Số điện thoại</th>
                            <th class="th_deg">Ngày đến</th>
                            <th class="th_deg">Ngày đi</th>
                            <th class="th_deg">Giá</th>
                            <th class="th_deg">Trạng thái</th>
                            <th class="th_deg">Hành động</th>
                        </tr>

                        @foreach($bookings as $booking)
                            @if($booking->room)
                                        <tr>
                                            <td>{{ $booking->room->room_title }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td>{{ $booking->start_date }}</td>
                                            <td>{{ $booking->end_date }}</td>
                                            <td>
                                                <?php
                                $startDate = new DateTime($booking->start_date);
                                $endDate = new DateTime($booking->end_date);
                                $nights = $endDate->diff($startDate)->days;
                                $totalPrice = $booking->room->price * $nights;
                                                        ?>
                                                {{ number_format($totalPrice, 0, ',', '.') }} vnđ
                                            </td>
                                            <td>
                                                @if($booking->status == 'approve')
                                                    <span class="status-approve">Chấp nhận</span>
                                                @elseif($booking->status == 'rejected')
                                                    <span class="status-rejected">Hủy</span>
                                                @else
                                                    <span class="status-waiting">Chờ xác nhận</span>
                                                @endif
                                            </td>
                                            <td style="display: flex; gap: 5px; justify-content: center; flex-wrap: wrap;">
                                                @if($booking->status == 'waiting')
                                                    <a class="btn btn-edit btn-fixed" href="{{ url('edit_booking', $booking->id) }}">Chỉnh
                                                        sửa</a>
                                                    <form action="{{ url('cancel_booking', $booking->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-cancel-small btn-fixed"
                                                            onclick="return confirm('Bạn chắc chắn muốn hủy đơn đặt này?')">Hủy đơn</button>
                                                    </form>
                                                @else
                                                    <span style="color: #999; font-size: 12px;">Không thể chỉnh sửa</span>
                                                @endif
                                            </td>
                                        </tr>
                            @else
                                <tr>
                                    <td colspan="9" style="text-align: center; color: #999;">
                                        <em>Phòng đã bị xóa khỏi hệ thống</em>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            @else
                <div class="no-bookings">
                    <p>Bạn chưa có đơn đặt phòng nào</p>
                    <a href="{{ url('index_room') }}" class="btn btn-orange">Đặt phòng ngay</a>
                </div>
            @endif
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