@extends('layouts.app')

@section('title', 'Grados')

@section('content')

	<div class="row mt-3">
		<div class="col-md-7">
			@if(count($grades) <= 0)
			<p><b>No hay grados registrados</b></p>
			@else
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Profesor</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($grades as $grade)
					<tr>
						<td>{{$grade->name}}</td>
						<td data-id="{{$grade->teacher_id}}">{{$grade->teacher->name}} {{$grade->teacher->lastname}}</td>
						<td>
							<button onclick="renderUpdateForm(event)" data-id="{{$grade->id}}" class="btn-update float-start btn btn-info text-white me-1">Modificar</button>
							<form class="float-start " action="{{route('grades.destroy',['grade' => $grade->id])}}" method="POST">
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
			<form id="form-crud" action="{{route('grades.store')}}" method="POST">
				@csrf
				<input id="input-id" type="hidden" name="id">
				<div class="mb-3">
					<label for="name" class="form-label">Nombre</label>
					<input required="" name="name" type="text" class="form-control" id="name">
				</div>
				<div class="mb-3">
					<label for="teacher_id" class="form-label">Profesor</label>
					<select required="" name="teacher_id" type="text" class="form-control" id="teacher_id">
						<option value="">Selecciona un profesor</option>
						@foreach($teachers as $teacher)
						<option value="{{$teacher->id}}">{{$teacher->name}} {{$teacher->lastname}}</option>
						@endforeach
					</select>
				</div>
				<button id="btn-create" type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
	CREATE_URL = "{{route('grades.store')}}";
	UPDATE_URL = "{{route('grades.store')}}";
	fillForm = function(btn,form){
		const id = btn.getAttribute("data-id");
		const tr = btn.closest("tr");
		const name =tr.children[0].innerHTML;
		const teacherId = tr.children[1].getAttribute("data-id");
		form.setAttribute("action",UPDATE_URL+"/"+id);
		document.getElementById("input-id").value = id;
		document.getElementById("name").value = name;
		document.getElementById("teacher_id").value = teacherId;
		document.getElementById("btn-create").value = "Modificar";
	}
</script>
<script type="text/javascript" src="{{asset('js/crud/crud.js')}}"></script>
@endsection