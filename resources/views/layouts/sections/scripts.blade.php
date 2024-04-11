<!-- BEGIN: Vendor JS-->
{{-- <script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script') --}}
<!-- END: Page JS-->


<script>
    function base_url() {
        let url = '{{ url('/') }}'
        return url;
    }
</script>
<script src="{{ asset('assets_use/static/js/components/dark.js') }}"></script>
<script src="{{ asset('assets_use/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets_use/compiled/js/app.js') }}"></script>

<script src="{{ asset('assets_use/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
<script src="{{ asset('assets_use/static/js/pages/sweetalert2.js') }}"></script>>
<script>
    document.querySelector('.not-number-negative').addEventListener('input', function() {
        let value = this.value;
        if (isNaN(value) || value < 0) {
            this.value = "";
        }
    });
</script>
@yield('vendor-script')
@stack('pricing-script')
@yield('page-script')
