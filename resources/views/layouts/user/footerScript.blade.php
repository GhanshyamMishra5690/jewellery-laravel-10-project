
<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{ asset('user/assets/js/vendor/modernizr.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('user/assets/js/vendor/jquery.js') }}"></script>
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
 
<script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('user/assets/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/js.cookie.js') }}"></script>
<!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
<script src="{{ asset('user/assets/js/vendor/jquery-ui.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/sal.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/counterup.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/waypoints.min.js') }}"></script>
<script src="{{ asset('admin/helper.js') }}"></script>
<script src="{{ asset('admin/carts.js') }}"></script>
<script>
    $(document).ready(function() {
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
        @if(Session::has('info'))
            toastr.info('{{ Session::get('info') }}');
        @endif
        @if(Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif
    });
</script>
<!-- Main JS -->
<script src="{{ asset('user/assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
@stack('scripts')
</body>

 </html>