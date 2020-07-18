<!-- jquery plugins here-->
<!-- jquery -->
<script src={{asset('js/jquery-1.12.1.min.js')}}></script>
<!-- jQuery -->
<script src="{{asset('res/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- popper js -->
<script src={{asset('js/popper.min.js')}}></script>
<!-- bootstrap js -->
<script src={{asset('js/bootstrap.min.js')}}></script>
<!-- easing js -->
<script src={{asset('js/jquery.magnific-popup.js')}}></script>
<!-- swiper js -->
<script src={{asset('js/swiper.min.js')}}></script>
<!-- swiper js -->
<script src={{asset('js/masonry.pkgd.js')}}></script>
<!-- particles js -->
<script src={{asset('js/owl.carousel.min.js')}}></script>
<script src={{asset('js/jquery.nice-select.min.js')}}></script>
<!-- slick js -->
<script src={{asset('js/slick.min.js')}}></script>
<script src={{asset('js/jquery.counterup.min.js')}}></script>
<script src={{asset('js/waypoints.min.js')}}></script>
<script src={{asset('js/contact.js')}}></script>
<script src={{asset('js/jquery.ajaxchimp.min.js')}}></script>
<script src={{asset('js/jquery.form.js')}}></script>
<script src={{asset('js/jquery.validate.min.js')}}></script>
<script src={{asset('js/mail-script.js')}}></script>
<script src={{asset('js/stellar.js')}}></script>
<script src={{asset('js/price_rangs.js')}}></script>
<!-- custom js -->
<script src={{asset('js/custom.js')}}></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('res/admin/js/demo.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('res/admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
    @if($errors->any())
    $(document).ready(function () {
        toastr.error("{{$errors->first()}}");
    });
    @endif

    @if(\Illuminate\Support\Facades\Session::has(\App\User::SUCCESS_MESSAGE))
    $(document).ready(function () {
        toastr.success("{{\Illuminate\Support\Facades\Session::get(\App\User::SUCCESS_MESSAGE)}}");
    });
    @endif

</script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
</body>

</html>
