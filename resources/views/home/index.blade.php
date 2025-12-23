<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   @include('home.css')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"></script>
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      @include('home.header')
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   @include('home.slider')
   <!-- end banner -->
   <!-- about -->
   @include('home.about')
   <!-- end about -->
   <!-- our_room -->
   @include('home.room')
   <!-- end our_room -->
   <!-- gallery -->
   @include('home.gallery')
   <!-- end gallery -->
   <!-- blog -->

   <!-- end blog -->
   <!--  contact -->
   @include('home.contact')
   <!-- end contact -->
   <!--  footer -->
   @include('home.footer')
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script type="text/Javascript">
         $(window).on("scroll", function () {
            let currentPage = window.location.pathname;
            sessionStorage.setItem('scrollTop_' + currentPage, $(this).scrollTop());
         });

         $(document).ready(function () {
            let currentPage = window.location.pathname;
            let savedScroll = sessionStorage.getItem('scrollTop_' + currentPage);
            if (savedScroll !== null) {
               $(window).scrollTop(savedScroll);
            }
         });

         // Xóa scroll position khi click link
         $(document).on('click', 'a:not([data-bs-toggle])', function(e) {
            let href = $(this).attr('href');
            if (href && !href.startsWith('#') && !href.includes('logout')) {
               let targetPage = href.split('?')[0];
               sessionStorage.removeItem('scrollTop_' + window.location.pathname);
            }
         });
      </script>
</body>

</html>