<!DOCTYPE html>
<html>

<head>
  <base href="/public">
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

    .current-image {
      margin: 10px 0;
      text-align: center;
    }

    .current-image img {
      max-width: 100%;
      height: auto;
      border-radius: 4px;
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
          <h1 style="font-size:30px; font-weight:bold; text-align: center; margin-bottom: 30px;">Cập nhật phòng</h1>
          <form action="{{ url('edit_room', $data->id) }}" method="Post" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
              <label>Tên phòng</label>
              <input type="text" name="title" value="{{ $data->room_title }}" required>
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="description" required>{{ $data->description }}</textarea>
            </div>

            <div class="form-group">
              <label>Giá</label>
              <input type="number" name="price" value="{{ $data->price }}" required>
            </div>

            <div class="form-group">
              <label>Loại phòng</label>
              <select name="type" required>
                <option value="">-- Chọn loại phòng --</option>
                <option value="{{ $data->type }}" selected>{{ $data->type }}</option>
                <option value="regular">Thông thường</option>
                <option value="premium">Premium</option>
                <option value="deluxe">Deluxe</option>
              </select>
            </div>

            <div class="form-group">
              <label>Số khách tối đa</label>
              <input type="number" name="max_guest" value="{{ $data->max_guest }}" min="1" max="10" required>
            </div>

            <div class="form-group">
              <label>Ảnh hiện tại</label>
              <div class="current-image">
                <img src="/room/{{ $data->image }}" alt="Current room image">
              </div>
            </div>

            <div class="form-group">
              <label>Chọn ảnh mới</label>
              <input type="file" name="image">
            </div>

            <div class="form-group">
              <input class="btn btn-primary btn-submit" type="submit" value="Cập nhật phòng">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer')
</body>

</html>