<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style type="text/css">
        .form-container {
            max-width: 700px;
            margin: 0 auto 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .banner {
            padding-top: 20px;
            padding-bottom: 0;
            margin-bottom: 0;
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
            font-size: 17px;
            transition: ease-in all 0.5s;
            background-color: #ff0909;
            color: #fff;
            font-weight: 500;
            text-transform: uppercase;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #ff0909;
            transition: ease-in all 0.5s;
            color: #fff;
        }

        .back-btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #999;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #999;
            color: white;
        }

        .cancel-btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            font-size: 17px;
            transition: ease-in all 0.5s;
            background-color: #dc3545;
            color: #fff;
            font-weight: 500;
            text-transform: uppercase;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background-color: #c82333;
            transition: ease-in all 0.5s;
            color: #fff;
        }

        .room-info {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .room-info p {
            margin: 5px 0;
            color: #333;
        }
    </style>
</head>

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
        <div class="banner">
            <div class="titlepage">
                <h2>Chỉnh sửa thông tin đặt phòng</h2>
            </div>
        </div>
        <div class="form-container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if($booking->room)
                <div class="room-info">
                    <p><strong>Phòng:</strong> {{ $booking->room->room_title }}</p>
                    <p><strong>Giá phòng:</strong> {{ number_format($booking->room->price, 0, ',', '.') }} vnđ/đêm</p>
                </div>
            @else
                <div class="alert alert-warning">
                    <strong>Cảnh báo:</strong> Phòng đã bị xóa khỏi hệ thống
                </div>
            @endif

            <form action="{{ url('update_booking', $booking->id) }}" method="POST">
                @csrf

                <div class="form-group-custom">
                    <label>Họ và tên</label>
                    <input type="text" name="name" value="{{ $booking->name }}" required>
                </div>

                <div class="form-group-custom">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $booking->email }}" required>
                </div>

                <div class="form-group-custom">
                    <label>Số điện thoại</label>
                    <input type="number" name="phone" value="{{ $booking->phone }}" required>
                </div>

                <button type="submit" class="submit-btn">Cập nhật đơn đặt</button>
                <a href="{{ route('booking_history') }}" class="back-btn">Quay lại</a>
            </form>
        </div>
    </div>

    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>