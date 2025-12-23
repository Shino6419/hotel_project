<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      .table_wrapper 
      {
      max-height: 400px;
      overflow-y: auto;  
      }
      .table_deg
        {
        border: 2px solid white;
        margin:auto;
        width:90%;
        text-align: center;
        margin-top: 50px;
        }
        .th_deg
        {
          background-color: skyblue;
          padding: 15px;
        }
        tr
        {
          border: 3px solid white;

        }
        td
        {
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
          <h1 style="font-size: 40px; font-weight: bolder;">Thư viện ảnh</h1>
          <div class="row">
            @foreach($gallary as $gallary)
            <div class="col-md-4" style="padding:10px">
            <center>
            <img style=" height:200px!important; widght=300px!important"src="/gallary/{{ $gallary->image }}"></img>
            <a class="btn btn-danger"href="{{ url('delete_gallary',$gallary->id) }}" style="margin-top: 10px; display: inline-block;">Xóa</a>
            </div>
            </center>
            @endforeach
          </div>


          <form action="{{ url('upload_gallary') }}" method="Post" enctype="multipart/form-data">
                @csrf
                <div style="padding:30px">
                  <center>
                        
                    <div>
                        <label style="color:white; font-weight: bold;">Upload Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-primary "type="submit" value="Add Image">
                    </div>
                
                </div>
                </center>

         </form>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>