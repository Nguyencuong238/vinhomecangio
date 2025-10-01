<x-app-layout>
    <form action="{{ route('projects.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Create Location') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Name') }}:</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name')is-invalid @enderror" placeholder="">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Excerpt') }}:</label>
                            <textarea name="excerpt" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Add excerpt">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
                            @php
                                $project = new \App\Models\Project;
                            @endphp
                            <x-media-library-collection
                                name="media"
                                :model="$project"
                                collection="media"
                                rules="mimes:png,jpeg,pdf"
                                max-items="1"
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image Multi') }}:</label>
                            @php
                                $projectMulti = new \App\Models\Project;
                            @endphp
                            <x-media-library-collection
                                name="projectMulti"
                                :model="$projectMulti"
                                collection="projectMulti"
                                rules="mimes:png,jpeg,pdf"
                                max-items="10"
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Content') }}:</label>
                            <textarea name="body" class="editor form-control @error('body')is-invalid @enderror" placeholder="Add content">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Address') }}:</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Add address">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Phone') }}:</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Add phone number">
                            @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email') }}:</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Add email">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Website') }}:</label>
                            <textarea name="website" class="form-control @error('website')is-invalid @enderror" placeholder="Add website">{{ old('website') }}</textarea>
                            @error('website')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Twitter') }}:</label>
                            <textarea name="twitter" class="form-control @error('twitter')is-invalid @enderror" placeholder="Add twitter">{{ old('twitter') }}</textarea>
                            @error('twitter')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Telegram') }}:</label>
                            <textarea name="telegram" class="form-control @error('telegram')is-invalid @enderror" placeholder="Add telegram">{{ old('telegram') }}</textarea>
                            @error('telegram')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Google Map') }}:</label>
                            <input type="text" name="map" value="{{ old('map') }}" class="form-control @error('map') is-invalid @enderror" placeholder="Add google map">
                            @error('map')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Features') }}</label>
                            <select multiple="multiple" class="form-control" id="select-features" data-fouc name="features[]">
                                @foreach(getListFeature() as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="d-flex mb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" class="custom-control-input" name="status" value="0">
                                <input type="checkbox" class="custom-control-input" name="status" {{ old('status') == '1' ? 'checked' : null }} value="1" id="status">
                                <label class="custom-control-label" for="status">{{ __('Published ?') }}</label>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="hidden" class="custom-control-input" name="is_featured" value="0">
                            <input type="checkbox" class="custom-control-input" name="is_featured" {{ old('is_featured') == '1' ? 'checked' : null }} value="1" id="is_featured">
                            <label class="custom-control-label" for="is_featured">{{ __('Is featured ?') }}</label>
                        </div>

                        {{--  <div class="form-group">
                            <label>{{ __('Relate Posts') }}</label>
                            <select multiple="multiple" class="form-control" id="select-posts" data-fouc name="posts[]">
                                @foreach(old('posts', []) as $postId)
                                    <option value="{{ $postId }}" selected></option>
                                @endforeach
                            </select>
                        </div>  --}}
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
                            <a href="{{ route('projects.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="sidebar-section-header">
                        <span class="font-weight-semibold">{{ __('Categories') }}</span>
                        <div class="list-icons ml-auto">
                            <a href="#category" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                                <i class="icon-arrow-down12"></i>
                            </a>
                        </div>
                    </div>

                    <div class="collapse show" id="category">
                        <div class="card-body">
                            @include('backend.posts._categories', ['categories' => $categories, 'selected' => old('categories', [])])
                        </div>
                    </div>
                </div>

                

                <div class="card">
                    <div class="sidebar-section-header">
                        <span class="font-weight-semibold">{{ __('Tags') }}</span>
                        <div class="list-icons ml-auto">
                            <a href="#tag" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                                <i class="icon-arrow-down12"></i>
                            </a>
                        </div>
                    </div>

                    <div class="collapse show" id="tag">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('Add Tags') }}</label>
                                <select multiple="multiple" class="form-control" id="select-tag" data-fouc name="tags[]">
                                    @foreach($tags as $tag)
                                        <option {{ in_array($tag->name, old('tags', [])) ? 'selected' : null }} value="{{ $tag->name }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@push('js')
    <script>
        $(function() {
            setSearchSelect2($('#select-posts'), "{{ route('posts.search') }}")

            $('#select-features').select2({
                tags: true,
                tokenSeparators: [',']
            });
            
            $('#select-tag').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });
    </script>
@endpush
        
</x-app-layout>