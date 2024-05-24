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
    <label>{{$label}} @include('administrator.components.lable_require')</label>
    <textarea style="min-height: {{$height}}px;" name="{{$name}}"
              class="form-control @error($name) is-invalid @enderror"
              rows="5" required>{{$value}}</textarea>
    @error($name)
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
