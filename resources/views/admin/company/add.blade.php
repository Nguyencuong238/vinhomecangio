@extends('layouts.app')
@section('main')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0">
                <div class="card-body p-lg-4">
                      <div class="row justify-content-center">

            <div class="col-lg-7">
                
                <form action="{{ url('admin/company/add') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group preview-shop mb-4">
                        <label for="preview">Image<span class="font-small">(JPG, PNG, WEBP, JFIF)</span></label>
                        <input type="file" name="image" id="image" accept="image/*" data-fileuploader-limit="1">
                    </div>

                    <div class="form-group mb-4">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="">
                    </div>

                    <div class="form-group mb-4">
                        <label>Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="10"></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label>Link <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="link" value="">
                    </div>

                    <button class="btn btn-1 btn-primary btn-block px-4" style="margin-top: 20px" ><i></i>
                        Save</button>
                </form>
            </div><!-- end col-md-12 -->
        </div>
                </div><!-- card-body -->
            </div><!-- card  -->
            {{-- {{ $coins->links() }} --}}
        </div><!-- col-lg-12 -->

    </div><!-- end row -->
</div>
@endsection