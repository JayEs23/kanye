@extends('layouts.app')

@section('content')
<div class="container justify-center h-screen">
    <div class="row justify-content-center bg-white rounded p-4 shadow-lg">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 class="text-2xl font-bold text-center mb-4">Kanye West Quotes</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="quotes">
                        <!-- Quotes will be inserted here -->
                    </div>
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="refreshBtn" onclick="getQuotes()">Get Quotes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getQuotes() {
        fetch("/Quotes").then(response => response.json()).then(data => {
            // Clear previous quotes
            document.getElementById("quotes").innerHTML = "";
            
            // Add new quotes
            for (let key in data) {
                if (data.hasOwnProperty(key))
                {
                    value = data[key];
                    document.getElementById("quotes").innerHTML += `<p class="mt-2 text-center font-bold text-gray-700"><q>${value.content}</q> <br> - Kanye West</p>`;
            
                }
            }
            document.getElementById("refreshBtn").innerHTML = "Refresh";
        });
    }
    getQuotes();
</script>
@endsection
