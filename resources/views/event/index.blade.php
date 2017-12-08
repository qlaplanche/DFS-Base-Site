@extends ("layouts.app") @section('content')

<div class="bs-component">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#current">En cours</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#future">Futurs</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#past">Passés</a>
		</li>
    </ul>

	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade active" id="current">
			@include('subviews.eventTable', ['datas' => $currents])
		</div>
		<div class="tab-pane fade" id="future">
			@include('subviews.eventTable', ['datas' => $futures])
		</div>
		<div class="tab-pane fade" id="past">
			@include('subviews.eventTable', ['datas' => $pasts])
		</div>
	</div>
	<div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
</div>

@endsection