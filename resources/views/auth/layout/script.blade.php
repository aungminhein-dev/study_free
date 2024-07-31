<script src="{{ asset('admin_ui/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin_ui/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('admin_ui/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

<!-- Slider -->
<script src="{{ asset('admin_ui/vendor/nouislider/dist/nouislider.min.js') }}"></script>

<!-- Smooth scroll -->
<script src="{{ asset('admin_ui/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

<!-- Charts -->
<script src="{{ asset('admin_ui/vendor/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('admin_ui/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

<!-- Datepicker -->
<script src="{{ asset('admin_ui/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{ asset('admin_ui/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

<!-- Moment JS -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script> --}}

<!-- Vanilla JS Datepicker -->
<script src="{{ asset('admin_ui/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Notyf -->
<script src="{{ asset('admin_ui/vendor/notyf/notyf.min.js') }}"></script>

<!-- Simplebar -->
<script src="{{ asset('admin_ui/vendor/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js') }}"></script>

<!-- Volt JS -->
<script src="{{ asset('admin_ui/assets/js/jquery.js') }} "></script>


<script>
    function generateUsername() {
        const nameInput = document.getElementById('name').value;
        const username = nameInput.toLowerCase().replace(/\s+/g, '_');
        document.getElementById('username').value = username;
    }
    $('#logout').click(function() {
        logout()
    })

    function logout() {
        $('#logoutForm').submit()
    }
</script>
<script src="{{ asset('admin_ui/assets/js/datatable.min.js') }} "></script>
<script src="{{ asset('admin_ui/assets/js/simple-datatable.js') }} "></script>
<script src="{{ asset('admin_ui/assets/js/datatable.js') }} "></script>
<script src="{{ asset('admin_ui/assets/js/volt.js') }} "></script>
