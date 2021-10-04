@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Транзакции</h1>
			</div>
			<div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						
						<div class="col-auto">
							<form class="table-search-form row gx-1 align-items-center">
								<div class="col-auto">
									<input 
										type="text"
										id="search-orders" 
										name="searchorders" 
										class="form-control search-orders" 
										placeholder="Search"
									>
								</div>
								<div class="col-auto">
									<button type="submit" class="btn app-btn-secondary">Применить</button>
								</div>
							</form>
						</div>

						<div class="col-auto">
							<select class="form-select w-auto" >
								<option selected value="option-1">All</option>
								<option value="option-2">This week</option>
								<option value="option-3">This month</option>
								<option value="option-4">Last 3 months</option>
							</select>
						</div>

						<div class="col-auto">						    
							<a class="btn app-btn-secondary" href="#">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
									<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
								</svg>
								Download CSV
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
			>All</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'OK' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'OK']) }}" 
			>Successed</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'EXCEPTION' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'EXCEPTION']) }}" 
			>Failed</a>

		</nav>


		<div class="app-card app-card-orders-table shadow-sm mb-5">
			<div class="app-card-body">
				<div class="table-responsive">
					<table class="table app-table-hover mb-0 text-left">

						<thead>
							<tr>
								<th class="cell">ID/UUID</th>
								<th class="cell">Сервис</th>
								<th class="cell">Имя</th>
								<th class="cell">Очередь</th>
								<th class="cell">ID Клиента</th>
								<th class="cell">Дата</th>
								<th class="cell">Статус</th>
								<th class="cell"></th>
							</tr>
						</thead>

						<tbody>
						@foreach($transactions as $transaction)
							<tr>
								<td class="cell">
									# {{ $transaction->id }}<br>
									# {{ $transaction->payment_uuid }}
								</td>

								<td class="cell">
									<span class="truncate">
										{{ $transaction->service }}
									</span>
								</td>

								<td class="cell">
									{{ $transaction->name }}
								</td>

								<td class="cell">
									{{ $transaction->order }}
								</td>

								<td class="cell">
									{{ $transaction->user_id}}
								</td>

								<td class="cell">
									<span>{{ $transaction->created_at->format('d M') }}</span>
									<span class="note">{{ $transaction->created_at->format('h:i') }}</span>
								</td>

								<td class="cell">
									@if(in_array($transaction->state, ['CREATED', 'EXCEPTION']))
									<span class="badge bg-danger">
										{{ $transaction->state }}
									</span>
									@else
									<span class="badge bg-success">
										{{ $transaction->state }}
									</span>
									@endif
								</td>

								<td class="cell">
									<a 
										class="btn-sm app-btn-secondary" 
										href="{{ route('admin.transaction.view', ['id' => $transaction->id ]) }}"
									>View</a>
								</td>
								
							</tr>
						@endforeach
						</tbody>

					</table>
				</div>
				
			</div>		
		</div>

		<div class="d-flex justify-content-center">
			@if( $transactions )
				{{ $transactions->withQueryString()->onEachSide(5)->links() }}
			@endif		
		</div>
	</div>
</div>
@endsection