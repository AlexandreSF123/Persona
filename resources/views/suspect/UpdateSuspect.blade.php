<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div>
    <h1>Suspects</h1>
    <form action="{{ route('suspect.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $suspect->id }}">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $suspect->name ?? old('name') }}">
 <br>
 <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="{{ $suspect->age ?? old('age') }}">
 <br>
 <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" value="{{ $suspect->height ?? old('height') }}">
 <br>
 <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" value="{{ $suspect->weight ?? old('weight') }}">
 <br>
 <br>
        <label for="nacionality">Nacionality</label>
        <input type="text" name="nacionality" id="nacionality" value="{{ $suspect->nacionality ?? old('nacionality') }}">
<br>
<br>
        <label for="work">Work</label>
        <input type="text" name="work" id="work" value="{{ $suspect->work ?? old('work') }}">
 <br>
 <br>
        <label for="skin_color">Skin Color</label>
        <input type="text" name="skin_color" id="skin_color" value="{{ $suspect->skin_color ?? old('skin_color') }}">
 <br>
 <br>

        <button type="submit" class="btn btn-primary">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>


