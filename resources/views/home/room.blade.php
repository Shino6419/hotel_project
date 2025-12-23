<div class="our_room" id="room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2><a href="{{ url('index_room') }}" style="text-decoration: none; color: inherit;">Hệ thống phòng</a>
               </h2>
               <p>Hệ thống phòng nghỉ rộng rãi, đầy đủ tiện nghi, đảm bảo sự thoải mái và riêng tư cho mọi du khách </p>
            </div>
         </div>
      </div>

      <div class="row">
         @foreach ($room as $rooms)
            <div class="col-md-4 col-sm-6">
               <a href="{{ url('room_details', $rooms->id) }}" style="text-decoration: none; color: inherit;">
                  <div id="serv_hover" class="room">
                     <div class="room_img">
                        <figure><img
                              style="max-height:194.6px; max-width:346px; width:100%; height:auto; object-fit:cover;"
                              src="room/{{ $rooms->image }}" alt="#" /></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{ $rooms->room_title }}</h3>
                        <p>{!! Str::limit($rooms->description, 100)!!}</p>

                     </div>

                  </div>
               </a>
            </div>
         @endforeach
      </div>

   </div>
</div>