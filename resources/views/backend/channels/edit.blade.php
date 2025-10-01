<x-app-layout>
    <form action="{{ route('channels.update', $channel->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Create Channels') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Name') }}:<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $channel->name) }}" class="form-control @error('name')is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Excerpt:</label>
                            <textarea name="excerpt" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Add excerpt">{{ old('excerpt', $channel->excerpt) }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Avatar') }}:<span class="text-danger">*</span></label>
                            <x-media-library-collection
                                name="media"
                                :model="$channel"
                                collection="media"
                                rules="mimes:png,jpeg,pdf,gif"
                                max-items="1"
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Cover') }}:<span class="text-danger">*</span></label>
                            <x-media-library-collection
                                name="channelCover"
                                :model="$channel"
                                collection="channelCover"
                                rules="mimes:png,jpeg,pdf,gif"
                                max-items="1"
                            />
                        </div>
                        

                        <div class="form-group">
                            <label>{{ __('Description') }}:</label>
                            <textarea name="description" class="editor form-control @error('description')is-invalid @enderror" placeholder="Add content">{{ old('description', $channel->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-4 ajax-action" style="margin-bottom: 20px">
                            <label class="mb-2">Type:<span class="text-danger">*</span></label>
                            <select name="type" class="form-control" >
                                <option value="facebook" @if(old('type', $channel->type) == 'facebook') selected @endif>Facebook</option>
                                <option value="twitter" @if(old('type', $channel->type) == 'twitter') selected @endif>Twitter</option>
                                <option value="telegram" @if(old('type', $channel->type) == 'telegram') selected @endif>Telegram</option>
                                <option value="youtube" @if(old('type', $channel->type) == 'youtube') selected @endif>Youtube</option>
                                <option value="other" @if(old('type', $channel->type) == 'other') selected @endif>Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Link') }}:<span class="text-danger">*</span></label>
                            <input type="text" name="link" value="{{ old('link', $channel->link) }}" class="form-control @error('link')is-invalid @enderror">
                            @error('link')
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
                            <a href="{{ route('channels.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

        
</x-app-layout>