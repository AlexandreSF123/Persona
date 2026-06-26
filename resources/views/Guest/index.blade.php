

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<link rel="stylesheet" href="/resources/css/app.css">

<div>
    <h1>Guests</h1>
    <form action="{{ route('guest.add') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
 <br>
 <br>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" value="{{ old('age') }}">
 <br>
 <br>
        <label for="height">Height</label>
        <input type="text" name="height" id="height" value="{{ old('height') }}">
 <br>
 <br>
        <label for="weight">Weight</label>
        <input type="text" name="weight" id="weight" value="{{ old('weight') }}">
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
            <th><h5>Name</h5></th>
            <th><h5>Age</h5></th>
            <th><h5>Work</h5></th>
            <th><h5>Height</h5></th>
            <th><h5>Weight</h5></th>
            <th><h5>Nacionality</h5></th>
            <th><h5>Skin Color</h5></th>
            <th colspan="2"><h5>Actions</h5></th>
        </tr>
        @isset($guests)
                @foreach($guests as $guest)
                    <tr>
                        <td>
                            <h5>{{ $guest->name }}</h5>
                        </td>

                        <td>
                            <h5>{{ $guest->age }}</h5>
                        </td>

                        <td>
                            <h5>{{ $guest->work }}</h5>
                        </td>

                        <td>
                            <h5>{{ $guest->height }}</h5>
                        </td>

                        <td>
                            <h5>{{ $guest->weight }}</h5>
                        </td>

                        <td>
                            <h5>{{ $guest->nacionality }}</h5>
                        </td>

                        <td>
                            <h5>{{ $guest->skin_color }}</h5>
                        </td>

                        <td>
                        <form action="{{ route('guest.remove', ['id' => $guest->id]) }}" method="GET">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('guest.update', ['id' => $guest->id]) }}" method="GET">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    
</div>
<br>
<a href="{{ route('suspect.index') }}" class="btn btn-primary">Check the Suspects</a>
<hr>