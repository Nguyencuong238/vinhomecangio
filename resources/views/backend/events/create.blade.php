<x-app-layout>
<form action="{{ route('events.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Tạo sự kiện') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Title') }}:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title')is-invalid @enderror" placeholder="Add title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
                            @php
                                $event = new \App\Models\Event;
                            @endphp
                            <x-media-library-collection
                                name="media"
                                :model="$event"
                                collection="media"
                                rules="mimes:png,jpeg,pdf"
                                max-items="1"
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image Multi') }}:</label>
                            @php
                                $event = new \App\Models\Event;
                            @endphp
                            <x-media-library-collection
                                name="eventMulti"
                                :model="$event"
                                collection="eventMulti"
                                rules="mimes:png,jpeg,pdf"
                                max-items="10"
                            />
                        </div>

                        <div class="d-flex mb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" class="custom-control-input" name="status" value="0">
                                <input type="checkbox" class="custom-control-input" name="status" {{ old('status') == '1' ? 'checked' : null }} value="1" id="status">
                                <label class="custom-control-label" for="status">{{ __('Hiện thị ?') }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Content') }}:</label>
                            <textarea name="body" class="editor form-control @error('body')is-invalid @enderror" placeholder="Add content">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Địa chỉ') }}:</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Nhập địa chỉ">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Số điện thoại') }}:</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Nhập số điện thoại">
                            @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email') }}:</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập Email">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Website') }}:</label>
                            <input type="text" name="website" value="{{ old('website') }}" class="form-control @error('website') is-invalid @enderror" placeholder="Nhập Website">
                            @error('website')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Map') }}:</label>
                            <input type="text" name="map" value="{{ old('map') }}" class="form-control @error('map') is-invalid @enderror" placeholder="Nhập Map">
                            @error('map')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Event') }}</label>
                            <select multiple="multiple" class="form-control" id="select-features" data-fouc name="feature[]">
                                @foreach(getListFeature() as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @include('backend.events._meta', ['model' => new \App\Models\Event])
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
                            <a href="{{ route('events.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
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
                            @include('backend.events._categories', ['categories' => $categories, 'selected' => old('categories', [])])
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
            $('#select-tag').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });
    </script>
    <script>
        $(function() {
            $('#select-features').select2({
                tags: true,
                tokenSeparators: [',']
            });
        })
    </script>
@endpush
</x-app-layout>
