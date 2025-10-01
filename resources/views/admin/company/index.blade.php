@extends('layouts.app')
@section('main')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0">
                <div class="card-body p-lg-4">
                    <div class="">
                        <form action="">
                            <input type="search" style="width: 300px;" class="form-control" name="search"
                                value="{{ request('search') }}" placeholder="Search">
                        </form>
                        <a href="{{ url('admin/company/add') }}" class="btn btn-sm btn-dark float-lg-end mt-4">
                            <i class="bi-plus-lg"></i>Add new
                        </a>
                    </div>
                    <div class="table-responsive p-0 pt-3">
                        <table class="table table-hover">
                            <tbody>

                                <tr>
                                    <th class="active">#</th>
                                    <th class="active">Image</th>
                                    <th class="active">Name</th>
                                    <th class="active">Description</th>
                                    <th class="active">Actions</th>
                                </tr>

                                @foreach ($company as $com)
                                    <tr>
                                        <td>{{ $com->id }}</td>
                                        <td><img src="./uploads/{{ $com->image }}"alt="" style="width: 60px; width: 80px" ></td>
                                        <td>{{ $com->name }}</td>
                                        <td> {{ Str::words(strip_tags($com->description), 20, '...') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.company', $com->id) }}"
                                                    class="btn btn-success rounded-pill btn-sm me-2">
                                                    <i class="bi-pencil"></i>
                                                </a>
                                                <a href="{{ route('delete.company', $com->id) }}"
                                                    class="btn btn-success rounded-pill btn-sm me-2 ml-4" style="background: red; border: solid 1px red">
                                                    <i class="bi-pencil"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr><!-- /.TR -->
                                @endforeach

                            </tbody>
                        </table>
                    </div><!-- /.box-body -->

                </div><!-- card-body -->
            </div><!-- card  -->
            {{-- {{ $coins->links() }} --}}
        </div><!-- col-lg-12 -->

    </div><!-- end row -->
</div>
@endsection