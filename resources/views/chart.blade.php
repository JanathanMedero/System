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
				<div class="col-lg-12 mt-2">
					<h5>Venta total de este periodo: <strong>$ {{ $total }} MX</strong></h5>
				</div>
			</div>
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