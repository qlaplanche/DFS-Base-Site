@extends ("layouts.app")
@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">{{$event->name}}</h1>
    <p class="lead">{{$event->description}}</p>
    <hr class="my-4">
    <p> Lieu : {{$event->place}}</p>
    <hr class="my-4">
    <p> date de début : {{Carbon\Carbon::parse($event->begin_date)->toDayDateTimeString()}}</p>
     <p class="lead">
    <a href="{{ route('event.edit', ['id' => $event->id]) }}"  class="btn btn-primary btn-lg">Edit</a>
  </p>

  <p> Lieu : {{$event->problems}}</p>
  </div>
</div>


@endsection