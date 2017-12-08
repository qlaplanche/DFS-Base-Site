<div class="table-responsive">
	<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered dataTable table-sm" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
				 style="width: 100%;">
					<thead class="thead-dark">
						<tr role="row">
							<th rowspan="1" colspan="1">Id</th>
							<th rowspan="1" colspan="1">Nom</th>
							<th rowspan="1" colspan="1">Lieu</th>
							<th rowspan="1" colspan="1">Organisateur</th>
							<th rowspan="1" colspan="1" style="width:300px;">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $data)
						<tr role="row" class="odd">
							<td>{{ $data->id }}</td>
							<td>{{ $data->name }}</td>
							<td>{{ $data->place }}</td>
							<td>{{ $data->orga_id }}</td>
							<td>
								<a href="{{ route('event.view', ['id' => $data->id]) }}" role="button" class="btn btn-outline-primary" aria-pressed="true">View</a>
                            @if(Auth::id() == $data->orga_id)
								<a href="{{ route('event.edit', ['id' => $data->id]) }}" role="button" class="btn btn-outline-info" aria-pressed="true">Edit</a>
								<a href="{{ route('event.delete', ['id' => $data->id]) }}" role="button" class="btn btn-outline-danger" aria-pressed="true">Delete</a>
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