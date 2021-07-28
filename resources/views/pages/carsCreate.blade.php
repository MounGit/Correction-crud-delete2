@extends('template.main')


@section('content')
<section class="container">
<h2>Ajoutez une voiture</h2>

<form action="{{route('store')}}" method="post">
@csrf
Marque : <input type="text" name="brand" id="">
Année : <input type="number" min="2000" max="2021" name="year" id="">
Couleur : <input type="text" name="color" id="">
Prix : <input type="number" min="0" name="price" id="">
Remise (%) : <input type="number" min="0" max="100" name="discount" id="">
<button type="submit">Ajouter</button>

</form>
</section>
@endsection