<x-app-layout>
    <form action="{{ route('channels.store') }}" method="post">
        @csrf
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
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name')is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Excerpt:</label>
                            <textarea name="excerpt" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Add excerpt">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Avatar') }}:<span class="text-danger">*</span></label>
                            @php
                                $channel = new \App\Models\Channel;
                            @endphp
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
                            @php
                                $channel = new \App\Models\Channel;
                            @endphp
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
                            <textarea name="description" class="editor form-control @error('description')is-invalid @enderror" placeholder="Add content">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4 ajax-action" style="margin-bottom: 20px">
                            <label class="mb-2">Type:<span class="text-danger">*</span></label>
                            <select name="type" class="form-control" >
                                <option value="facebook" >Facebook</option>
                                <option value="twitter">Twitter</option>
                                <option value="telegram">Telegram</option>
                                <option value="youtube">Youtube</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Link') }}:<span class="text-danger">*</span></label>
                            <input type="text" name="link" value="{{ old('link') }}" class="form-control @error('link')is-invalid @enderror">
                            @error('link')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Date') }}:</label>
                            <input type="text" name="date" value="{{ old('date') }}" class="form-control @error('date')is-invalid @enderror">
                            @error('date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group date">
                            <input type="text" class="form-control"/  id="datetimepicker">
                            <span class="input-group-addon"><span class="icon-calendar2"></span>
                            </span>
                        </div><br>
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