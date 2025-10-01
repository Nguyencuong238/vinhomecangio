<x-app-layout>
    <form action="{{ route('gallery.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thêm ảnh</h5>
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
                            <label>{{ __('Image') }}:</label>
                            @php
                                $album = new \App\Models\Album;
                            @endphp
                            <x-media-library-collection
                                name="media"
                                :model="$album"
                                collection="media"
                                rules="mimes:png,jpeg,pdf"
                                max-items="1"
                            />
                        </div>

                        {{-- <div class="form-group">
                            <label>{{ __('Album') }}:</label>
                            @php
                                $album = new \App\Models\Album;
                            @endphp
                            <x-media-library-collection
                                name="album"
                                :model="$album"
                                collection="album"
                                rules="mimes:png,jpeg,pdf"
                                max-items="10"
                            />
                        </div> --}}

                        <div class="custom-control custom-checkbox mb-2">
                            <input type="hidden" class="custom-control-input" name="is_featured" value="0">
                            <input type="checkbox" class="custom-control-input" name="is_featured" {{ old('is_featured') == '1' ? 'checked' : null }} value="1" id="is_featured">
                            <label class="custom-control-label" for="is_featured">Nổi bật</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-2">
                            <input type="hidden" class="custom-control-input" name="status" value="0">
                            <input type="checkbox" class="custom-control-input" name="status" {{ old('status', 1) == '1' ? 'checked' : null }} value="1" id="status">
                            <label class="custom-control-label" for="status">{{ __('Hiển thị') }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
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
                            <a href="{{ route('gallery.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
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
        })
    </script>
@endpush

</x-app-layout>
