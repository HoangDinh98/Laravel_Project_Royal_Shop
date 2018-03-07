@extends ('layouts.admin')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Quick Example</h3>
    </div>



    <div class="row">

        <form action="{{ route('admin.promotions.update',$promotion->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="PUT">

            <form role="form">
              <div class="box-body">
                <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}"">
                  <label for="value">Giá trị khuyến mãi:</label>
                  <input type="text" class="form-control" id="value" name="value" value="{{ $promotion->value}}">
                   <span class="text-danger">{{ $errors->first('value') }}</span>
                </div>
                
                  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}"" >
                     <label for="description">Mô tả khuyến mãi:</label>
                     
                  </div>
               
                
          
            <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Mô tả sản phẩm khuyến  mãi:</label>
                <select class="form-control" id="description" name="description" >
                    @foreach ($categories as $id => $name  )
                    <option value="{{$id}}"   {{ $id == $post->category->id ? 'selected="selected"' : '' }}
                        >
                        {{$name}}
                    </option>
                    @endforeach   
                </select>                
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
            </div>  
            <div class="form-group " style="width:  200px">


                <img src="{{$post->photo ? asset( $post->photo->file ): 'http://placehold.it/400x400'}}" height="300" alt="" class="img-responsive img-rounded">


            </div> <br>

            <div class="  form-group {{ $errors->has('photo_id') ? 'has-error' : '' }}">
                <label for="photo_id">Thumnail:</label>
                <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ old('photo_id') }}">
                <span class="text-danger">{{ $errors->first('photo_id') }}</span>
            </div> 


            <div class=" form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                <label for="body">Title:</label>
                <textarea class="form-control" rows="5" id="body" name="body">{{ $post->body }}</textarea>
                <span class="text-danger">{{ $errors->first('body') }}</span>
            </div> 

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Edit Post" />
            </div>
        </form>



    </div>


    <div class="row">


        @include('includes.form_error')



    </div>




    @stop