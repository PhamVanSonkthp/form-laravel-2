@extends('administrator.layouts.master')

@include('administrator.'.$prefixView.'.header')

@section('css')

@endsection

@section('content')

    <div class="container-fluid list-products">
        <div class="row">

            <form action="{{route('administrator.'.$prefixView.'.update', ['id'=> $item->id]) }}" method="post"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">

                            @include('administrator.components.require_input_text' , ['name' => 'name' , 'label' => 'Tên'])

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

                            @include('administrator.components.button_save')

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('js')

@endsection
