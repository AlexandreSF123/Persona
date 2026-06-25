<div>
    <form action="{{ route('guest.update') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $guest->id }}">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $guest->name }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>

