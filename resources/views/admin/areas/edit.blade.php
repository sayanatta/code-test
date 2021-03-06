@extends('admin.layouts.app')

@section('title')
    Edit
@endsection

@section('styles')
    @parent

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Edit</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Master</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.areas.index') }}">Areas</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card card-primary card-outline">

                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.areas.update', ['area'=>$area->id]) }}" role="form" autocomplete="off" enctype="multipart/form-data" id="form" class="needs-validation">
                                @csrf
                                {{method_field('PUT')}}

                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{ $area->title }}" class="form-control @error('title') is-invalid @enderror">

                                                @error('title')
                                                <div class="invalid-feedback">
                                                    This field is required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Governorate</label>
                                                <select name="governorate_id"  class="form-control js-select2 @error('governorate_id') is-invalid @enderror">
                                                    <option value="">Select Governorate</option>
                                                    @foreach ($governorates as $governorate)
                                                        <option value="{{ $governorate->id }}" {{ $governorate->id == $area->governorate_id ? 'selected' : '' }}>{{ $governorate->title }}</option>
                                                    @endforeach
                                                </select>

                                                @error('governorate_id')
                                                <div class="invalid-feedback">
                                                    This field is required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                                    <option value="">Select Status</option>
                                                    <option value="1" {{ $area->status == '1' ? 'selected' : null }}>Active</option>
                                                    <option value="0" {{ $area->status == '0' ? 'selected' : null }}>Inactive</option>
                                                </select>

                                                @error('status')
                                                <div class="invalid-feedback">
                                                    This field is required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm bg-gradient-primary float-right"><i class="fas fa-save"></i>&nbsp; Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            // initialize Select2
            $('.js-select2').select2({
                minimumResultsForSearch: -1,
                width: '100%'
            });
        });
    </script>
@endsection
