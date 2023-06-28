@extends('admin.master.index')
@section('title')
    Add Category
@endsection
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category</h3>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <p class="text-success text-center">{{session('message')}}</p>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{route('category.add')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Category name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Category Image" type="file" name="image" accept="image/*">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-auto">
                                <button class="btn btn-success" type="submit">Create new category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
