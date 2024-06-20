<tr id="container_row_{{$item->id}}">
    <td class="text-center">
        <input type="checkbox" class="checkbox-delete-item" value="{{$item->id}}">
    </td>
    <td>{{$item->id}}</td>
    <td>
        <img class="rounded-circle" src="{{$item->avatar()}}" alt="">
    </td>
    <td>
        <a href="{{$item->link}}" target="_blank">{{$item->link}}</a>
    </td>
    <td>
        @include('administrator.components.action_table', ['prefixView' => $prefixView, '$item' => $item])
    </td>
</tr>
