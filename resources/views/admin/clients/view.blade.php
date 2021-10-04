@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Client - {{ $client->id }}</h1>
			</div>
		</div>
		
		<div class="d-flex justify-content-start">

			<div class="col-xs-12 col-md-8">
				<div class="app-card app-card-notification shadow-sm mb-4">
					<div class="app-card-header px-4 py-3">
						<div class="row g-3 align-items-center">
							<div class="col-12 col-lg-auto text-center text-lg-start">						        
								<div class="app-icon-holder icon-holder-mono pt-2">
									<i 
										class="bi bi-building" 
										style="font-size: 1.5em;" 
										role="img" 
										aria-label="bootstrap-icon"
									></i>
								</div>
							</div>
							<div class="col-12 col-lg-auto text-center text-lg-start">
								<div class="notification-type mb-2">

								@if($client->is_blocked)
								<span class="badge bg-danger">
									ЗАБЛОКИРОВАН
								</span>
								@else
								<span class="badge bg-success">
									АКТИВНЫЙ
								</span>
								@endif

								</div>
								<h4 class="notification-title mb-1">{{ $client->name }} </h4>
								
								<ul class="notification-meta list-inline mb-0">
									<li class="list-inline-item">Дата создание</li>
									<li class="list-inline-item">|</li>
									<li class="list-inline-item">{{ $client->created_at }}</li>
								</ul>
							
							</div>
						</div>
					</div>
					<div class="app-card-body p-4">
						<div class="notification-content">
							<div class="col-xs-12 col-md-8">

								<div class="d-flex justify-content-between pt-2">
									<div class="col-3"> 
										ID
									</div>
									<div class="col-6"> 
										{{ $client->id }}
									</div>
									<div class="col-3"> 
							
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-3"> 
										Имя
									</div>
									<div class="col-6"> 
										{{ $client->name }}
									</div>
									<div class="col-3"> 
							
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-3"> 
										Тип
									</div>
									<div class="col-6"> 
										{{ $client->type }}
									</div>
									<div class="col-3"> 
							
									</div>
								</div>
								
								
								<div class="d-flex justify-content-between pt-2">
									<div class="col-3"> 
										Дата обновление
									</div>
									<div class="col-6"> 
										{{ $client->updated_at }}
									</div>
									<div class="col-3"> 
						
									</div>
								</div>
							</div>

							
							<div class="col-xs-12 pt-4">
								ТОКЕН
								<br>
								<pre>{{ $client->token }}</pre>
							</div>

						</div>
					</div>
					<div class="app-card-footer px-4 py-3 d-flex justify-content-end">
						<form method="POST" action="{{ route('admin.client.delete', ['id' => $client->id]) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}

							<div class="form-group">
								<button class="btn btn-danger text-white">
									Удалить
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		
	</div>
</div>
@endsection