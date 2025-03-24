@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<div class="container mt-5">
    <h2 class="text-center text-success">Catálogo de Ropa Femenina</h2>
    <p class="text-center text-muted">Descubre nuestra selección de moda femenina, ideal para cada ocasión.</p>
    
    <div class="row">
        @for ($i = 1; $i <= 12; $i++)
            <div class="col-md-4 mb-4">
                <div class="card product-card">
                    <img src="{{ asset('assets/img/femenino' . $i . '.jpg') }}" class="card-img-top" alt="Ropa Femenina {{ $i }}">
                    <div class="card-body text-center">
                        <h5 class="card-title product-title">Prenda Femenina {{ $i }}</h5>
                        <p class="card-text product-price">Precio: <strong>$100.000</strong></p>
                        <button class="btn btn-primary w-100 add-to-cart" data-product="Prenda Femenina {{ $i }}" data-price="120000">Añadir al carrito 🛒</button>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function() {
                const product = this.dataset.product;
                const price = this.dataset.price;
                alert(`Producto agregado al carrito: ${product} - Precio: $${price}`);
            });
        });
    });
</script>
@endsection
