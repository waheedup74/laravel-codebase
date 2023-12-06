<?php

namespace App\Http\Controllers;

use App\Common\DTO\ProductResponseDto;
use App\Models\Product;
use App\Services\ClientRequestHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    private $clientRequestHandler;

    public function __construct(ClientRequestHandler $clientRequestHandler)
    {
        $this->clientRequestHandler = $clientRequestHandler;
    }

    public function index()
    {
        $apiData= Product::paginate(5)->withQueryString();
        return view('dashboard', compact('apiData'));
      
    }

}
