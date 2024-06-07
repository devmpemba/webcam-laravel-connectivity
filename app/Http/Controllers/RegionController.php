<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SalimMbise\TanzaniaRegions\TanzaniaRegions; // Import your package class


class RegionController extends Controller
{

    public function getRegions()
    {
        $tanzaniaRegions = new TanzaniaRegions();
        $regions = $tanzaniaRegions->getRegions();

        return response()->json(['regions' => $regions]);
    }


    public function getRegionsDistricts()
    {
        $tanzaniaRegions = new TanzaniaRegions();
        $regions = $tanzaniaRegions->getRegions();

        $regionsWithDistricts = [];

        foreach ($regions as $region) {
            $districts = $tanzaniaRegions->getDistricts($region);
            $regionsWithDistricts[$region] = $districts;
        }

        return response()->json(['regions_with_districts' => $regionsWithDistricts]);
    }

    public function getDistrictsSingle()
    {

        $regions = new TanzaniaRegions();
        $regionName = "Mwanza";


        return response()->json([
            $regionName => $regions->getDistricts($regionName)

        ]);
    }

    public function getWards()
    {

        $regions = new TanzaniaRegions();
        $regionName = "Mwanza";
        $districtName = "Mwanza Urban";
        $wardName = "Pamba";
      

        return response()->json([

            $regionName => $regions->getWardPostcode($regionName, $districtName, $wardName)

        ]);



    }


    public function getAllRegions(){
        
        $regions = new TanzaniaRegions();
        $allRegionsData = $regions->getAllData();
    
        return response()->json([
            'All Regions' => $allRegionsData
        ]);


    }
}
