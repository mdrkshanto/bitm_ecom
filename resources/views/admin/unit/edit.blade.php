@extends('admin.master.index')
@section('title')
    Edit Unit
@endsection
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Module</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Unit</h3>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <p class="text-success text-center">{{session('message')}}</p>
                    @endif
                    <form class="form-horizontal" method="POST"
                          action="{{route('unit.edit',['id'=>$unit->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Unit Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Unit name" type="text" name="name"
                                       value="{{$unit->name}}" required>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control"
                                          placeholder="Description">{{$unit->description}}</textarea>
                                @if($errors->has('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="form-label col-md-3">Status <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="row">
                                    <label for="active" class="rdiobox col-md-auto">
                                        <input type="radio" class="radio-success" name="status" id="active" @checked($unit->status == 1)
                                        value="1">
                                        <span>Active</span>
                                    </label>
                                    <label for="inactive" class="rdiobox col-md-auto">
                                        <input type="radio" class="radio-warning" name="status" id="inactive" @checked($unit->status != 1)
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
                                <button class="btn btn-success" type="submit">Update unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
