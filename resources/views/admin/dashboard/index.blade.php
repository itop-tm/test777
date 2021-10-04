@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Панель</h1>
			    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Общие продажи</h4>
							    <div class="stats-figure">{{ $totalSales }} TMT</div>
						    <a class="app-card-link-mask" href="#"></a>
							</div>
					    </div>
				    </div>
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Успешные оплаты</h4>
							    <div class="stats-figure">{{ $successPayments }}</div>
							    <div class="stats-meta text-success"></div>
						    </div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>

				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Неуспешные оплаты</h4>
							    <div class="stats-figure">
									{{ $failedPayments }}
								</div>
							    <div class="stats-meta">
								</div>
						    </div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>

				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Клиенты</h4>
							    <div class="stats-figure">{{ $clientsCount }}</div>
							    <a 
									class="stats-meta" 
									href="{{ route('admin.client.create.form') }}"
								>Новый</a>
						    </div>
					
					    </div>
				    </div>
			    </div>

			    <div class="row g-4 mb-4">
				    
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-stats-table h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">
											Оплаты по группе сервисов
										</h4>
							        </div>
							        <div class="col-auto">
								        <div class="card-header-action">
									        <a href="{{ route('admin.statistics.payments.main') }}">
												Открыть У1
											</a>
								        </div>
							        </div>
						        </div>
					        </div>
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">
							        <table class="table table-borderless mb-0">
										<thead>
											<tr>
												<th class="meta">Сервис</th>
												<th class="meta stat-cell">Количество</th>
												<th class="meta stat-cell">Сумма</th>
											</tr>
										</thead>
										<tbody>
											
										@if($paymentsTypeGroup)
											@foreach($paymentsTypeGroup as $payment)
											<tr>
												<td><a href="#">{{ $payment->service }}</a></td>
												<td class="stat-cell">{{ $payment->count }}</td>
												<td class="stat-cell">
													{{ $payment->sum }} TMT
									            </td>
											</tr>
											@endforeach
										@endif
											
										</tbody>
									</table>
						        </div>
					        </div>
				        </div>
			        </div>
			    </div>

		    </div>
	    </div>
@endsection