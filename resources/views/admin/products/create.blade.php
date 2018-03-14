@extends('layouts.admin')


@section('content')


    <h1>Create Products</h1>

    <div class="row">
         
        <form action="{{ route('admin.products.store') }}" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        
            <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name:</label>
                    <input type="text" id="title" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>        
            <div class=" form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id" name="category_id" >
                       @foreach ($categories as $id => $name  )
                       <option value="{{$id}}">{{$name}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
            </div>  
            <div class=" form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
                    <label for="provider_id">Provider:</label>
                    <select class="form-control" id="provider_id" name="provider_id" >
                       @foreach ($providers as $id => $name  )
                       <option value="{{$id}}">{{$name}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('provider_id') }}</span>
            </div>
            <div class=" form-group {{ $errors->has('promotion_id') ? 'has-error' : '' }}">
                    <label for="promotion_id">Promotion:</label>
                    <select class="form-control" id="promotion_id" name="promotion_id" >
                       @foreach ($promotions as $id => $value  )
                       <option value="{{$id}}">{{$value}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('promotion_id') }}</span>
            </div>
            <div class=" form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                    <label for="weight">Weight:</label>
                    <input type="number" id="title" name="weight" class="form-control" placeholder="Enter weight" value="{{ old('weight') }}">
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
            </div>
            <div class=" form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">Price:</label>
                    <input type="number" id="title" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
            </div>
            <div class=" form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="title" name="quantity" class="form-control" placeholder="Enter quantity" value="{{ old('quantity') }}">
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
            </div>
            
            <div class="  form-group {{ $errors->has('photo_id') ? 'has-error' : '' }}">
                <label for="photo_id">Thumnail:</label>
                <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ old('photo_id') }}">
                <span class="text-danger">{{ $errors->first('photo_id') }}</span>
           </div> 
            <div class="  form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">Image:</label>
                <input type="file" id="photo_id" name="photo" class="form-control" value="{{ old('photo') }}">
                <span class="text-danger">{{ $errors->first('photo') }}</span>
           </div> 

            
           <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Description:</label>
                     <textarea class="form-control" rows="5" id="body" name="description">{{ old('description') }}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
            </div> 
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create Products" />
            </div>
        </form>
        
      

    </div>






@stop

