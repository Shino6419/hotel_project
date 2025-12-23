<div  class="gallery" id="gallary">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Thư viện ảnh</h2>
                  </div>
               </div>
            </div><div class="row">
            @foreach($gallary as $gallary)
            
               <div class="col-md-4">
                  <div class="gallery_img">
                     <figure><img src="/gallary/{{ $gallary->image }}" alt="#"/></figure>
                  </div>
               </div>
            
            @endforeach
            </div>
         </div>
      </div>