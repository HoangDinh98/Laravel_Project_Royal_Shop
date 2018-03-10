@extends('layouts.admin')


@section('content')


    <h1>Edit Products</h1>

    <div class="row">
         
        <form action="{{ route('admin.products.update',$products->id) }}" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="PUT">

        
            <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name:</label>
                    <input type="text" id="title" name="name" class="form-control" placeholder="Enter name" value="{{ $products->name }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            
            <div class=" form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id" name="category_id" >
                       @foreach ($categories as $id => $name)
                       <option value="{{$id}}"   {{ $id == $products->category->id ? 'selected="selected"' : '' }}>{{$name}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
            </div> 
            <div class=" form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
                    <label for="provider_id">Provider:</label>
                    <select class="form-control" id="category_id" name="provider_id" >
                       @foreach ($providers as $id => $name)
                       <option value="{{$id}}"   {{ $id == $products->provider->id ? 'selected="selected"' : '' }}>{{$name}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('Provider_id') }}</span>
            </div> 
            <div class=" form-group {{ $errors->has('promotion_id') ? 'has-error' : '' }}">
                    <label for="promotion_id">Promotion:</label>
                    <select class="form-control" id="category_id" name="promotion_id" >
                       @foreach ($promotions as $id => $value)
                       <option value="{{$id}}"   {{ $id == $products->promotion->id ? 'selected="selected"' : '' }}>{{$value}}</option>
                        @endforeach   
                     </select>                
                    <span class="text-danger">{{ $errors->first('promotion_id') }}</span>
            </div> 
            
            <div class="form-group " style="width:  200px">
                <img src="{{$products->thumbnail() ? asset($products->thumbnail()->path): 'http://placehold.it/400x400'}}" height="300" alt="" class="img-responsive img-rounded">
            </div> <br>

            
            <div class="  form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                <label for="path">Thumnail:</label>
                <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ $products->photo }}">
                <span class="text-danger">{{ $errors->first('path') }}</span>
           </div> 
            
            
            <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Description:</label>
                     <textarea class="form-control" rows="5" id="body" name="dexcription">{{ $products->description }}</textarea>
                    <span class="text-danger">{{ $errors->first('dexcription') }}</span>
            </div> 
            
            <div class=" form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity">Quantity:</label>
                    <input type="text" id="title" name="quantity" class="form-control" placeholder="Enter quantity" value="{{ $products->quantity }}">
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
            </div>
            
            <div class=" form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                    <label for="weight">Weight:</label>
                    <input type="text" id="title" name="weight" class="form-control" placeholder="Enter weight" value="{{ $products->weight }}">
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
            </div>
            
            <div class=" form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">Price:</label>
                    <input type="text" id="title" name="price" class="form-control" placeholder="Enter price" value="{{ $products->price }}">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Edit Product" />
            </div>
        </form>
        
        <form action="{{route('admin.products.destroy',$products->id)}}" method="POST">
         <input type="hidden" name="_method" value="DELETE">
         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
         <div class="frorm-group">
             <input type="submit" class="btn btn-danger" value="Delete Products">
         </div>
        </form>
      

    </div>


    <div class="row">





    </div>




@stop