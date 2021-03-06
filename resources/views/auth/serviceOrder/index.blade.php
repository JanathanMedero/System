@extends('layouts.dashboard')

@section('title')
<title>Ordenes de servicio</title>
@endsection

@section('content')
@livewire('show-service-orders')
@endsection

@section('extra-js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

	<script type="text/javascript">
		$('.show_confirm').click(function(event) {
			var form =  $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
				title: `Esta seguro que desea eliminar este empleado?`,
				text: "Esta acción no se puede revertir",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				buttons: ["Cancelar", "Si, Borrar"],
			})
			.then((willDelete) => {
				if (willDelete) {
					form.submit();
				}
			});
		});
	</script>

	@endsection