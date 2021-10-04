@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Новый тикет</h1>
			</div>
		</div>
		
		<div class="d-flex justify-content-start">
			<div class="col-xs-12 col-md-8">
				<form method="POST" action="{{ route('admin.support.ticket.create') }}">
					@csrf()
					<div class="app-card app-card-notification shadow-sm mb-4">
						<div class="app-card-header px-4 py-3">
							Тикет
						</div>
						<div class="app-card-body p-4">
							<div class="mb-3">
								<label 
									for="payment_uuid" 
									class="form-label"
								>UUID Оплаты</label>
								<input 
									type="text" 
									class="form-control" 
									id="payment_uuid" 
									value="{{ old('payment_uuid') ?? Request::get('payment_uuid') }}"
									name="payment_uuid"
								>
							</div>

							<div class="mb-3">
								<label for="type" class="form-label">Тип</label>
								<select class="form-control" id="type" name="type">
									<option 
										value="PAYMENT"
										{{ request()->get('type') == 'PAYMENT' ? 'checked' : '' }}
									>Оплата</option>
									<option 
										value="OTHER"
										{{ request()->get('type') == 'OTHER' ? 'checked' : '' }}
									>Другое</option>
								</select>
							</div>

							<div class="mb-3">
								<label for="description" class="form-label">Описание</label>
								<textarea 
									class="form-control"
									name="description" 
									id="description" 
									cols="90" 
									rows="90"
									required
								>{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="app-card-footer px-4 py-3">
							<button 
								type="submit" 
								class="btn app-btn-primary"
							>Создать</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>
@endsection