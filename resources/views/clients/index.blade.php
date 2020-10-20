@extends('layouts.business')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10" >
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Clientes</h3>
                <br>
                <div class="col-12 text-right justify-content-end ">
                    <a href="{{ url('clients/create')}}" class="btn btn-sm btn-primary">Agregar</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-hover" id="datatable" >
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td scope="row">
                                <div class="media align-items-center">
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="Image" style="width:40px; height:40px;" src="{{$client->imageUrl}}">
                                    </a>
                                </div>
                            </td>
                            
                            <td>{{$client->first_name}}</td>
                            <td>{{$client->last_name}}</td>
                            <td>{{$client->phone}}</td>

                            <td class="text-left">
                                <form method='post' action="{{ url('/clients/' . $client->id) }}">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <a href="./client/{{$client->id}}/details"><button
                                            class="btn btn-icon btn-2 btn-success btn-sm" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                        </button></a>

                                    <a href="./clients/{{$client->id}}/edit"><button
                                            class="btn btn-icon btn-2 btn-primary btn-sm" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </button></a>
                                    <!-- <input type="submit" onclick="return confirm('Are you sure?');" value="Delete" class='btn btn-sm btn-danger'>    -->
                                    <button class="btn btn-icon btn-2 btn-danger btn-sm" type="submit"
                                        onclick="return confirm('¿Está seguro?');">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>

@endsection