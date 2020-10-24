@extends('layouts.business')

@section('content')

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-10">
        <div class="card shadow">
            <div class="card  shadow">
                <div class="card-body">
                  
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">SKU</label>
                                    <input type="text" id="input-name" name="sku" class="form-control form-control-alternative" require value="{{ isset($product->sku)?$product->sku:""}}">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Nombre</label>
                                    <input type="text" id="input-name" name="name" class="form-control form-control-alternative" require value="{{ isset($product->name)?$product->name:""}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Precio</label>
                                    <input type="text" id="input-name" name="price" class="form-control form-control-alternative" require value="{{ isset($product->price)?$product->price:""}}">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Marca</label>
                                    <select class="form-control" name="companyId">
                                        @foreach($companies as $company)
                                            @if($company->id == $product->company->id)
                                                <option value="{{$company->id}}" selected>{{$company->name}}</option>
                                            @else
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-control-label" for="input-name">Imagen</label>

                                @if(isset($product->imageUrl))<br>

                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img src="{{asset($product->imageUrl)}}" id="imgimageUrl" class="">
                                        </label>
                                    </div><br>

                                    <input type='file' name="imageUrl" id="imageUrl" class='form-control-file'
                                        style="display:none">
                                @else
                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img id="imageUrl" class="rounded-circle">
                                        </label>
                                    </div>
                                    <input type='file' name="imageUrl" id="imageUrl" class='form-control-file'>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{ url('products')}}" class='btn btn-primary btn-md'>Cancelar</a>
                        <input type="submit" id="btnSave" class='btn btn-success btn-md' value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection