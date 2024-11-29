@extends('administrator.layouts.master')

@include('administrator.'.$prefixView.'.header')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css">
@endsection

@section('content')

    <div class="container-fluid list-products">
        <div class="row">
            <div class="col-12">

                @foreach($items as $item)
                    {!! $item->renderChildrenTreeView($item->id, "", false, false, true) !!}
                @endforeach

            </div>

        </div>
    </div>

@endsection

@section('js')

@endsection

