<section class="banner_main">
   <!-- Image Gallery với Fade Effect -->
   <div id="fadeSlider" class="fade-slider" style="position: relative; width: 100%; height: 600px; overflow: hidden;">

      <!-- Slide 1 -->
      <div class="fade-slide active"
         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 1; transition: opacity 0.8s ease-in-out;">
         <img src="{{ asset('images/banner1.jpg') }}" alt="Hotel Banner 1"
            style="width: 100%; height: 100%; object-fit: cover;">
         <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; z-index: 5; width: 80%;">
            <h2
               style="font-size: 48px; font-weight: bold; margin: 0; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); margin-bottom: 15px;">
               Chào Mừng Bạn Đến Khách Sạn</h2>
            <p style="font-size: 20px; text-shadow: 2px 2px 6px rgba(0,0,0,0.7); margin: 0;">Trải nghiệm dịch vụ 5 sao
               với không gian thoải mái và sang trọng</p>
         </div>
      </div>

      <!-- Slide 2 -->
      <div class="fade-slide"
         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; transition: opacity 0.8s ease-in-out;">
         <img src="{{ asset('images/banner2.jpg') }}" alt="Hotel Banner 2"
            style="width: 100%; height: 100%; object-fit: cover;">
         <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; z-index: 5; width: 80%;">
            <h2
               style="font-size: 48px; font-weight: bold; margin: 0; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); margin-bottom: 15px;">
               Phòng Hạng Sang</h2>
            <p style="font-size: 20px; text-shadow: 2px 2px 6px rgba(0,0,0,0.7); margin: 0;">Các phòng được thiết kế
               tinh tế với tiện nghi hiện đại và view đẹp mắt</p>
         </div>
      </div>

      <!-- Slide 3 -->
      <div class="fade-slide"
         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; transition: opacity 0.8s ease-in-out;">
         <img src="{{ asset('images/banner3.jpg') }}" alt="Hotel Banner 3"
            style="width: 100%; height: 100%; object-fit: cover;">
         <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; z-index: 5; width: 80%;">
            <h2
               style="font-size: 48px; font-weight: bold; margin: 0; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); margin-bottom: 15px;">
               Dịch Vụ Tuyệt Vời</h2>
            <p style="font-size: 20px; text-shadow: 2px 2px 6px rgba(0,0,0,0.7); margin: 0;">Đội ngũ nhân viên chuyên
               nghiệp sẵn sàng phục vụ bạn 24/7</p>
         </div>
      </div>

      <!-- Navigation Buttons -->
      <button class="fade-prev" onclick="changeSlide(-1)"
         style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.5); border: none; color: #333; font-size: 24px; padding: 10px 15px; cursor: pointer; border-radius: 4px; z-index: 10;">❮</button>
      <button class="fade-next" onclick="changeSlide(1)"
         style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.5); border: none; color: #333; font-size: 24px; padding: 10px 15px; cursor: pointer; border-radius: 4px; z-index: 10;">❯</button>

      <!-- Indicators -->
      <div
         style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); display: flex; gap: 10px; z-index: 10;">
         <span class="fade-dot active" onclick="currentSlide(0)"
            style="width: 12px; height: 12px; background: #fff; border-radius: 50%; cursor: pointer; opacity: 0.7; transition: opacity 0.3s;"></span>
         <span class="fade-dot" onclick="currentSlide(1)"
            style="width: 12px; height: 12px; background: #fff; border-radius: 50%; cursor: pointer; opacity: 0.7; transition: opacity 0.3s;"></span>
         <span class="fade-dot" onclick="currentSlide(2)"
            style="width: 12px; height: 12px; background: #fff; border-radius: 50%; cursor: pointer; opacity: 0.7; transition: opacity 0.3s;"></span>
      </div>
   </div>
</section>

<script>
   let currentSlideIndex = 0;
   const slides = document.querySelectorAll('.fade-slide');
   const dots = document.querySelectorAll('.fade-dot');
   const totalSlides = slides.length;

   function showSlide(index) {
      // Remove active class từ tất cả slides và dots
      slides.forEach(slide => slide.style.opacity = '0');
      dots.forEach(dot => dot.style.opacity = '0.7');

      // Add active class cho slide hiện tại
      slides[index].style.opacity = '1';
      dots[index].style.opacity = '1';
   }

   function changeSlide(direction) {
      currentSlideIndex += direction;
      if (currentSlideIndex >= totalSlides) {
         currentSlideIndex = 0;
      } else if (currentSlideIndex < 0) {
         currentSlideIndex = totalSlides - 1;
      }
      showSlide(currentSlideIndex);
   }

   function currentSlide(index) {
      currentSlideIndex = index;
      showSlide(currentSlideIndex);
   }

   // Auto-change slide every 5 seconds
   setInterval(() => {
      changeSlide(1);
   }, 5000);
</script>