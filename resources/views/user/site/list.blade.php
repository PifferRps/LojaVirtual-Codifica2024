@extends("user._layouts.user")
@section("conteudo")
<section class="container">
    <div class="container_produtos">
        <div class="container_produtos__destaque">
            <h1 class="container_produtos__destaque-tittle">Mais Vendidos</h1>
            <div class="container_produtos__destaque-imgs">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                    <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
                    <p>Camisa Cofica +</p>
                    <p>R$49,90</p>
                </div>
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                    <img src="{{ asset('img/2.gif') }}" width="150" height="150" alt="Placeholder">
                    <p>Teclado</p>
                    <p>R$69,90</p>
                </div>
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                    <img src="{{ asset('img/3.jpg') }}" width="150" height="150" alt="Placeholder">
                    <p>Mouse</p>
                    <p>R$9,90</p>
                </div>
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-right: 50px">
                    <img src="{{ asset('img/4.jpg') }}" width="150" height="150" alt="Placeholder">
                    <p>Notebook Gamer</p>
                    <p>R$3999,90</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container_produtos__destaque">
        <h1 class="container_produtos__destaque-tittle">Novidades</h1>
        <div class="container_produtos__destaque-imgs">
            <img src="{{ asset('img/4.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/3.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/2.gif') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
        </div>
        <hr>
        <div class="container_produtos__destaque-imgs">
            <img src="{{ asset('img/4.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/3.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/2.gif') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
            <img src="{{ asset('img/1.jpg') }}" width="150" height="150" alt="Placeholder">
        </div>
</section>
@endsection
@push('style')
    @vite('resources/css/home-site.css')
@endpush

