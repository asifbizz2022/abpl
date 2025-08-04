<!-- jQuery -->
<script src="{{ url('/') }}/public/admin/assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ url('/') }}/public/admin/assets/js/popper.min.js"></script>
<script src="{{ url('/') }}/public/admin/assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ url('/') }}/public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{ url('/') }}/public/admin/assets/plugins/raphael/raphael.min.js"></script>    
<script src="{{ url('/') }}/public/admin/assets/plugins/morris/morris.min.js"></script>  
<script src="{{ url('/') }}/public/admin/assets/js/chart.morris.js"></script>
<!-- Datatables JS -->
<script src="{{ url('/') }}/public/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/public/admin/assets/plugins/datatables/datatables.min.js"></script>
<!-- Custom JS -->
<!-- Select2 JS -->
<script src="{{ url('/') }}/public/admin/assets/js/select2.min.js"></script>

<script  src="{{ url('/') }}/public/admin/assets/js/script.js"></script>

 
<script type="text/javascript">
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	var table = $('table').DataTable({
		filter: true,
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

			@if(Session::has('success'))
				toastr.success("{{ strtoupper(Session::get('success')) }}");
			@endif

			@if(Session::has('error'))
					toastr.error("{{ strtoupper(Session::get('error')) }}");
			@endif

</script>
 <script>
        // Select all checkboxes
        document.getElementById('select_all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked =  ! checkbox.checked;
            });
        });
    </script>
 
