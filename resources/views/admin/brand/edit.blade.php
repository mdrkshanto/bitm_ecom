@extends('admin.master.index')
@section('title')
    Edit Brand
@endsection
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Brand</h3>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <p class="text-success text-center">{{session('message')}}</p>
                    @endif
                    <form class="form-horizontal" method="POST"
                          action="{{route('brand.edit',['id'=>$brand->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Brand name" type="text" name="name"
                                       value="{{$brand->name}}" required>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control"
                                          placeholder="Description">{{$brand->description}}</textarea>
                                @if($errors->has('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Brand Image" type="file" name="image"
                                       accept="image/*">
                                @if($errors->has('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                                @if($brand->image)
                                    <img src="{{asset($brand->image)}}" alt="{{$brand->name}}" class="mt-3"
                                         width="80" height="50">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="form-label col-md-3">Status <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="row">
                                    <label for="active" class="rdiobox col-md-auto">
                                        <input type="radio" class="radio-success" name="status" id="active" @checked($brand->status == 1)
                                        value="1">
                                        <span>Active</span>
                                    </label>
                                    <label for="inactive" class="rdiobox col-md-auto">
                                        <input type="radio" class="radio-warning" name="status" id="inactive" @checked($brand->status != 1)
                                        value="0">
                                        <span>Inactive</span>
                                    </label>
                                </div>
                                @if($errors->has('status'))
                                    <span class="text-danger">{{$errors->first('status')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-auto">
                                <button class="btn btn-success" type="submit">Update brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
