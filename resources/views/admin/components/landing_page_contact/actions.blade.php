<form action="{{route("{$page}.destroy", ['type'=> $type, 'id'=>$data->id])}}" method="POST"
      onsubmit="return confirm('Are you sure?')"
      style="display: inline-block;">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
</form>
