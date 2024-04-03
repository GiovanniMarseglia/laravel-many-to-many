@extends('layouts.back-office.dashboard')

@section('content')

    <main class="container text-center">

        <h1>Crea</h1>

        <form class="d-flex flex-column align-items-center gap-3" action="{{route('dashboard.project.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="d-flex flex-column w-50">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title">
            </div>


            <div class="d-flex flex-column w-50">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            <div class="d-flex flex-column w-50">
                <label for="thumb">immagine</label>
                <input type="file" name="thumb" id="thumb">
            </div>

            <div class="d-flex flex-column w-50">
                <label for="date">Data</label>
                <input type="date" name="date" id="date">
            </div>

            <div class="d-flex flex-column w-50">
                <select name="type_id" id="type_id">
                    <option value="">null</option>
                    @foreach ($type as $element)
                        <option value="{{$element->id}}" {{$element->id == old('type_id') ? 'selected' : ''}}>{{$element->type}}</option>
                    @endforeach
                </select>
            </div>



            <div class="d-flex flex-column w-50">
                <select multiple name="technologias[]" id="technologias">
                    <option value="">Null</option>

                    @forelse ($technologias as $element)
                        <option value="{{$element->id}}">{{$element->name}}</option>
                    @empty
                        <option value="">non ci sono valori</option>
                    @endforelse
                </select>
            </div>

            <button class="submit">Invio</button>

        </form>

    </main>

@endsection
