@extends ("layouts.app") @section('content')

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-3">{{$event->name}}</h1>
		<p class="lead">{{$event->description}}</p>
		<hr class="my-4">
		<p> Lieu : {{$event->place}}</p>
		<hr class="my-4">
		<p> date de début : {{Carbon\Carbon::parse($event->begin_date)->toDayDateTimeString()}}</p>
		@if(Auth::id() == $event->orga_id)
		<p class="lead">
			<a href="{{ route('event.edit', ['id' => $event->id]) }}" class="btn btn-primary btn-lg">Edit</a>
			@endif
		</p>

	</div>

	<hr class="my-4">
	<p class="lead"> Liste des participants :</p>
	<div class="table-responsive">
		<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered dataTable table-sm" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
					 style="width: 100%;">
						<thead class="thead-dark">
							<tr role="row">
								<th rowspan="1" colspan="1">Id</th>
								<th rowspan="1" colspan="1">Nom </th>
								<th rowspan="1" colspan="1">Accepté</th>
								<th rowspan="1" colspan="1">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($event->participants as $participant)
							<tr role="row" class="odd">
								<td>{{ $participant->id }}</td>
								<td>{{ $participant->user->firstname }}</td>
								<td>{{ $participant->accepted }}</td>
								<td>
									@if(Auth::id() == $event->orga_id)
									<a href="{{ route('event.participantDelete',  [ 'event_id' => $event->id, 'user_id' => Auth::user()->id]) }}" role="button" class="btn btn-outline-danger" aria-pressed="true">Delete</a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<hr class="my-4">
	<p class="lead"> Liste des incidents :</p>
	<div class="table-responsive">
		<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered dataTable table-sm" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
					 style="width: 100%;">
						<thead class="thead-dark">
							<tr role="row">
								<th rowspan="1" colspan="1">Description</th>
								<th rowspan="1" colspan="1">A eu lieu à </th>
								<th rowspan="1" colspan="1">Etat</th>
							</tr>
						</thead>
						<tbody>
							@foreach($event->problems as $problem)
							<tr role="row" class="odd">
								<td>{{ $problem->description}}</td>
								<td>{{ Carbon\Carbon::parse($problem->occured_at)->toDayDateTimeString()}}</td>
								<td>{{ $problem->situation}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<hr class="my-4">
	<a href="{{ route('event.refuse', [ 'event_id' => $event->id, 'user_id' => Auth::user()->id]) }}"class="btn btn-outline-danger">Quitter l'evenement</a>
</div>
@endsection
