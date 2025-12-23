<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style type="text/css">
    .table_wrapper {
      overflow-y: auto;
    }

    .table_deg {
      border: 2px solid white;
      margin: auto;
      width: 90%;
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
              <th class="th_deg">Tên phòng</th>
              <th class="th_deg">Mô tả</th>
              <th class="th_deg">Giá</th>
              <th class="th_deg">Số khách tối đa</th>
              <th class="th_deg">Loại phòng</th>
              <th class="th_deg">Hình ảnh</th>
              <th class="th_deg"></th>
              <th class="th_deg"></th>
            </tr>
            @foreach($data as $data)
              <tr>
                <td>{{$data->room_title}}</td>
                <td>{!! Str::limit($data->description, 150) !!}</td>
                <td>{{$data->price}} vnđ</td>
                <td>{{$data->max_guest}} người</td>
                @if($data->room_type == 'regular')
                  <td><span style="color: lightblue;">Thường</span></td>
                @endif
                @if($data->room_type == 'premium')
                  <td><span style="color: green;">Trung</span></td>
                @endif
                @if($data->room_type == 'deluxe')
                  <td><span style="color: yellow;">Sang</span></td>
                @endif
                <td><img width="100 " src="room/{{$data->image}}"> </td>
                <td>
                  <a onclick="return confirm('Bạn có muón xóa phòng này không?')" class="btn btn-danger"
                    href="{{url('room_delete', $data->id)}}">Xóa</a>
                </td>
                <td>
                  <a class="btn btn-warning" href="{{url('room_update', $data->id)}}">Cập nhật</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer')
</body>

</html>