<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style type="text/css">
    .table_wrapper {
      max-height: 400px;
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
              <th class="th_deg">Tên</th>
              <th class="th_deg">Email</th>
              <th class="th_deg">Số điện thoại</th>
              <th class="th_deg">Lời nhắn</th>
              <th class="th_deg"></th>
            </tr>
            @foreach($contact as $contact)
              <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}} vnđ</td>
                <td>{{$contact->phone}}</td>
                <td>{!! Str::limit($contact->message, 150) !!}</td>
                <td>
                  <a onclick="return confirm('Bạn có muón xóa tin nhắn này không?')" class="btn btn-danger"
                    href="{{url('delete_contact', $contact->id)}}">Xóa</a>
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