@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Categories</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Update Category</h4>
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
                            action="{{route('categories.update', $category->id)}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
                                <label class="col-lg-2 col-md-3 control-label">Category Name</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" value="{{$category->name}}" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Status</label>
                                <div class="col-lg-10 col-md-9">
                                    <div class="toggle-custom">
                                        <label class="toggle" data-on="ON" data-off="OFF">
                                            <input type="checkbox" id="checkbox-toggle" name="status"
                                                {{$category->status ? 'checked' : ''}}>
                                            <span class="button-checkbox"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{$errors->first('image') ? 'has-error' : ''}}">
                                <label class="col-lg-2 col-md-3 control-label" for="">Image</label>
                                <div class="col-lg-10 col-md-9">
                                    <img src="{{asset('images/categories/' . $category->image)}}" width="150px">
                                </div>
                            </div>
                            <div class="form-group {{$errors->first('image') ? 'has-error' : ''}}">
                                <label class="col-lg-2 col-md-3 control-label" for="">New Image</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="file" class="filestyle"
                                        name="image"
                                        data-buttonText="Find file" data-buttonName="btn-danger"
                                        data-iconName="fa fa-plus">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">Note</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea class="form-control" rows="3" name="note">
                                        {!!$category->note!!}
                                    </textarea>
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
    <script src="{{asset('backend/js/pages/forms-basic.js')}}"></script>
    <script src="{{asset('backend/js/pages/notifications.js')}}"></script>
@endpush
