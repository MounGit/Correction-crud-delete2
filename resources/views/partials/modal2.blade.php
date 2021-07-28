<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
    -4000€
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">-4000€</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Marque</th>
                            <th scope="col">Année</th>
                            <th scope="col">Couleur</th>
                            <th scope="col">Prix de base</th>
                            <th scope="col">Remise</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataLow as $item)
                        <tr>
                            <th scope="row">{{$item->brand}}</th>
                            <td>{{$item->year}}</td>
                            <td>{{$item->color}}</td>
                            @if ($item->discount > 0)
                            <td class="text-decoration-line-through">{{$item->price}}</td>
                            <td>{{$item->discount}}</td>

                            <td>{{$item->price -= ($item->price*$item->discount/100)}}</td>
                            @else
                            <td>{{$item->price}}</td>
                            <td>{{$item->discount}}</td>
                            <td>{{$item->price}}</td>
                            @endif

                            <td>
                                <form action="{{route('delete', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary" type="submit">x</button>

                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>