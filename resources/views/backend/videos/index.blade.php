<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Videos') }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                </form>
                <a href="{{ route('videos.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Author') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->author->name ?? 'Admin' }}</td>
                        <td><a href="{{ $video->link }}" target="_blank" rel="noopener noreferrer">{{ $video->link }}</a></td>
                        <td>{{ $video->created_at }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('videos.edit', $video) }}" class="dropdown-item"><i class="icon-pencil7"></i> {{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" data-action-url="{{ route('videos.destroy', $video) }}" data-behavior="delete-resource" class="dropdown-item"><i class="icon-gear"></i> {{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $videos->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>