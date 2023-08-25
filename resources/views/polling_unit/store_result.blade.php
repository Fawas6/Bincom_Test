@extends('layouts.app')

@section('content')
    <div class="content-body">
        <h1>Store Results for New Polling Unit</h1>

        <form method="post" action="{{ route('web.store_results') }}">
            @csrf
            <label for="pollingUnitUniqueId">Polling Unit Unique ID:</label>
            <input type="text" name="polling_unit_uniqueid" id="pollingUnitUniqueId" required>

            <h2>Party Results:</h2>
            <label for="party_abbreviation">Party Abbreviation:</label>
            <input type="text" class="party_abbreviation" name="party_abbreviation" id="party_abbreviation" required>

            <label for="party_score">Score:</label>
            <input type="text" class="party_score" name="party_score" id="party_score" required>

            <button type="submit">Store Results</button>
        </form>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
    </div>
@endsection
