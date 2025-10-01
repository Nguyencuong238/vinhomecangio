<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Partners</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                </form>
                <a href="{{ route('partners.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Avatar') }}</th>
                        <th>{{ __('Twitter') }}</th>
                        <th>{{ __('Facebook') }}</th>
                        <th>{{ __('Telegram') }}</th>
                        <th>{{ __('Website') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $partner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $partner->name }}</td>
                        <td> <img src="{{ $partner->getFirstMediaUrl('media') }}" alt="" style="width: 80px; height: 80px"> </td>
                        <td>{{ $partner->twitter_url ?? '--' }}</td>
                        <td>{{ $partner->facebook_url ?? '--' }}</td>
                        <td>{{ $partner->telegram_url ?? '--' }}</td>
                        <td>{{ $partner->website_url ?? '--' }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('partners.edit', $partner->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> {{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" data-action-url="{{ route('partners.destroy', $partner->id) }}" data-behavior="delete-resource" class="dropdown-item"><i class="icon-trash"></i> {{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $partners->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>
