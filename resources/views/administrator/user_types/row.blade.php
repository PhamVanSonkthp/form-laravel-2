<tr id="container_row_{{$item->id}}">
    <td>{{$item->id}}</td>
    <td>{{$item->title}}</td>
    <td>
        <img class="rounded-circle" src="{{$item->avatar()}}" alt="">
    </td>
    <td>{{\App\Models\Formatter::getDateTime($item->created_at)}}</td>
    <td>{{ optional($item->createdBy)->name}}</td>
    <td>
        @include('administrator.components.action_table', ['prefixView' => $prefixView, '$item' => $item])
    </td>
</tr>
