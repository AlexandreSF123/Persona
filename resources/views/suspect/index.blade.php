

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div>
    <h1>Guests</h1>
    <form action="{{ route('suspect.add') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
 <br>
 <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="{{ old('age') }}">
 <br>
 <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" value="{{ old('height') }}">
 <br>
 <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" value="{{ old('weight') }}">
 <br>
 <br>
        <label for="nacionality">Nacionality</label>
        <input type="text" name="nacionality" id="nacionality" value="{{ old('nacionality') }}">
<br>
<br>
        <label for="work">Work</label>
        <input type="text" name="work" id="work" value="{{ old('work') }}">
 <br>
 <br>
        <label for="skin_color">Skin Color</label>
        <input type="text" name="skin_color" id="skin_color" value="{{ old('skin_color') }}">
 <br>
 <br>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <hr>

        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>

    <table border="2">
        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>Height</td>
            <td>Weight</td>
            <td>Nacionality</td>
            <td>Work</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($guests)
                @foreach($guests as $suspect)
                    <tr>
                        <td>
                            <h5>{{ $suspect->name }}</h5>
                        </td>

                        <td>
                            <h5>{{ $suspect->age }}</h5>
                        </td>

                        <td>
                            <h5>{{ $suspect->work }}</h5>
                        </td>

                        <td>
                            <h5>{{ $suspect->height }}</h5>
                        </td>

                        <td>
                            <h5>{{ $suspect->weight }}</h5>
                        </td>

                        <td>
                            <h5>{{ $suspect->nacionality }}</h5>
                        </td>

                        <td>
                            <h5>{{ $suspect->skin_color }}</h5>
                        </td>

                        <td>
                        <form action="{{ route('suspect.remove', ['id' => $suspect->id]) }}" method="GET">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('suspect.update', ['id' => $suspect->id]) }}" method="GET">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    
</div>
<br>
<a href="{{ route('guest.index') }}" class="btn btn-primary">Check Guests</a>
<hr>