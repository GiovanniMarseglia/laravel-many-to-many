@extends('layouts.back-office.dashboard')

@section('content')
<div class="container-fluid">
    <div class="">



    </div>
</div>


<div class="container-fluid">

    <div class="row row-cols-3">
        @foreach ($project as $element)
            <div class="cols d-flex flex-column align-items-center">
                <h1>{{$element['title']}}</h1>
                {{-- <figure>
                    <img src="{{$element['thumb']}}" alt="">
                </figure> --}}
                <figure>
                    <img src="{{ asset('storage/images/'.$element['thumb']) }}" alt="">
                </figure>

                <span>{{$element['date']}}</span>
                <a class="btn btn-primary mt-2" href="{{ route('dashboard.project.show', $element->id) }}">Dettagli</a>
                <a class="btn btn-primary mt-2" href="{{ route('dashboard.project.edit', $element->id) }}">Modifica</a>
            </div>
        @endforeach

    </div>
</div>


<div class="container-fluid d-flex justify-content-center">



    <a class="btn btn-primary" href="{{route('dashboard.project.create')}}">Aggiungi progetto</a>


</div>
@endsection
