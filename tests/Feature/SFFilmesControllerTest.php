<?php

namespace Tests\Feature;

use App\Http\Controllers\SFFilmesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Tests\TestCase;

class SFFilmesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_json_format_are_returned_corretly(): void
    {
        $SfController = new SFFilmesController();
        $response = $SfController->getDataFromApiWithLocalName();

        $this->assertJson($response);
    }
    public function test_json_format_are_returned_on_geolocation_data(){
        $request = FacadesRequest::create('/geolocation', 'GET', ['search-location'=> 'Taylor and Jefferson Streets (Fishermans Wharf)']);
        $SfController = new SFFilmesController();
        $response = $SfController->getingGeoLocationFromAdress($request);
        var_dump($response->getData());
        $this->assertJson($response->getData()->location);

    }

   /*  public function test_structure_of_are_geted_corretly_response(){
        $response = $this->getJson('/');
        dump($response);
        $response->assertJsonStructure([
            'data' => [
              '0' => [
                'title',
                'release_year',
                'locations',
                'production_company',
                'distributor',
                'director',
                'writer',
                'actor_1',
                'actor_2',
                'actor_3',
                ':@computed_region_6qbp_sg9q',
                ':@computed_region_ajp5_b2md',
                ':@computed_region_26cr_cadq'
              ]
            ]
          ]); 
          
        }
        */
}
