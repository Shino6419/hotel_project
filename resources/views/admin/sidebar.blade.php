<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Dashboard</span>
        <ul class="list-unstyled">
                <li><a href="{{ url('booking') }}"> <i class="icon-home"></i>Đơn đặt phòng</a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Quản lý phòng </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('view_room') }}">Danh sách phòng</a></li>
                    <li><a href="{{ url('create_room') }}">Thêm phòng</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('view_gallary') }}"> <i class="bi bi-image"></i> Quản lý ảnh</a></li>
                <li><a href="{{ url('view_contact') }}"> <i class="bi bi-chat-left"></i>Quản lý tin nhắn</a></li>
                
                
        </ul>
      </nav>
      
      <!-- Sidebar Navigation end-->