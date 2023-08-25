@extends('layouts.app')

@section('content')
    <div class="content-body">
        <h1>Polling Unit Result</h1>

        <table>

            <thead>
                <tr>
                    <th>Unique_ID</th>
                    <th>Party</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pollingUnitResult as $result)
                    <tr>
                        <td>{{ $result->polling_unit_uniqueid }}</td>
                        <td>{{ $result->party_abbreviation }}</td>
                        <td>{{ $result->party_score }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
