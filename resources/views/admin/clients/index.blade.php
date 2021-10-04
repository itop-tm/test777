@extends('admin.layouts.app')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Клиенты</h1>
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
									<button type="submit" class="btn app-btn-secondary">Поиск</button>
								</div>
							</form>
						</div>

						<div class="col-auto">
							<select 
								class="form-select w-auto  @error('type') {{ 'is-invalid' }} @enderror"
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
						<div class="col-auto">						    
							<a 
								class="btn app-btn-secondary d-flex align-items-center" 
								href="{{ route('admin.client.create.form') }}"
							>
							<i 
                                class="bi bi-plus me-1" 
                                style="font-size: 1.5em;"
								width="1em" 
								height="1em"  
                                aria-label="bootstrap-icon"
                            ></i> Новый
							</a>
						</div>
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
								<th class="cell">ID</th>
								<th class="cell">Тип</th>
								<th class="cell">Имя</th>
								<th class="cell">Дата<br>доб.</th>
								<th class="cell">Статус</th>
								<th class="cell">#</th>
								<th class="cell">#</th>
							</tr>
						</thead>

						<tbody>
						@foreach($clients as $client)
							<tr>
								<td class="cell">
									# {{ $client->id }}
								</td>

								<td class="cell">
									<span class="truncate">
										{{ $client->type }}<br>
									</span>
								</td>

								<td class="cell">
									{{ $client->name }}
								</td>

								<td class="cell">
									<span>{{ $client->created_at->format('d M') }}</span>
									<span class="note">{{ $client->created_at->format('h:i') }}</span>
								</td>


								<td class="cell">
									@if(!$client->is_blocked)
									<span class="badge bg-success">АКТИВНЫЙ</span>
									@else
									<span class="badge bg-danger">ЗАБЛОКИРОВАН</span>
									@endif
								</td>

								<td class="cell">
									<a 
										class="btn-sm app-btn-secondary" 
										href="{{ route('admin.client.view', ['id' => $client->id]) }}"
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
												href="{{ route('admin.client.update.form', [
													'id' => $client->id
												])}}"
											>Изменить</a>
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
			@if($clients)
				{{ $clients->onEachSide(5)->links() }}
			@endif		
		</div>
	</div>
</div>
@endsection