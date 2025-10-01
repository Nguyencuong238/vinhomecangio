<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Gallery') }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                    <input type="search" style="width: 300px;" class="form-control" name="search" value="" placeholder="{{ __('Search') }}">
                </form>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Trạng thái') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="{{ $album->getFirstMediaUrl('media') }}" class="rounded-circle" width="40" height="40" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="#" class="text-body font-weight-semibold">{{ $album->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            @foreach($album->categories as $category)
                                <span class="badge badge-primary">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($album->status == 1)
                                {{ 'Hiển thị' }}
                            @else
                                {{ 'Ẩn' }}
                            @endif
                        </td>
                        <td>{{ $album->created_at }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('gallery.edit', $album) }}" class="dropdown-item"><i class="icon-pencil7"></i> {{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" data-action-url="{{ route('gallery.destroy', $album) }}" data-behavior="delete-resource" class="dropdown-item"><i class="icon-gear"></i> {{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $albums->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>
