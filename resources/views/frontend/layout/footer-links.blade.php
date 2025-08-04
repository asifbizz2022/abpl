    <!-- Footer End -->
    <!-- jQuery -->
        <script src="{{ url('/') }}/public/admin/assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script src="{{ url('/') }}/public/assets/js/index.js"></script>

    <!-- AOS Animated JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const progressBar = document.getElementById("progressBar");
    const carousel = document.getElementById("homeSlideMain");
    const intervalTime = 3000; // 3 seconds

    function startProgressBar() {
        progressBar.style.width = "0%";
        setTimeout(() => {
            progressBar.style.transition = `width ${intervalTime}ms linear`;
            progressBar.style.width = "100%";
        }, 10);
    }

    function resetProgressBar() {
        progressBar.style.transition = "none";
        progressBar.style.width = "0%";
    }

    // ✅ Slide change पर progress bar reset और restart होगी
    carousel.addEventListener("slide.bs.carousel", () => {
        resetProgressBar();
    });

    carousel.addEventListener("slid.bs.carousel", () => {
        startProgressBar();
    });

    // ✅ शुरुआत में progress bar को start करना
    startProgressBar();
</script>
    <!-- slide Home End -->
<style type="text/css">
     toastr.info {
        background:blue;
    }
</style>
<script>

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
           
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "5000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

  @if(Session::has('message'))
      toastr.info("{{ strtoupper(Session::get('message')) }}");
  @endif


</script>
