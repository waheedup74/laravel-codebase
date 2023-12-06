<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ClientRequestHandler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class CallApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'call-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get products from www.DummyJson.com';

    private $clientRequestHandler;

    public function __construct(ClientRequestHandler $clientRequestHandler)
    {
        $this->clientRequestHandler = $clientRequestHandler;
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = $this->clientRequestHandler->withOptions([
                'verify' => false,
            ])->get('products');
    
            $responses = $this->clientRequestHandler->pool([
                ['as'=>'request_1','method' => 'get', 'url' => 'products?limit=10&skip=0'],
                ['as'=>'request_2','method' => 'get', 'url' => 'products?limit=10&skip=10'],
                ['as'=>'request_3','method' => 'get', 'url' => 'products?limit=10&skip=20'],
            ], [
                'verify' => false,
            ]);
    
            foreach ($responses as $response) {
                $data = $response->json();
                foreach ($data['products'] as $key=>$product) {
                    $record = Product::updateOrCreate(['id'=>$product['id']],$product);
                    Log::info($record);
                }
            }
            $this->info('Data fetched successfully and Stored in database.');

        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            Log::error($th);
        }
       
    }
}
