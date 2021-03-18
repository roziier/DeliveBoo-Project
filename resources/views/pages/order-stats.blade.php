@extends('layouts.app')

@section('content')

    <h1 class="btn btn-primary btn-lg">grafico statistiche ordine</h1>

    {{-- return --}}
    <a href="{{route('home')}}" class="btn btn-primary">return dashboard</a>


    {{-- INTEGRARE CHART.JS PER IL GRAFICO --}}



    <h1>Grafico Ordini</h1>

    <!-- Chart container -->
    <div id="order-chart" style="height: 300px; border: 1px solid white;">
            
    </div>

    @push('js') 
        
    <!-- Your application script -->
    <script>

        const chart = new Chartisan({

            el: '#order-chart',
            url: "@chart('sample_chart')",

        });


    </script>

    @endpush

@endsection 
