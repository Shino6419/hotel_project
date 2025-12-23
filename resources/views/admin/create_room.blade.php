<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style type="text/css">
    .form-container {
      max-width: 700px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
      font-size: 20px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 20px;
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    .btn-submit {
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      width: 100%;
    }
  </style>
</head>

<body>

  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <div class="form-container">
          <h1 style="font-size:30px; font-weight:bold; text-align: center; margin-bottom: 30px;">Thêm phòng</h1>
          <form action="{{ url('add_room') }}" method="Post" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
              <label>Tên phòng</label>
              <input type="text" name="title" required>
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="description" required></textarea>
            </div>

            <div class="form-group">
              <label>Giá</label>
              <input type="number" name="price" required>
            </div>

            <div class="form-group">
              <label>Loại phòng</label>
              <select name="type" required>
                <option value="">-- Chọn loại phòng --</option>
                <option value="regular">Thường</option>
                <option value="premium">Trung</option>
                <option value="deluxe">Sang</option>
              </select>
            </div>

            <div class="form-group">
              <label>Số khách tối đa</label>
              <input type="number" name="max_guest" min="1" max="10" required>
            </div>

            <div class="form-group">
              <label>Upload Image</label>
              <input type="file" name="image" required>
            </div>

            <div class="form-group">
              <input class="btn btn-primary btn-submit" type="submit" value="Thêm phòng">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer')
</body>

</html>