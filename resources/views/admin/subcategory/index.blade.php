@extends('admin.master.index')
@section('title')
    Add Subcategory
@endsection
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Subcategory Module</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Subcategory</h3>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <p class="text-success text-center">{{session('message')}}</p>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{route('subcategory.add')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Subcategory Name</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Subcategory name" type="text" name="name">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Select Category</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control form-select">
                                    <option disabled selected>--- Select Category ---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">--- {{$category->name}} ---</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="text-danger">{{$errors->first('category_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                @if($errors->has('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Subcategory Image</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Subcategory Image" type="file" name="image" accept="image/*">
                                @if($errors->has('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-auto">
                                <button class="btn btn-success" type="submit">Create new subcategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <!-- SELECT2 JS -->
    <script src="{{asset('/')}}admin/assets/plugins/select2/select2.full.min.js"></script>
    <!-- FORM ELEMENTS JS -->
    <script src="{{asset('/')}}admin/assets/js/formelementadvnced.js"></script
@endsection
