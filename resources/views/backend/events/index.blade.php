<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Events') }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                </form>
                <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Author') }}</th>
                        <th>{{ __('Categories') }}</th>
                        <th>{{ __('Tags') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ $event->showUrl() }}" target="_blank" rel="noopener noreferrer">{{ $event->title }}</a></td>
                        <td><a href="{{ route('events.index', ['author' => $event->author->email]) }}">{{ $event->author->name }}</a></td>
                        <td>
                            @if($event->categories->isEmpty())
                                --
                            @else
                                @foreach($event->categories as $category)
                                    <a href="{{ route('events.index', ['category' => $category->slug]) }}">{{ $category->name }}</a> @if(!$loop->last),  @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if($event->tags->isEmpty())
                                --
                            @else
                                @foreach($event->tags as $tag)
                                    <a href="{{ route('events.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a> @if(!$loop->last),  @endif
                                @endforeach
                            @endif
                        </td>
                        <td>{{ formatDate($event->created_at) }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('events.edit', $event) }}" class="dropdown-item"><i class="icon-pencil7"></i> {{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" data-action-url="{{ route('events.destroy', $event) }}" data-behavior="delete-resource" class="dropdown-item"><i class="icon-gear"></i> {{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $events->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>
