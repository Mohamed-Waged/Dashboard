@extends('backend.layouts.parent')

@section('title','Edit Product')

@section('content')


    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-6">
                <label for="name_en">Name En</label>
                <input id="name_en" name="name_en" type="text"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('name_en') ?? $product->name_en}}">
                @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="name_ar">Name Ar</label>
                <input id="name_ar" name="name_ar" type="text"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('name_ar') ?? $product->name_ar}}">
                @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="price">Price</label>
                <input id="price" name="price" type="number"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('price') ?? $product->price}}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="code">Code</label>
                <input id="code" name="code" type="number"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('code') ?? $product->code}}">
                @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="quantity">Quanty</label>
                <input id="quantity" name="quantity" type="number"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('quantity') ?? $product->quantity}}">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{$product->status == 1 ? 'selected' : ''}} value='1'>Active</option>
                    <option {{$product->status == 0 ? 'selected' : ''}} value='0'>Not Active</option>
                </select> 
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="brands">Brands</label>
                <select name="brand_id" id="brands" class="form-control">
                    @foreach ($brands as $brand )
                        <option {{$product->brand_id == $brand->id ? 'selected' : ''}} value='{{$brand->id}}'>{{$brand->name_en}}</option>
                    @endforeach
                </select>     
                @error('brand_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror              
            </div>
            <div class="col-4">
                <label for="subcategory">Subcategories</label>
                <select name="subcategory_id" id="subcategory" class="form-control">
                    @foreach ($subcategories as $subcategory )
                        <option {{$product->subcategory_id == $subcategory->id ? 'selected' : ''}} value='{{$subcategory->id}}'>{{$subcategory->name_en}}</option>
                    @endforeach
                </select>
                @error('subcategory_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label for="desc_en">Desc En</label>
                <textarea name='desc_en' id='desc_en' cols='30' rows='10' class='form-control'>{{ old('desc_en') ?? $product->desc_en}}</textarea> 
                @error('desc_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror  
            </div>
            <div class="col-6">
                <label for="desc_ar">Desc Ar</label>
                <textarea name='desc_ar' id='desc_ar' cols='30' rows='10' class='form-control'>{{ old('desc_ar') ?? $product->desc_ar}}</textarea>   
                @error('desc_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="image">Image</label>
                <input id="image" name="image" type="file"  class="form-control" >
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4 mt-2">
                <img src="{{url('dist/img/products/'.$product->image)}}" alt="{{$product->name_en}}" class='w-100 rounded'>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-2">
                <button class='btn btn-warning'>Update</button>
            </div>
        </div>
    </form>

@endsection 