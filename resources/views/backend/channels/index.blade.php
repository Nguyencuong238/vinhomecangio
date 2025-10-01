<x-app-layout>
    @section('css')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="{{asset('css/datetimepicker.css')}}" type="text/css" rel="stylesheet">
        <style>
            .input-date:not(:focus) {
                border: none;
            }
        </style>
    @endsection

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Channels</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                </form>
                <a href="{{ route('channels.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Avatar') }}</th>
                        <th>{{ __('Excerpt') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th style="width: 220px">{{ __('Date') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($channels as $channel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $channel->name }}</td>
                        <td> <img src="{{ $channel->getFirstMediaUrl('media') }}" alt="" style="width: 80px; height: 80px"> </td>
                        <td>{{ Str::words(strip_tags($channel->excerpt), 20) }}</td>
                        <td class="text-capitalize">{{ $channel->type }}</td>
                        <td>{{ $channel->link }}</td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="date" value="{{ old('date', $channel->created_at) }}" class="form-control @error('date')is-invalid @enderror input-date" data-id="{{$channel->id}}">
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('channels.edit', $channel->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> {{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" data-action-url="{{ route('channels.destroy', $channel->id) }}" data-behavior="delete-resource" class="dropdown-item"><i class="icon-trash"></i> {{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $channels->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>

    @push('js')
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="{{asset('js/datetimepicker.js')}}"></script>

        <script>
            $(function () {
                $('.input-date').datetimepicker({
                    format: 'YYYY/MM/DD HH:mm:ss'
                }).on('dp.change',function() {
                    $.ajax({
						type: 'post',
						url: '{{route("change-date")}}',
                        data: {
                            id: $(this).data('id'),
                            date: $(this).val(),
                            _token: $('[name=csrf-token]').attr('content')
                        }
					}).then(function (res) {
						
					});
                })
            });
        </script>
    @endpush
</x-app-layout>
