<div class="contact" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Liên hệ</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  @if(session()->has('success'))
                  <div class="alert alert-success">
                     <button type="button" class="close" data-bs-dismiss="alert">x</button>
                     {{session()->get('success')}}
                  </div>
                   @endif

                  
                  <form id="request" class="main_form" action="{{ url('contact') }}" method="Post">
                     @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Tên" type="type" name="name" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email"required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Số điện thoại" type="number" name="phone"required>                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Lời nhắn" type="type" name="message"required></textarea>
                        </div>
                        <div class="col-md-12" style="padding:10px;">
                           <button type="submit "class="send_btn">Gửi</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15350.076503372495!2d108.3025484871582!3d15.881851599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420fe358198aa3%3A0xf80a773e776587eb!2sSENDA%20VILLA%20%26%20APARTMENT!5e0!3m2!1svi!2s!4v1754972679905!5m2!1svi!2s" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>