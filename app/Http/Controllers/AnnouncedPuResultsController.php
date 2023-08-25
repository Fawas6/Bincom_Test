<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnouncedPuResults;
use App\Models\LGA;

class AnnouncedPuResultsController extends Controller
{
    // Function to display the results for any individual polling units
    public function showResults()
    {
        try {
            $pollingUnitResult = AnnouncedPuResults::all();

            return view('polling_unit.announced_result', compact('pollingUnitResult'));
        }catch (\Exception $e) {
            // Returns error response if there's any error
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    // Function to display the summed total of all the polling units under a particular local government
    public function showSummedTotal()
    {
        try {
            // Sums up all values of the party_score column in the "announced_pu_results" table
            $summedResult = AnnouncedPuResults::sum('party_score');
            $lgas = LGA::pluck('lga_name', 'uniqueid');

            // Loads the data to the view
            return view('polling_unit.summed_total_result', ['summedResult' => $summedResult, 'lgas' => $lgas]);
        }catch (\Exception $e) {
            // Returns error response if there's any error
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    // Function to store new polling unit results
    public function storeResults(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $request->validate([
                    'polling_unit_uniqueid' => ['required', 'string', 'max:255'],
                    'party_abbreviation' => ['required', 'string', 'max:255'],
                    'party_score' => ['required', 'string', 'max:255'],
                ]);

                $pollingUnitUniqueId = $request->input('polling_unit_uniqueid');
                $partyAbbreviation = $request->input('party_abbreviation');
                $partyScore = $request->input('party_score');

                AnnouncedPuResults::create([
                    'polling_unit_uniqueid' => $pollingUnitUniqueId,
                    'party_abbreviation' => $partyAbbreviation,
                    'party_score' => $partyScore,
                ]);

                // Displays the success message after the form gets submitted
                $request->session()->flash('success', 'Results stored successfully.');
            } catch (\Exception $e) {
                // Returns error response if there's any error
                return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
            }
        }

        // Load the view if the request method is not POST
        return view('polling_unit.store_result');
    }
}
