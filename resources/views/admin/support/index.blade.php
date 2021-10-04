@extends('admin.layouts.app')
@section('content')

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Tickets</h1>
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
									<button type="submit" class="btn app-btn-secondary">Search</button>
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
		@include('admin.partials.messages')
		<nav 
			class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
		>
			
			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == '' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => '']) }}" 
			>All</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'OPENED' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'OPENED']) }}" 
			>Open</a>

			<a 
				class="flex-sm-fill text-sm-center nav-link {{ Request::get('state') == 'CLOSED' ? 'active' : ''}}" 
				href="{{route(Request::route()->getName(), ['state' => 'CLOSED']) }}" 
			>Closed</a>

		</nav>

		<div class="app-card app-card-orders-table shadow-sm mb-5">
			<div class="app-card-body">
				<div class="table-responsive">
					<table class="table app-table-hover mb-0 text-left">

						<thead>
							<tr>
								<th class="cell">ID</th>
								<th class="cell">Тип</th>
								<th class="cell">Открыл</th>
								<th class="cell">Закрыл</th>
								<th class="cell">Дата</th>
								<th class="cell">Статус</th>
								<th class="cell"></th>
								<th class="cell">#</th>
							</tr>
						</thead>

						<tbody>
						@foreach($tickets as $ticket)
							<tr>
								<td class="cell">
									# {{ $ticket->id }}
								</td>

								<td class="cell">
									<span class="truncate">
										{{ $ticket->type }}
									</span>
								</td>

								<td class="cell">
									{{ $ticket->openedUser ? $ticket->openedUser->fullname() : null }}
								</td>

								<td class="cell">
									{{ $ticket->closedUser ? $ticket->closedUser->fullname() : null }}
								</td>

								<td class="cell">
									<span>{{ $ticket->created_at->format('d M') }}</span>
									<span class="note">{{ $ticket->created_at->format('h:i') }}</span>
								</td>

								<td class="cell">
									@if(in_array($ticket->state, ['OPENED']))
									<span class="badge bg-danger">
										{{ $ticket->state }}
									</span>
									@else
									<span class="badge bg-success">
										{{ $ticket->state }}
									</span>
									@endif
								</td>

								<td class="cell">
									<a 
										class="btn-sm app-btn-secondary" 
										href="{{ route('admin.support.ticket.view', ['id' => $ticket->id ]) }}"
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
												href="{{ route('admin.support.ticket.close', [
													'id' => $ticket->id
												])}}"
											><i class="fa fa-times me-2"></i> Закрыть</a>
											<a 
												class="dropdown-item" 
												href="{{ route('admin.support.ticket.update.form', [
													'id' => $ticket->id
												])}}"
											> <i class="bi bi-pencil me-2"></i> Изменить</a>
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
			@if( $tickets )
				{{ $tickets->withQueryString()->onEachSide(5)->links() }}
			@endif		
		</div>
	</div>
</div>
@endsection