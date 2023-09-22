 <!-- Footer-->
 <footer class="content-footer footer  mx-3 row">
     <div class="{{ !empty($containerNav) ? $containerNav : 'container-fluid' }} d-sm-flex d-none flex-wrap justify-content-between py-2 flex-md-row flex-column ">

         <div class="col-lg-4 col-md-6 col-sm-3 row align-items-center order-xs-1 ">
             <div class="fotter-nav-pc row ">
                 <div class="col-lg-4 col-md-3 align-self-center text-center"><a href="">О нас</a></div>
                 <div class="col-lg-4 col-md-3 align-self-center text-center"><a href="">Доставка</a></div>
                 <div class="col-lg-4 col-md-3 align-self-center text-center"><a href="">Политика безопасности</a></div>
             </div>

             <details class="fotter-nav-mob">
                 <summary>О магазине</summary>
                 <div class="col-lg-4 col-md-3 align-self-center"><a href="">О нас</a></div>
                 <div class="col-lg-4 col-md-3 align-self-center"><a href="">Доставка и возвраты</a></div>
                 <div class="col-lg-4 col-md-3 align-self-center"><a href="">Политика безопасности</a></div>
             </details>
             {{-- <div class="col-lg-4 col-md-3"><a href="">Условия соглашения</a></div>
      <div class="col-lg-2 col-md-3"><a href="">Карта сайта</a></div> --}}
         </div>
         <div class="mb-2 mb-md-0 col-lg-4 order-xs-3 align-self-center text-center">
             ©
             <script>
                 document.write(new Date().getFullYear())
             </script>
             {{-- <a href="{{ (!empty(config('variables.creatorUrl')) ? config('variables.creatorUrl') : '') }}" target="_blank" class="footer-link fw-bolder">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a> --}}
             Programçy studio
         </div>
         <div class="col-lg-4 col-md-6 col-sm-12 row d-flex align-items-center justify-content-center order-xs-2">
             <div class="col-4"><a href="#"><i class="bx bx-sm bxl-facebook-circle"></i></a></div>
             <div class="col-4"><a href="#"><i class='bx bx-sm bxl-instagram-alt'></i></a></div>
             <div class="col-4"><a href="#"><i class='bx bx-sm bxl-youtube'></i></a></div>
         </div>

     </div>
     <nav id="mobile_nav" class="d-lg-none fixed-bottom text-center row m-auto">
        <div class="mobile_nav-item col-3" id="mob-side-menu-open"><i class="fa fa-bars"></i></div>
         <div class="mobile_nav-item col-3"><a href="/order"><i class="fa fa-shopping-cart"></i></a></div>
         <div class="mobile_nav-item col-3"><i class="fa fa-user-o"></i></div>
         <div class="mobile_nav-item col-3"><i class="fa fa-heart-o"></i></div>
     </nav>
 </footer>
 <script>
    $(document).ready(function() {
        var mbSdOpen = $("#mob-side-menu-open");
        var mbSdMn = $("#mob-side-menu");
        var mbSdCls = $("#mob-side-menu-close");
        var asideMenu = $(".nav_link");
        var asideSub = $("#aside-sub");

        mbSdOpen.on("click", function() {
            mbSdMn.toggleClass("d-none");
            
        });
        mbSdCls.on("click", function() {
            mbSdMn.toggleClass("d-none");
            
        });
        asideMenu.on("mouseover", function() {
            asideSub.toggleClass("d-none");
            
        });
    });
</script>
 <!--/ Footer-->