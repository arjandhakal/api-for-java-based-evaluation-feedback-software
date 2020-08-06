<?php

namespace App\Http\Controllers;

use App\Model\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponseController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = DB::select("SELECT id FROM products WHERE name ='".$request->productName."'");
        $productId;
        foreach($products as $product){
            $productId = $product->id;
        }
        $response = Response::create([
            'name' => $request->name,
            'email' => $request->email,
            'contactno' => $request->contactno,
            'product_id' => $productId,
            'type' => $request->type,
            'answerOne' => $request->answerOne,
            'answerTwo' => $request->answerTwo,
            'answerThree' => $request->answerThree,
            'answerFour' => $request->answerFour,
            'answerFive' => $request->answerFive,
            'answerSix' => $request->answerSix,
            'answerSeven' => $request->answerSeven,
            'answerEight' => $request->answerEight,
            'answerNine' => $request->answerNine,
            'answerTen' => $request->answerTen
        ]);

        return response('Success',201);
    }

    /*
    * Send the report of a particular answer of one of the ten key 
    questions.
    */

    public function getReport(Request $request){

        $products = DB::select("SELECT id FROM products WHERE name ='".$request->productName."'");
        $productId;
        foreach($products as $product){
            $productId = $product->id;
        }


        $responses  =DB::select("SELECT * FROM responses where product_id=".$productId." and type='".$request->type."'");

        $whichAnswer;
        switch($request->question_number){
            case 1:
                $whichAnswer = 'answerOne';
                break;
            case 2:
                $whichAnswer = 'answerTwo';
                break;
            case 3:
                $whichAnswer = 'answerThree';
                break;  
            case 4:
                $whichAnswer = 'answerFour';
                break;      
            case 5:
                $whichAnswer = 'answerFive';
                break;
            case 6:
                $whichAnswer = 'answerSix';
                break;            
            case 7:
                $whichAnswer = 'answerSeven';
                break;  
            case 8:
                $whichAnswer = 'answerEight';
                break;   
            case 9:
                $whichAnswer = 'answerNine';
                break;    
            case 10:
                $whichAnswer = 'answerTen';
                break;
            default:
                $whichAnswer = 'default';                                                                         

        }

        $totalResponse = 0;
        $OneRatingCount = 0;
        $TwoRatingCount = 0;
        $ThreeRatingCount = 0;
        $FourRatingCount = 0;
        
        foreach($responses as $response){
           $totalResponse = $totalResponse + 1;
           if($response->$whichAnswer == 1){
                $OneRatingCount = $OneRatingCount + 1;
           }else if($response->$whichAnswer == 2){
                 $TwoRatingCount = $TwoRatingCount + 1;
           }else if($response->$whichAnswer == 3){
                $ThreeRatingCount = $ThreeRatingCount + 1;
           }else if($response->$whichAnswer == 4){
               $FourRatingCount = $FourRatingCount + 1;
           }

        }


        $reply = [  'oneRatingCount' => $OneRatingCount,
                    'twoRatingCount' =>    $TwoRatingCount,
                    'threeRatingCount' => $ThreeRatingCount,
                    'fourRatingCount' => $FourRatingCount,
                    'totalResponses' => $totalResponse
                 ];

                return response()->json(array($reply), 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
