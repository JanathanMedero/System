@extends('layouts.dashboard')

@section('title')
<title>Ventas</title>
@endsection

@section('content')
@livewire('show-sales')
@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.form-delete').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Esta seguro que desea eliminar esta venta?`,
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

<script type="text/javascript">
    document.getElementById('dates').onchange = function() {
        document.getElementById('date_start').disabled = !this.checked;
        document.getElementById('date_end').disabled = !this.checked;
        document.getElementById('button_send').disabled = !this.checked;
    };
    document.getElementById('today').onchange = function() {
        document.getElementById('date_start').disabled = this.checked;
        document.getElementById('date_end').disabled = this.checked;
        document.getElementById('button_send').disabled = !this.checked;
    };
    document.getElementById('month').onchange = function() {
        document.getElementById('date_start').disabled = this.checked;
        document.getElementById('date_end').disabled = this.checked;
        document.getElementById('button_send').disabled = !this.checked;
    };
</script>

@endsection