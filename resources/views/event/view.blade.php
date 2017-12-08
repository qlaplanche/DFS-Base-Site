@extends ("layouts.app")
@section('content')

<p>{{}}</p>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">{{$event->name}}</h1>
    <p class="lead">{{$event->description}}</p>
    <hr class="my-4">
    <p> Lieu : {{$event->place}}</p>
    <hr class="my-4">
    <p> date de début : {{Carbon\Carbon::parse($event->begin_date)->toDayDateTimeString()}}</p>
     <p class="lead">
    <a href="{{ route('event.edit', ['id' => $data->id]) }}"  class="btn btn-primary btn-lg">Edit</a>
  </p>
  </div>
</div>

<div class="table-responsive">
	<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered dataTable table-sm" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
				 style="width: 100%;">
					<thead class="thead-dark">
						<tr role="row">
							<th rowspan="1" colspan="1">Id</th>
							<th rowspan="1" colspan="1">Nom participant</th>
							<th rowspan="1" colspan="1">Accepté</th>
							<th rowspan="1" colspan="1" style="width:300px;">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($participants as $participant)
						<tr role="row" class="odd">
							<td>{{ $participant->id }}</td>
							<td>{{ $participant->user->name }}</td>
							<td>{{ $participant->accepted }}</td>
							<td>
                            @if(Auth::id() == $event->orga)
								<a href="{{ route('participants.delete', ['id' => $data->id]) }}" role="button" class="btn btn-outline-danger" aria-pressed="true">Delete</a>
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


@endsection