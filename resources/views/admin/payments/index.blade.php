@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Оплаты</h1>
			</div>
			<div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						
						<div class="col-auto">
							<form class="table-search-form row gx-1 align-items-center">
								<div class="col-auto">
									<input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
								</div>
								<div class="col-auto">
									<button type="submit" class="btn app-btn-secondary">Search</button>
								</div>
							</form>
						</div>

						<div class="col-auto">
							<select 
								class="form-select w-auto"
								id="type" 
								name="type"
							>
								@foreach(getClientTypes() as $key => $type)
								<option 
									value="{{ $type }}"
									{{ Request::get('type') == $type ? 'checked' : '' }}
								>{{ $type }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-auto">						    
							<a class="btn app-btn-secondary" href="#">
								Применить
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<nav 
			class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
		>
			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == '' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => '']) }}" 
			>Все</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'PENDING' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'PENDING']) }}" 
			>PENDING</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'SUCCESS' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'SUCCESS']) }}" 
			>SUCCESS</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'FAILED' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'FAILED']) }}" 
			>FAILED</a>
		
		</nav>


		<div class="app-card app-card-orders-table shadow-sm mb-5">
			<div class="app-card-body">
				<div class="table-responsive">
					<table class="table app-table-hover mb-0 text-left">
						<thead>
							<tr>
								<th class="cell">ID/UUID</th>
								<th class="cell">Сервис</th>
								<th class="cell">Клиенты</th>
								<th class="cell">Дата</th>
								<th class="cell">Статус</th>
								<th class="cell">Сумма</th>
								<th class="cell"></th>
								<th class="cell">#</th>
							</tr>
						</thead>

						<tbody>
						@foreach($payments as $payment)
							<tr>
								<td class="cell">
									# {{ $payment->id }}<br>
									# {{ $payment->uuid }}
								</td>

								<td class="cell">
									<span class="truncate">
										{{ $payment->service }}
									</span>
								</td>

								<td class="cell">
									{{ $payment->client->type }}<br>
									{{ $payment->client->name }}
								</td>

								<td class="cell">
									<span>{{ $payment->created_at->format('d M') }}</span>
									<span class="note">{{ $payment->created_at->format('h:i') }}</span>
								</td>

								<td class="cell">
									@if(in_array($payment->state, ['CREATED', 'FAILED']))
									<span class="badge bg-danger">
										{{ $payment->state }}
									</span>
									@else
									<span class="badge bg-success">
										{{ $payment->state }}
									</span>
									@endif
								</td>


								<td class="cell">
									{{ $payment->amount }} TMT
								</td>

								<td class="cell">
									<a 
										class="btn-sm app-btn-secondary" 
										href="{{ route('admin.payment.view', [
											'uuid' => $payment->uuid
										]) }}"
									>Посмотреть</a>
								</td>

								<td class="cell">

									<div class="dropdown" style="cursor: pointer;">
										<div 
											class="dropdown-toggle no-toggle-arrow" 
											data-bs-toggle="dropdown" 
											aria-expanded="false"
											id="drop"
											
										>
											<i class="bi bi-three-dots-vertical "></i>
										</div>
										<div class="dropdown-menu" aria-labelledby="drop">
											<h6 class="dropdown-header">Действие</h6>
											<a 
												class="dropdown-item" 
												href="{{ route('admin.support.ticket.form', [
													'payment_uuid' => $payment->uuid,
													'type' => 'PAYMENT'
												])}}"
											>Открыть тикет</a>
										</div>
									</div>
						
								</td>
							</tr>
						@endforeach
						</tbody>

					</table>
				</div>
				
			</div>		
		</div>

		<div class="d-flex justify-content-center">
			@if($payments)
				{{ $payments->withQueryString()->onEachSide(5)->links() }}
			@endif
		</div>	
		
	</div>
</div>
@endsection