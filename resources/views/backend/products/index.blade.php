@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Products</h2>
                <span class="txt">List products</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{route('products.create')}}" class="btn btn-success">
                                <i class="fa fa-plus mr5"></i>Add New
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success fade in mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <i class="fa fa-check alert-icon"></i>
                                <strong>Well done!</strong> {{ Session::get('success') }}
                            </div>
                        @endif

                        <table align="center" id="basic-datatables" class="table table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="per5">#ID</th>
                                    <th class="per15">Image</th>
                                    <th class="per15">Name</th>
                                    <th class="per5">Price</th>
                                    <th class="per15">Size</th>
                                    <th class="per15">Color</th>
                                    <th class="per10">Status</th>
                                    <th class="per20">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <img src="{{asset('images/products/' . $product->images[0]->url)}}" width="100px">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            @foreach($product->sizes as $size)
                                                <span class="label label-warning">{{$size->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                <span class="label label-info">{{$color->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($product->status)
                                                <span class="label label-success">Show</span>
                                            @else
                                                <span class="label label-danger">Hide</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('products.edit', $product->id)}}"
                                                class="btn btn-warning pull-left mr5">
                                                <i class="fa fa-pencil mr10"></i>Edit
                                            </a>
                                            <form action="{{route('products.destroy', $product->id)}}"
                                                    class="pull-left" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger sweet-4">
                                                    <i class="fa fa-trash mr10"></i>Delete
                                                </button>
                                            </form>
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
</div>
@endsection

@push('scripts')
    <script src="{{asset('backend/plugins/tables/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/tables/datatables/dataTables.tableTools.js')}}"></script>
    <script src="{{asset('backend/plugins/tables/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/plugins/tables/datatables/dataTables.responsive.js')}}"></script>
    <script src="{{asset('backend/js/jquery.dynamic.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <script src="{{asset('backend/js/pages/tables-data.js')}}"></script>
    <script src="{{asset('backend/js/pages/forms-advanced.js')}}"></script>
@endpush
