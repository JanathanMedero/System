@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card mt-4 shadow" style="border-radius: 0px;">

				<div class="card-body pt-4 pb-1 px-4">

					<div class="row">
						<div class="col-md-12 d-flex justify-content-center">
							<h4><strong>Iniciar sesión</strong></h4>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>

					<div class="row">
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="col-md-12 mb-3">
								<label for="email" class="form-label">Correo electrónico</label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingrese el correo electrónico" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>

							<div class="col-md-12 mb-3">
								<label for="password" class="form-label">Contraseña</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese su contraseña" value="{{ old('password') }}" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="col-md-4 my-3">
								<button type="submit" class="btn btn-primary">
									Iniciar sesión
								</button>
							</div>
						</form>
					</div>

					{{-- <div class="row">
						<div class="col-md-4">
							<img src="{{ asset('images/login.svg') }}" class="img-fluid">
						</div>
						<div class="col-md-8 d-flex align-items-center justify-content-center">
							<div class="row">
								<form method="POST" action="{{ route('login') }}">
								@csrf
									<div class="col-md-12">
										<div class="row mb-3">
											<div class="col-md-4">
												<label for="email" class="col-md-4 col-form-label text-md-end">Correo electrónico</label>
											</div>

											<div class="col-md-8">
												<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

												@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
									</div>

										<div class="row mb-3">
											<label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

											<div class="col-md-6">
												<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

												@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="row mb-0">
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn btn-primary">
													Iniciar sesión
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
