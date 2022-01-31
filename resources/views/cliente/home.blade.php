@extends('layouts.cliente')


@section('title', "Home")



@section('content')
    <section>
        <img src="{{ asset('assets/image/Originals/home.jpeg') }}" alt="Imagem de pastel" width="100%" height="800px">
    </section>

  @include('cliente.fragmentos.home.cards')

@endsection()
