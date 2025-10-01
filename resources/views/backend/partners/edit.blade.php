<x-app-layout>
    <form action="{{ route('partners.update', $partner->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Create Partner') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Name') }}:<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="form-control @error('name')is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Avatar') }}:<span class="text-danger">*</span></label>
                            <x-media-library-collection
                                name="media"
                                :model="$partner"
                                collection="media"
                                rules="mimes:png,jpeg,pdf"
                                max-items="1"
                            />
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Twitter') }}:</label>
                            <input type="text" name="twitter_url" value="{{ old('twitter_url', $partner->twitter_url) }}" class="form-control @error('twitter_url')is-invalid @enderror">
                            @error('twitter_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Facebook') }}:</label>
                            <input type="text" name="facebook_url" value="{{ old('facebook_url', $partner->facebook_url) }}" class="form-control @error('facebook_url')is-invalid @enderror">
                            @error('facebook_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Telegram') }}:</label>
                            <input type="text" name="telegram_url" value="{{ old('telegram_url', $partner->telegram_url) }}" class="form-control @error('telegram_url')is-invalid @enderror">
                            @error('telegram_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Website') }}:</label>
                            <input type="text" name="website_url" value="{{ old('website_url', $partner->website_url) }}" class="form-control @error('website_url')is-invalid @enderror">
                            @error('website_url')
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
                            <a href="{{ route('partners.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

        
</x-app-layout>