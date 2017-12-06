@extends ("layouts.admin") @section('content')
<div class="row">
	<div class="table-responsive">
		<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
					 style="width: 100%;">
						<thead class="thead-dark">
							<tr role="row">
								<th rowspan="1" colspan="1">Id</th>
								<th rowspan="1" colspan="1">First Name</th>
                <th rowspan="1" colspan="1">Last Name</th>
                <th rowspan="1" colspan="1">Email</th>
								<th rowspan="1" colspan="1" style="width:300px;">Actions</th>
							</tr>
						</thead>
						<tbody>
            @foreach($users as $user)
							<tr role="row" class="odd">
								<td>{{ $user->id }}</td>
								<td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
								<td>
									<a href="{{ route('adminprofile', ['id' => $user->id]) }}" role="button" class="btn btn-outline-primary" aria-pressed="true">View</a>
									<a href="{{ route('adminprofile.edit', ['id' => $user->id]) }}" role="button" class="btn btn-outline-info" aria-pressed="true">Edit</a>
									<a href="{{ route('adminprofile.delete', ['id' => $user->id]) }}" role="button" class="btn btn-outline-danger" aria-pressed="true">Delete</a>
								</td>

							</tr>
              @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection