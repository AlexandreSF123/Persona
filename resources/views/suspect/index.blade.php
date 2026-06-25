
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<div>
    <form action="{{ route('suspect.add') }}" method="post">
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">


        <button type="submit">Salvar</button>
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
    <table border="1">
        <tr>
            <td>Name</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($suspects)
                @foreach($suspects as $suspect)
                    <tr>
                        <td>
                            <h3>{{ $suspect->name }}</h3>
                        </td>
                        <td>
                        <form action="{{ route('suspect.remove', ['id' => $suspect->id]) }}" method="GET">
                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('suspect.update', ['id' => $suspect->id]) }}" method="GET">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    
</div>
<a href="{{ route('guest.index') }}" class="btn btn-primary">Ver Guests</a>

