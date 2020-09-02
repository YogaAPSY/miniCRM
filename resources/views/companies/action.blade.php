 <a href="{{route("company.show", [$row->id])}}" class="btn btn-block bg-gradient-success"><i class="fas fa-eye"> Show</i></a>

 <a href="{{route("company.edit", [$row->id])}}" class="btn btn-block bg-gradient-primary"><i class="fas fa-edit"> Edit</i></a>

 <form onsubmit="return confirm('Delete this company permanently?')" action="{{route('company.destroy', [$row->id])}}" method="POST">
     @csrf
     @method('DELETE')
     <button type="submit" class="btn btn-block bg-gradient-danger "><i class="fas fa-trash"> Delete</i></button>
 </form>
