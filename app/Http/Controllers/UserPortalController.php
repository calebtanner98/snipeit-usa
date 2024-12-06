<?php

// Added by USA Team For Request Portal - May Delete IDK yet

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\License;
use App\Models\AssetModel;
use App\Models\Supplier;
use App\Models\Component;
use App\Models\Accessory;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;
use App\Models\RequestModel; 

class UserPortalController extends Controller
{
    // Dashboard view for portal
    public function index() {
        $requestableAssets = Asset::where('requestable', '1')->orderBy('assigned_to')->orderby('name')->get();
        $requestableLicenses = License::where('requestable', '1')->orderby('name')->get();
        $requestableAccessories = Accessory::where('requestable', '1')->orderby('name')->get();
        $requestableComponents = Component::where('requestable', '1')->orderby('name')->get();

        return view('testing.index', compact(
            'requestableAssets',
            'requestableLicenses',
            'requestableAccessories',
            'requestableComponents',
        ));
    }

        // Dashboard view for portal
        public function assets() {
            $requestableAssets = Asset::where('requestable', '1')->orderBy('assigned_to')->orderby('name')->get();
            $requestableLicenses = License::where('requestable', '1')->orderby('name')->get();
            $requestableAccessories = Accessory::where('requestable', '1')->orderby('name')->get();
            $requestableComponents = Component::where('requestable', '1')->orderby('name')->get();
    
            return view('testing.assets', compact(
                'requestableAssets',
                'requestableLicenses',
                'requestableAccessories',
                'requestableComponents',
            ));
        }

            // Dashboard view for portal
    public function licenses() {
        $requestableAssets = Asset::where('requestable', '1')->orderBy('assigned_to')->orderby('name')->get();
        $requestableLicenses = License::where('requestable', '1')->orderby('name')->get();
        $requestableAccessories = Accessory::where('requestable', '1')->orderby('name')->get();
        $requestableComponents = Component::where('requestable', '1')->orderby('name')->get();

        return view('testing.licenses', compact(
            'requestableAssets',
            'requestableLicenses',
            'requestableAccessories',
            'requestableComponents',
        ));
    }

        // Dashboard view for portal
        public function accessories() {
            $requestableAssets = Asset::where('requestable', '1')->orderBy('assigned_to')->orderby('name')->get();
            $requestableLicenses = License::where('requestable', '1')->orderby('name')->get();
            $requestableAccessories = Accessory::where('requestable', '1')->orderby('name')->get();
            $requestableComponents = Component::where('requestable', '1')->orderby('name')->get();
    
            return view('testing.accessories', compact(
                'requestableAssets',
                'requestableLicenses',
                'requestableAccessories',
                'requestableComponents',
            ));
        }

            // Dashboard view for portal
    public function components() {
        $requestableAssets = Asset::where('requestable', '1')->orderBy('assigned_to')->orderby('name')->get();
        $requestableLicenses = License::where('requestable', '1')->orderby('name')->get();
        $requestableAccessories = Accessory::where('requestable', '1')->orderby('name')->get();
        $requestableComponents = Component::where('requestable', '1')->orderby('name')->get();

        return view('testing.components', compact(
            'requestableAssets',
            'requestableLicenses',
            'requestableAccessories',
            'requestableComponents',
        ));
    }

}