@extends('backend.layouts.parent')

@section('title','Create Product')

@section('content')

    {{-- Show Success/Errors Message  --}}
    @include('backend.includes.message')


    {{-- Show Validtion Errors  --}}
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-6">
                <label for="name_en">Name En</label>
                <input id="name_en" name="name_en" type="text"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name_en')}}">
            </div>
            <div class="col-6">
                <label for="name_ar">Name Ar</label>
                <input id="name_ar" name="name_ar" type="text"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name_ar')}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="price">Price</label>
                <input id="price" name="price" type="number"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('price')}}">
            </div>
            <div class="col-4">
                <label for="code">Code</label>
                <input id="code" name="code" type="number"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('code')}}">
            </div>
            <div class="col-4">
                <label for="quantity">Quanty</label>
                <input id="quantity" name="quantity" type="number"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('quantity')}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{old('status') == 1 ? 'selected' : ''}} value='1'>Active</option>
                    <option {{old('status') == 0 ? 'selected' : ''}} value='0'>Not Active</option>
                </select>
            </div>
            <div class="col-4">
                <label for="brands">Brands</label>
                <select name="brand_id" id="brands" class="form-control">
                    @foreach ($brands as $brand )
                        <option {{old('brand_id') == $brand->id  ? 'selected' : ''}} value='{{$brand->id}}'>{{$brand->name_en}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="subcategory">Subcategories</label>
                <select name="subcategory_id" id="subcategory" class="form-control">
                    @foreach ($subcategories as $subcategory )
                        <option {{old('subcategory_id') == $subcategory->id  ? 'selected' : ''}} value='{{$subcategory->id}}'>{{$subcategory->name_en}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label for="desc_en">Desc En</label>
                <textarea name='desc_en' id='desc_en' cols='30' rows='10' class='form-control'>{{old('desc_en')}}</textarea>
            </div>
            <div class="col-6">
                <label for="desc_ar">Desc Ar</label>
                <textarea name='desc_ar' id='desc_ar' cols='30' rows='10' class='form-control'>{{old('desc_ar')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="image">Image</label>
                <input id="image" name="image" type="file"  class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-2">
                <button class='btn btn-primary' name='page' value="index">Create</button>
            </div>
            <div class="col-2">
                <button class='btn btn-dark' name='page' value="back">Create & Back</button>
            </div>
        </div>
    </form>
@endsection 

