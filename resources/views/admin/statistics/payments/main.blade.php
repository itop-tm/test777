@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Статистика - У1</h1>
			</div>
			<div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						
						<form 
							class="d-flex align-items-center"
							action="{{ route('admin.statistics.payments.main') }}"
						>
							<div class="col-auto">
								<select 
									class="form-select w-auto" 
									name="service"
								>
									@foreach($types as $key => $type)
									<option 
										value="{{ $type }}"
										{{ Request::get('service') == $key ? 'selected' : '' }}
									>{{ $key }}</option>
									@endforeach
								</select>
							</div>

							<div class="col-auto mx-2">						    
								<button 
									class="btn app-btn-secondary" 
									type="submit"
								>
									Применить
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="app-card app-card-orders-table shadow-sm mb-5">
			<div class="app-card-body">
				<div class="table-responsive">
					<table class="table app-table-hover mb-0 text-left">
						<thead>
							<tr>
								<th class="cell">День</th>
								<th class="cell">Сервис</th>
								<th class="cell">Кол</th>
								<th class="cell">Сумма</th>
							</tr>
						</thead>

						<tbody>
						@foreach($payments as $payment)
							<tr>
								<td class="cell">
									{{ $payment->day }}
								</td>

								<td class="cell">
									{{ $payment->service }}
								</td>

								<td class="cell">
									{{ $payment->count }}
								</td>

								<td class="cell">
									{{ $payment->sum }} TMT
								</td>

							</tr>
						@endforeach
						</tbody>

						<thead>
							<tr>
								<th class="cell">Итого:</th>
								<th class="cell"></th>
								<th class="cell">{{ $payments->sum('count') }}</th>
								<th class="cell">{{ $payments->sum('sum') }} TMT</th>
							</tr>
						</thead>

					</table>
				</div>
				
			</div>		
		</div>
		
	</div>
</div>
@endsection