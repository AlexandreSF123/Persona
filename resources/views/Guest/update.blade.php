

<div>
    <h1>Guests</h1>
    <form action="{{ route('guest.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $guest->id }}">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ guest->name ?? old('name') }}">
 <br>
 <br>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" value="{{ guest->age ?? old('age') }}">
 <br>
 <br>
        <label for="height">Height</label>
        <input type="text" name="height" id="height" value="{{ guest->height ?? old('height') }}">
 <br>
 <br>
        <label for="weight">Weight</label>
        <input type="text" name="weight" id="weight" value="{{ guest->weight ?? old('weight') }}">
 <br>
 <br>
        <label for="nacionality">Nacionality</label>
        <input type="text" name="nacionality" id="nacionality" value="{{ guest->nacionality ?? old('nacionality') }}">
<br>
<br>
        <label for="work">Work</label>
        <input type="text" name="work" id="work" value="{{ guest->work ?? old('work') }}">
 <br>
 <br>
        <label for="skin_color">Skin Color</label>
        <input type="text" name="skin_color" id="skin_color" value="{{ guest->skin_color ?? old('skin_color') }}">
 <br>
 <br>

        <button type="submit" class="btn btn-primary">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>

