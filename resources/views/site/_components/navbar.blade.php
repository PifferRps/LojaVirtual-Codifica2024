<nav class="nav">
    <select>
        <option value="" selected>Escolha uma categoria</option>
        <option value="1">Eletrônicos</option>
        <option value="1">Vestuario</option>
        <option value="1">Cosmetico</option>
        <option value="1">Eletrodoméstico</option>
    </select>
    <div>
        <a href="{{ route('site.porCategoria', 1) }}"><p>Eletrônicos</p></a>
    </div>
    <div>
        <a href="{{ route('site.porCategoria', 2) }}"><p>Cosméticos</p></a>
    </div>
    <div>
        <a href="{{ route('site.porCategoria', 3) }}"><p>Vestuário</p></a>
    </div>
    <div>
        <a href="{{ route('site.porCategoria', 4) }}"><p>Eletrodoméstico</p></a>
    </div>

</nav>
