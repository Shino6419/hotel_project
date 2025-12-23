<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style type="text/css">
    .table_wrapper {
      max-height: auto;
      overflow-y: auto;
    }

    .table_deg {
      border: 2px solid white;
      margin: auto;
      width: 100%;
      text-align: center;
      margin-top: 50px;
    }

    .th_deg {
      background-color: skyblue;
      padding: 15px;
    }

    tr {
      border: 3px solid white;


    }

    td {
      padding: 10px;
    }

    .btn-fixed {
      width: 90px;
      text-align: center;
    }
  </style>
</head>

<body>

  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <div class="table_wrapper">
          <table class="table_deg">


            <tr>
              <th class="th_deg">ID</th>
              <th class="th_deg">Tên phòng</th>
              <th class="th_deg">Tên khách</th>
              <th class="th_deg">Email</th>
              <th class="th_deg">Số điện thoại</th>
              <th class="th_deg">Ngày đến</th>
              <th class="th_deg">Ngày đi</th>
              <th class="th_deg">Giá</th>
              <th class="th_deg">Trạng thái</th>
              <th class="th_deg">Cập nhật trạng thái</th>
            </tr>



            @foreach($data as $data)
                        <tr>
                          <td>{{$data->room_id}}</td>
                          <td>{{$data->room->room_title}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->phone}}</td>
                          <td>{{$data->start_date}}</td>
                          <td>{{$data->end_date}}</td>
                          <td>
                            <?php
              $startDate = new DateTime($data->start_date);
              $endDate = new DateTime($data->end_date);
              $nights = $endDate->diff($startDate)->days;
              $totalPrice = $data->room->price * $nights;?>
                            {{ number_format($totalPrice, 0, ',', '.') }} vnđ
                          </td>
                          <td>
                            @if($data->status == 'approve')
                              <span style="color: green;">Chấp Nhận</span>
                            @endif
                            @if($data->status == 'rejected')
                              <span style="color: red;">Hủy</span>
                            @endif
                            @if($data->status == 'waiting')
                              <span style="color: yellow;">Chờ</span>
                            @endif
                          </td>
                          <td>
                            <span style="padding-bottom: 10px;">
                              <a class="btn btn-success btn-fixed" href="{{url('approve_book', $data->id)}}">Xác nhận</a>
                            </span>
                            <a class="btn btn-warning btn-fixed" href="{{url('reject_book', $data->id)}}">Hủy</a>

                            <a onclick="return confirm('Bạn có muón xóa đơn đặt phòng này không?')" class="btn btn-fixed btn-danger"
                              href="{{url('booking_delete', $data->id)}}">Xóa</a>
                          </td>
                        </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    @include('admin.footer')
</body>

</html>