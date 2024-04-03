@extends("layouts.back-office.dashboard")


@section('content')

<div class="container text-center d-flex flex-column align-items-center">

    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>
    <img src="{{ asset('storage/images/'.$project->thumb )}}" alt="">
    <span>{{$project->date}}</span>

    <div class="d-flex gap-2 py-2">
        @foreach ($project->technologias as $element)
            <span class="badge rounded-pill text-bg-success p-2">{{$element->name}}</span>
        @endforeach
    </div>

    <form action="{{route('dashboard.project.destroy', $project->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Elimina</button>
    </form>
</div>

@endsection
