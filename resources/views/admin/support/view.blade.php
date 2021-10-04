@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Тикет - {{ $ticket->id }}</h1>
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

								@if(in_array($ticket->state, ['OPENED']))
								<span class="badge bg-danger">
									{{ $ticket->state }}
								</span>
								@else
								<span class="badge bg-success">
									{{ $ticket->state }}
								</span>
								@endif

								</div>
								<h4 class="notification-title mb-1">{{ $ticket->type }}</h4>
								
								<ul class="notification-meta list-inline mb-0">
									<li class="list-inline-item">Created</li>
									<li class="list-inline-item">|</li>
									<li class="list-inline-item">{{ $ticket->created_at }}</li>
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
										{{ $ticket->payment_uuid }}
									</div>
									<div class="col-2"> 
							
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										ID
									</div>
									<div class="col-6"> 
										{{ $ticket->id }}
									</div>
									<div class="col-2"> 
							
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Открыл
									</div>
									<div class="col-6"> 
										<a 
											href="#"
										>
											{{ $ticket->openedUser->fullname() }} | {{ $ticket->openedUser->id }}
										</a>
									</div>

									<div class="col-2"> 
									</div>
								</div>

								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Закрыл
									</div>
									<div class="col-6">
										@if($ticket->closedUser)
										<a 
											href="{{ route('admin.user.view', ['id' => $ticket->closedUser->id]) }}"
										>
											{{ $ticket->closedUser->fullname() }} | {{ $ticket->closedUser->id }}
										</a>
										@endif
									</div>

									<div class="col-2"> 
									</div>
								</div>
								
								<div class="d-flex justify-content-between pt-2">
									<div class="col-4"> 
										Дата закрытия
									</div>
									<div class="col-6"> 
										{{ $ticket->closed_at }}
									</div>
									<div class="col-2"> 
						
									</div>
								</div>
							</div>

							
							<div class="col-xs-12 pt-4">
								Описание
								<br>
								<pre>{{ $ticket->description }}</pre>
							</div>

						</div>
					</div>
					<div class="app-card-footer px-4 py-3 d-flex justify-content-end">
						<a 
							class="btn btn-success text-white"
							href="{{ route('admin.support.ticket.close', ['id' => $ticket->id]) }}"
						>
							Закрыть
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection