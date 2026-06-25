

<div>
    <form action="{{ route('guest.add') }}" method="post">
        @csrf
        <label for="name">Name</label>
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
        @isset($guests)
                @foreach($guests as $guest)
                    <tr>
                        <td>
                            <h3>{{ $guest->name }}</h3>
                        </td>
                        <td>
                        <form action="{{ route('guest.remove', ['id' => $guest->id]) }}" method="GET">
                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('guest.update', ['id' => $guest->id]) }}" method="GET">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    
</div>
<a href="{{ route('suspect.index') }}">Suspects</a>
