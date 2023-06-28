@extends('admin.master.index')
@section('title')
    Manage Category
@endsection
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Category</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Categories</h3>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <p class="text-center text-success">{{session('message')}}</p>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-dark text-white table-hover text-center" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-white">#</th>
                                <th class="wd-15p border-bottom-0 text-white">Name</th>
                                <th class="wd-15p border-bottom-0 text-white">Description</th>
                                <th class="wd-20p border-bottom-0 text-white">Image</th>
                                <th class="wd-15p border-bottom-0 text-white">Slug</th>
                                <th class="wd-10p border-bottom-0 text-white">Status</th>
                                <th class="wd-25p border-bottom-0 text-white">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{asset($category->image)}}" alt="{{$category->name}}" width="80" height="50">
                                    @endif
                                </td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@section('plugins')
    <!-- DATA TABLE JS-->
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="{{asset('/')}}admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{asset('/')}}admin/assets/js/table-data.js"></script>
@endsection
