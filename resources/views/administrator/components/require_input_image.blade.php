@php

    $id_preview_image = isset($id) ? $id : \App\Models\Helper::randomString();

    if(isset($value)){

    }else if(isset($item)){
        $value = $item->$name;
    }else{
        $value = old($name);
    }

@endphp
<div class="container">
    <div class="preview-{{$id_preview_image}}">
        <img for="file-input-{{$id_preview_image}}" id="img-{{$id_preview_image}}" src="{{ isset($item) ? $item->$name : asset('/assets/administrator/images/placeholder.png')}}" />

        <label id="label-file-input-{{$id_preview_image}}" for="file-input-{{$id_preview_image}}">{{$label}} @include('administrator.components.lable_require')</label>
        <input name="{{$name}}" accept="image/*" type="file" id="file-input-{{$id_preview_image}}" {{!isset($item) ? "required" : ""}} />
    </div>
</div>

<style>
    #file-input-{{$id_preview_image}} {
        display: none;
    }

    .preview-{{$id_preview_image}} {
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        max-width: 200px;
        margin: auto;
        background-color: rgb(255, 255, 255);
        box-shadow: 0 0 20px rgba(170, 170, 170, 0.2);

        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 0 35px rgba(0, 0, 0, 0.05);
    }

    #img-{{$id_preview_image}} {
        width: 100%;
        object-fit: cover;
        margin-bottom: 20px;
    }

    #label-file-input-{{$id_preview_image}} {
        font-weight: 600;
        cursor: pointer;
        color: #fff;
        border-radius: 8px;
        padding: 10px 20px;
        background-color: rgb(101, 101, 255);
    }
</style>

<script>

    $( document ).ready(function() {
        const input = document.getElementById('file-input-{{$id_preview_image}}');
        const image = document.getElementById('img-{{$id_preview_image}}');

        input.addEventListener('change', (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });    });


</script>
