@extends('admin.master.index')
@section('title')
    Add Unit
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
                    <h3 class="card-title">Add Unit</h3>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <p class="text-success text-center">{{session('message')}}</p>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{route('unit.add')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Unit Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Unit name" type="text" name="name">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
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

                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-auto">
                                <button class="btn btn-success" type="submit">Create new unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
