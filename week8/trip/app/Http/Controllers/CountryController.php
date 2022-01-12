<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function list(Request $request)
    {
        $data = Countries::select('id', 'name as text')->where('name', 'LIKE', '%' . $request->input('q') . '%')->take(20)->get();

        return ["results" => $data];
    }

    public function visited(Request $request)
    {
        return $request->user()->visitedCountries()->get();
    }

    public function toVisit(Request $request)
    {
        return $request->user()->countriesToVisit()->get();
    }

    public function addVisited(Request $request)
    {
        $country = Countries::findOrFail($request->id);
        $visited = $request->user()->visitedCountries();

        foreach ($visited->get() as $entry) {
            if ($country->name == $entry->name) {
                return "error";
            }
        }

        $visited->attach($country->id);

        $request->user()->save();
        return ["status" => "success"];
    }

    public function addToVisit(Request $request)
    {
        $country = Countries::findOrFail($request->id);
        $to_visit = $request->user()->countriesToVisit();

        foreach ($to_visit->get() as $entry) {
            if ($country->name == $entry->name) {
                return "error";
            }
        }

        $to_visit->attach($country->id);

        $request->user()->save();
        return ["status" => "success"];
    }

    public function deleteVisited(Request $request)
    {
        error_log($request->id);
        $request->user()->visitedCountries()->where('country_id', '=', $request->id)->delete();
        $request->user()->save();

        return ["status" => "success"];
    }

    public function deleteToVisit(Request $request)
    {
        $request->user()->countriesToVisit()->where('country_id', '=', $request->id)->delete();
        $request->user()->save();

        return ["status" => "success"];
    }
}
