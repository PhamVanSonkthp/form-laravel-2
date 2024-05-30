@php
    if(isset($item)){
        $value = $item->$name;
    }else{
        $value = old($name);
    }

    if(!isset($height)){
        $height = 500;
    }
@endphp

<div class="form-group mt-3">
    <label>{{$label}}</label>
    <textarea id="{{isset($id) ? $id : \App\Models\Helper::randomString()}}" style="min-height: {{$height}}px;" name="{{$name}}"
              class="form-control @error($name) is-invalid @enderror"
              rows="5" placeholder="{{isset($placeholder) ? $placeholder : 'Nhập...'}}" style="{{isset($hidden) ? "display: none;" : ''}}">{{$value}}</textarea>
    @error($name)
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
