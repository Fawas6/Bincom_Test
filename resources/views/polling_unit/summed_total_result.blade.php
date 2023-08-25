@extends('layouts.app')

@section('content')
    <div class="content-body">
        <h1>Summed Total Result of All Polling Units</h1>

        <form action="{{ route('web.summed_total_results') }}" method="get">
            @csrf
            <label for="lgaSelect">Select LGA:</label>
            <select id="lgaSelect" name="lga_id">
                <option value="">Select an LGA</option>
                @foreach ($lgas as $id => $lgaName)
                    <option value="{{ $id }}" {{ request('lga_id') == $id ? 'selected' : '' }}>{{ $lgaName }}</option>
                @endforeach
            </select>
            <button type="submit" name="show_result">Show LGA Result</button>
        </form>

        @if (isset($_GET['show_result']) && $summedResult !== null)
            <p>Total Party Score for Selected LGA: {{ $summedResult }}</p>
        @endif
    </div>
@endsection





