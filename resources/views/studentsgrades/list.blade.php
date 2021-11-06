@extends('layouts.app')

@section('title', 'Inscripciones')

@section('content')

	<div class="row mt-3">
		<div class="col-md-7">
			@if(count($studentsgrades) <= 0)
			<p><b>No hay inscripciones registrados</b></p>
			@else
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Grado</th>
						<th>Alumno</th>
						<th>Seccion</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($studentsgrades as $studentgrade)
					<tr>
						<td data-id="{{$studentgrade->grade_id}}">{{$studentgrade->grade->name}}</td>
						<td data-id="{{$studentgrade->student_id}}">{{$studentgrade->student->name}} {{$studentgrade->student->lastname}}</td>
						<td>{{$studentgrade->section}}</td>
						<td>
							<button onclick="renderUpdateForm(event)" data-id="{{$studentgrade->id}}" class="btn-update float-start btn btn-info text-white me-1 mb-1">Modificar</button>
							<form class="float-start " action="{{route('studentsgrades.destroy',['studentsgrade' => $studentgrade->id])}}" method="POST">
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
			<form id="form-crud" action="{{route('studentsgrades.store')}}" method="POST">
				@csrf
				<input id="input-id" type="hidden" name="id">
				<div class="mb-3">
					<label for="grade_id" class="form-label">Grado</label>
					<select required="" name="grade_id" type="text" class="form-control" id="grade_id">
						<option value="">Selecciona un alumno</option>
						@foreach($grades as $grade)
						<option value="{{$grade->id}}">{{$grade->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
					<label for="student_id" class="form-label">Alumno</label>
					<select required="" name="student_id" type="text" class="form-control" id="student_id">
						<option value="">Selecciona un alumno</option>
						@foreach($students as $student)
						<option value="{{$student->id}}">{{$student->name}} {{$student->lastname}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
					<label for="section" class="form-label">Seccion</label>
					<input required="" name="section" type="text" class="form-control" id="section">
				</div>
				<button id="btn-create" type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
	CREATE_URL = "{{route('studentsgrades.store')}}";
	UPDATE_URL = "{{route('studentsgrades.store')}}";
	fillForm = function(btn,form){
		const id = btn.getAttribute("data-id");
		const tr = btn.closest("tr");
		const gradeId = tr.children[0].getAttribute("data-id");
		const studentId = tr.children[1].getAttribute("data-id");
		const section =tr.children[2].innerHTML;
		form.setAttribute("action",UPDATE_URL+"/"+id);
		document.getElementById("input-id").value = id;
		document.getElementById("section").value = section;
		document.getElementById("grade_id").value = gradeId;
		document.getElementById("student_id").value = studentId;
		document.getElementById("btn-create").value = "Modificar";
	}
</script>
<script type="text/javascript" src="{{asset('js/crud/crud.js')}}"></script>
@endsection