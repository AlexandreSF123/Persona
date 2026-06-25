<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div>
    <form action="{{ route('suspect.update') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $suspect->id }}">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $suspect->name }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>
