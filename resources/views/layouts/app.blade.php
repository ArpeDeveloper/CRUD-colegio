<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        @yield('style')
    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">CRUD - @yield('title')</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						
		                @if (Route::has('students.index'))
		                    <li class="nav-item">
		                        <a class="nav-link" href="{{ url('/students') }}">Alumnos</a>
		                    </li>
		                @endif
		                @if (Route::has('teachers.index'))
		                    <li class="nav-item">
		                        <a class="nav-link" href="{{ url('/teachers') }}">Profesores</a>
		                    </li>
		                @endif
		                @if (Route::has('grades.index'))
		                    <li class="nav-item">
		                        <a class="nav-link" href="{{ url('/grades') }}">Grados</a>
		                    </li>
		                @endif
		                @if (Route::has('studentsgrades.index'))
		                    <li class="nav-item">
		                        <a class="nav-link" href="{{ url('/studentsgrades') }}">Insribir alumnos</a>
		                    </li>
		                @endif
					</ul>
				</div>
			</div>
		</nav>
        <div class=" container">
            @yield('content')
        </div>
        @yield('javascript')
    </body>
</html>
