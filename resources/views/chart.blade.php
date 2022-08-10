@extends('layouts.dashboard')

@section('title')
<title>Reporte de venta - {{ date('d-m-Y', strtotime($start)); }} hasta {{ date('d-m-Y', strtotime($end)); }}</title>
@endsection

@section('content')
<div class="card px-4 py-4">
	<div class="row">
		<div class="col-lg-5">
			<canvas id="myChart" width="400" height="400"></canvas>
		</div>
		<div class="col-lg-7">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-center">Ventas a partir del <strong>{{ date('d-m-Y', strtotime($start)); }}</strong> hasta <strong>{{ date('d-m-Y', strtotime($end)); }}</strong>
					</h4>
				</div>
				<div class="col-lg-12">
					<hr>
				</div>
				<div class="col-lg-12">
					<h5 class="text-center"><strong>Ventas efectuadas por categorías</strong></h5>

					<div class="demo-inline-spacing mt-3">
						<ul class="list-group">
							@foreach($products as $key => $value)
							<li class="list-group-item d-flex justify-content-between align-items-center">
								<strong>{{ $key }}</strong>
								<span class="badge bg-success">{{ $value }}</span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-12 mt-4 d-flex justify-content-end">
					<h5>Venta total de este periodo: <strong>$ {{ $total }} MX</strong></h5>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card my-4">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <h4 class="mt-4 mx-4 mb-0"><strong>Tabla de ventas del periodo "{{ date('d-m-Y', strtotime($start)); }}" hasta "{{ date('d-m-Y', strtotime($end)); }}"</strong></h4>
            </div>
            <div class="col-lg-8 mt-4 px-4">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-12 px-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No. venta</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Sucursal</th>
                            <th>Fecha de venta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($sales as $sale)

                        <tr>
                            <td><strong>{{ $sale->id }}</strong></td>
                            <td>{{ $sale->brand }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ $sale->category }}</td>
                            <td>{{ $sale->office }}</td>
                            <td>{{ $sale->created_at->diffForHumans() }}</td>
                            <td>
                            	<button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#product_{{ $sale->id }}">
                              	<span class="tf-icons bx bx-dollar"></span>&nbsp; Mostrar venta
                            	</button>

                            	@include('partials.show-sale')
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6"><h3 class="mb-0 text-center"><strong>No se encontró ningúna venta</strong></h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end px-4">
                {{-- {{ $sales->links('vendor.pagination.bootstrap-4') }} --}}
           </div>
       </div>
   </div>

@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

<script>
	$(document).ready(function(){
		var cData = JSON.parse(`<?php echo $data; ?>`);
		console.log(cData.label);

		const ctx = document.getElementById('myChart').getContext('2d');

		const myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: cData.label,
				datasets: [{
					label: 'Reporte de ventas',
					data: cData.data,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});

	});
</script>

@endsection