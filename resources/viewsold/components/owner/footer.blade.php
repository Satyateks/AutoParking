<footer class="container-fluid footer-container">
    <div class="container pt-4">
      <div class="row" style="justify-content: center;">
        <div class="col-lg-7">
          <div class="footer-column">
            <img src="images/logo.png" alt="">
            <div class="footer-nav pt-5">
                <a href="{{ url('owner_tems_condition') }}">Terms & Condition</a>
                <a href="{{ url('owner_privacy_policy') }}">Privacy Policy</a>
                <a href="{{ url('owner_refund_policy') }}">Refund Policy</a>
                <a href="{{ url('owner_blog') }}">Blog</a>
                <a href="{{ url('owner_career') }}">Career</a>
                <a href="{{ url('owner_media') }}">Media</a>
            </div>
          </div>
          <div class="footer-social pt-5 mb-4">
<a href=""><i class="bi bi-twitter"></i></a>
<a href=""><i class="bi bi-facebook"></i></a>
<a href=""><i class="bi bi-instagram"></i></a>
<a href=""><i class="bi bi-github"></i></a>
          </div>
        </div>
        <hr>
        <p class="text-center">©2023 AutoPark All Rights Reserved</p>
      </div>
    </div>
   </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('onwer/script.js') }}"></script>

    <script>
        $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
  });
      </script>

  <script>
      $msg = $('#msg').val();
      if($msg !='' && $msg != undefined)
      {

              iziToast.success({
              message: $msg,
              position: "topCenter"
          })

      }
      $msg=$('#error').val();
      if($msg !='' && $msg != undefined)
      {
              iziToast.error({
              message: $msg,
              position: "topCenter"

          });
      }
    </script>
  <script type="text/javascript">
      tinymce.init({
        selector: '.tinytext-area',  // change this value according to your html
        menubar: false
   });
  </script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script>
   new DataTable('#example');
  </script>
  <script src="{{asset('admin/parsley/parsley.min.js')}}"></script>
  </body>
</html>
