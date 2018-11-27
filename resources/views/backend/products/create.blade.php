@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New Product</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        @if ($errors->any())
                            <div class="alert alert-danger fade in mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                @foreach ($errors->all() as $error)
                                    <i class="glyphicon glyphicon-ban-circle alert-icon "></i>
                                    <strong>Oh snap!</strong> {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif

                        <form class="form-horizontal group-border" enctype="multipart/form-data"
                            action="{{route('products.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="input" class="control-label">Product Name</label>
                                    <input type="text" class="form-control" id="text"
                                        name="name">
                                </div>
                                <div class="col-lg-6">
                                    <label for="input" class="control-label">Category</label>
                                    <select class="form-control" name="category">
                                        <option value="0">Please Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="input" class="control-label">Price</label>
                                    <input type="number" class="form-control" id="number"
                                        name="price">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label" for="">Image</label>
                                    <input type="file" class="filestyle" name="images[]"
                                        data-buttonText="Find file" data-buttonName="btn-danger"
                                        data-iconName="fa fa-plus" multiple>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label class="col-lg-2 col-md-3 control-label">Size</label>
                                    <div id="sizes" class="col-lg-10 col-md-9">
                                        <div class="checkbox-custom">
                                            <input class="check-all" type="checkbox" value="option1" id="check-all-sizes">
                                            <label for="check-all-sizes">Check all</label>
                                        </div>
                                        <div class="children">
                                            @foreach($sizes as $size)
                                                <div class="checkbox-custom">
                                                    <input class="check" type="checkbox" name="sizes[]"
                                                        value="{{$size->id}}" id="size-{{$size->id}}">
                                                    <label for="size-{{$size->id}}">{{$size->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-2 col-md-3 control-label">Color</label>
                                    <div id="colors" class="col-lg-10 col-md-9">
                                        <div class="checkbox-custom">
                                            <input class="check-all" type="checkbox" value="option1" id="check-all-colors">
                                            <label for="check-all-colors">Check all</label>
                                        </div>
                                        <div class="children">
                                            @foreach($colors as $color)
                                                <div class="checkbox-custom">
                                                    <input class="check" type="checkbox" name="colors[]"
                                                        value="{{$color->id}}" id="color-{{$color->id}}">
                                                    <label for="color-{{$color->id}}">{{$color->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="input" class="control-label">Note</label>
                                    <textarea class="form-control" rows="3" name="note"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success pull-right mb10 mt10">
                                <i class="fa fa-plus mr5"></i> Save
                            </button>

                            <a href="{{route('categories.index')}}" class="btn btn-default pull-left mb10 mt10">
                                <i class="fa fa-arrow-left mr5"></i> Back
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('backend/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js')}}"></script>
    <script src="{{asset('backend/plugins/forms/autosize/jquery.autosize.js')}}"></script>
    <script src="{{asset('backend/plugins/forms/maxlength/bootstrap-maxlength.js')}}"></script>
    <script src="{{asset('backend/plugins/forms/checkall/jquery.checkAll.js')}}"></script>
    <script src="{{asset('backend/plugins/charts/sparklines/jquery.sparkline.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/notify/jquery.gritter.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/bootstrap-sweetalert/sweet-alert.js')}}"></script>

    <script src="{{asset('backend/js/jquery.dynamic.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    {{-- <script src="{{asset('backend/js/pages/forms-basic.js')}}"></script> --}}
    <script src="{{asset('backend/js/pages/notifications.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#sizes').checkAll({
                masterCheckbox: '.check-all',
                otherCheckboxes: '.check'
            })

            $('#colors').checkAll({
                masterCheckbox: '.check-all',
                otherCheckboxes: '.check'
            })
        });
    </script>
@endpush
