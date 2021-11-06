@extends('layouts.app')

@section('title', 'Profesores')

@section('content')

	<div class="row mt-3">
		<div class="col-md-7">
			@if(count($teachers) <= 0)
			<p><b>No hay profesores registrados</b></p>
			@else
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Género</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($teachers as $teacher)
					<tr>
						<td>{{$teacher->name}}</td>
						<td>{{$teacher->lastname}}</td>
						<td>{{$teacher->gender}}</td>
						<td>
							<button onclick="renderUpdateForm(event)" data-id="{{$teacher->id}}" class="btn-update float-start btn btn-info text-white me-1">Modificar</button>
							<form class="float-start " action="{{route('teachers.destroy',['teacher' => $teacher->id])}}" method="POST">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger text-white">Eliminar</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
		<div class="col-md-5">
			<form id="form-crud" action="{{route('teachers.store')}}" method="POST">
				@csrf
				<input id="input-id" type="hidden" name="id">
				<div class="mb-3">
					<label for="name" class="form-label">Nombre</label>
					<input required="" name="name" type="text" class="form-control" id="name">
				</div>
				<div class="mb-3">
					<label for="lastname" class="form-label">Apellidos</label>
					<input required="" name="lastname" type="text" class="form-control" id="lastname">
				</div>
				<div class="mb-3">
					<label for="gender" class="form-label">Género</label>
					<input name="gender" type="text" class="form-control" id="gender">
				</div>
				<button id="btn-create" type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
	CREATE_URL = "{{route('teachers.store')}}";
	UPDATE_URL = "{{route('teachers.store')}}";
	fillForm = function(btn,form){
		const id = btn.getAttribute("data-id");
		const tr = btn.closest("tr");
		const name =tr.children[0].innerHTML;
		const lastname = tr.children[1].innerHTML;
		const gender = tr.children[2].innerHTML;
		const birthdate = tr.children[3].innerHTML;
		form.setAttribute("action",UPDATE_URL+"/"+id);
		document.getElementById("input-id").value = id;
		document.getElementById("name").value = name;
		document.getElementById("lastname").value = lastname;
		document.getElementById("gender").value = gender;
		document.getElementById("btn-create").value = "Modificar";
	}
</script>
<script type="text/javascript" src="{{asset('js/crud/crud.js')}}"></script>
@endsection