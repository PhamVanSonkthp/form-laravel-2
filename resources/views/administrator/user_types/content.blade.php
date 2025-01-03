@include('administrator.components.require_input_text' , ['name' => 'title' , 'label' => 'Têm'])

@if($isSingleImage)
    <div class="mt-3 mb-3">
        @include('administrator.components.upload_image', ['post_api' => $imagePostUrl, 'table' => $table, 'image' => $imagePathSingple , 'relate_id' => $relateImageTableId])
    </div>
@endif

@if($isMultipleImages)
    <div class="mt-3 mb-3">
        @include('administrator.components.upload_multiple_images', ['post_api' => $imageMultiplePostUrl, 'delete_api' => $imageMultipleDeleteUrl , 'sort_api' => $imageMultipleSortUrl, 'table' => $table , 'images' => $imagesPath,'relate_id' => $relateImageTableId])
    </div>
@endif

<div class="form-group mt-3">
    <label>Nhập nội dung</label>
    <textarea style="min-height: 400px;" name="contents"
              class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
              rows="8">{{old('contents')}}</textarea>
    @error('contents')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
@include('administrator.components.button_save')
