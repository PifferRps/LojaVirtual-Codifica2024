<nav class="nav">

    <select>
        <option value="" selected>Escolha uma categoria</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
    </select>
    @for($i = 0; $i < 4; $i++)
        <div>
            <a href="{{ route('site.porCategoria', $categorias[$i]->id) }}"><p>{{ $categorias[$i]->nome }}</p></a>
        </div>
    @endfor
</nav>

