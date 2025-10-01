<x-app-layout>
    <form action="{{ route('department.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Create Department') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Name') }}:</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name')is-invalid @enderror" placeholder="Add name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Address') }}:</label>
                            <textarea name="address" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Add address">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Contact Info') }}:</label>
                            <textarea name="contact" class="form-control @error('contact')is-invalid @enderror" placeholder="Add contact">{{ old('contact') }}</textarea>
                            @error('contact')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Amount') }}:</label>
                            <textarea name="amount" class="form-control @error('amount')is-invalid @enderror" placeholder="Add amount">{{ old('amount') }}</textarea>
                            @error('amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Introduction') }}:</label>
                            <textarea name="introduction" class="form-control @error('introduction')is-invalid @enderror" placeholder="Add introduction">{{ old('introduction') }}</textarea>
                            @error('introduction')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Activity') }}:</label>
                            <textarea name="activity" class="form-control @error('activity')is-invalid @enderror" placeholder="Add activity">{{ old('activity') }}</textarea>
                            @error('activity')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="sidebar-section-header">
                        <span class="font-weight-semibold">{{ __('Publish') }}</span>
                        <div class="list-icons ml-auto">
                            <a href="#publish" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                                <i class="icon-arrow-down12"></i>
                            </a>
                        </div>
                    </div>

                    <div class="collapse show" id="publish">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success"><i class="icon-paperplane mr-2"></i>{{ __('Save') }} </button>
                            <a href="{{ route('department.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('js')
        <script>
            $(function() {
                $('#select-tag').select2({
                    tags: true,
                    tokenSeparators: [',']
                });

                setSearchSelect2($('#select-projects'), "{{ route('projects.search') }}")
            })
        </script>
    @endpush
    
</x-app-layout>