@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Добавление клиента</h1>
			</div>
		</div>
		
		<div class="d-flex justify-content-start">
			<div class="col-xs-12 col-md-8">
				<form method="POST" action="{{ route('admin.client.create') }}">
					@csrf()
					<div class="app-card app-card-notification shadow-sm mb-4">
						<div class="app-card-header px-4 py-3">
							Клиент
						</div>
						<div class="app-card-body p-4">
							<div class="mb-3">
								<label for="type" class="form-label">Тип клиента</label>
								<select 
									class="form-select @error('type') {{ 'is-invalid' }} @enderror"
									id="type" 
									name="type"
								>
									@foreach(getClientTypes() as $key => $type)
									<option 
										value="{{ $type }}"
										{ old('type') == $type ? 'checked' : '' }}
									>{{ $type }}</option>
									@endforeach
								</select>
								@error('type')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label 
									for="name" 
									class="form-label"
								>Имя</label>
								<input 
									type="text" 
									class="form-control @error('name') {{ 'is-invalid' }} @enderror"
									id="name"
									value="{{ old('name') }}"
									name="name"
								>
								@error('name')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
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