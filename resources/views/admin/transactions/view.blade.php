@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Транзакция - {{ $transaction->id }}</h1>
			</div>
		</div>
		
		<div class="d-flex justify-content-start">

			<div class="col-xs-12 col-md-8">
				<div class="app-card app-card-notification shadow-sm mb-4">
					<div class="app-card-header px-4 py-3">
						<div class="row g-3 align-items-center">
							<div class="col-12 col-lg-auto text-center text-lg-start">						        
								<div class="app-icon-holder icon-holder-mono">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
									</svg>
								</div>
							</div>
							<div class="col-12 col-lg-auto text-center text-lg-start">
								<div class="notification-type mb-2">

								@if(in_array($transaction->state, ['CREATED', 'EXCEPTION']))
								<span class="badge bg-danger">
									{{ $transaction->state }}
								</span>
								@else
								<span class="badge bg-success">
									{{ $transaction->state }}
								</span>
								@endif

								</div>
								<h4 class="notification-title mb-1">{{ $transaction->type }} | {{ $transaction->name }}</h4>
								
								<ul class="notification-meta list-inline mb-0">
									<li class="list-inline-item">Дата создание</li>
									<li class="list-inline-item">|</li>
									<li class="list-inline-item">{{ $transaction->created_at }}</li>
								</ul>
							
							</div>
						</div>
					</div>
					<div class="app-card-body p-4">
						<div class="notification-content">
							<div class="col-xs-12 col-md-8">
								<div class="d-flex justify-content-between">
									<div class="col-4"> 
										UUID Оплаты
									</div>
									<div class="col-6"> 
										{{ $transaction->payment_uuid }}
									</div>
									<div class="col-2"> 
							
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										ID
									</div>
									<div class="col-6"> 
										{{ $transaction->id }}
									</div>
									<div class="col-2"> 
							
									</div>
								</div>
								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Клиент
									</div>
									<div class="col-6"> 
										<a 
											href="{{ route('admin.client.view', ['id' => $transaction->client->id]) }}"
										>
											{{ $transaction->client->name }}
										</a>
									</div>

									<div class="col-2"> 
									</div>
								</div>
								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Сервис
									</div>
									<div class="col-6"> 
										{{ $transaction->service }}
									</div>
									<div class="col-2"> 
									
									</div>
								</div>
								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Тип
									</div>
									<div class="col-6"> 
										{{ $transaction->type }}
									</div>
									<div class="col-2"> 
								
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Очередь
									</div>
									<div class="col-6"> 
										{{ $transaction->order }}
									</div>
									<div class="col-2"> 
						
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Дата создание
									</div>
									<div class="col-6"> 
										{{ $transaction->updated_at }}
									</div>
									<div class="col-2"> 
						
									</div>
								</div>
								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Дата окончание
									</div>
									<div class="col-6"> 
										{{ $transaction->updated_at }}
									</div>
									<div class="col-2"> 
						
									</div>
								</div>
							</div>

							
							<div class="col-xs-12 pt-4">
								Исключение
								<br>
								<pre>{{ $transaction->exception }}</pre>
							</div>
							
							<hr>

							<div class="col-xs-12">
								Ответ
								<br>
								<pre>{{ json_encode($transaction->response, JSON_PRETTY_PRINT) }}</pre>
							</div>

							<hr>

							<div class="col-xs-12">
								Мета
								<div>
									<pre>{{ json_encode($transaction->meta, JSON_PRETTY_PRINT) }}</pre>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection