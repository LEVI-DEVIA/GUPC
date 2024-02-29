<?php

namespace App\Http\Controllers\web;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\web\CinetPay;


class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('architects.paiement');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


     /**
     *execute paiement request
     */
    public function paiement(Request $request)
    {
      
        $commande = new Commande();
try {
// 
    if($request->input('type_maison') != null)
    {
       
        $buy = 0;
        if ( $request->input("type_maison") === "A") {
            $buy = 0;
        }elseif ( $request->input("type_maison") === "B" || $request->input("type_maison") === "C" ||$request->input("type_maison") === "D" ) {
            $buy = 50000;
        }elseif (  $request->input("type_maison") === "E") {
            $buy = 150000;
        }elseif (  $request->input("type_maison") === "F") {
            $buy = 200000;
        }
        elseif (  $request->input("type_maison") == "G") {
            $buy = 300000;
        }
        elseif (  $request->input("type_maison") == "H") {
            $buy = 500000;
        }
        elseif (  $request->input("type_maison") == "I" || $request->input("type_maison") == "J" ||  $request->input("type_maison") == "K") {
            $buy = 1000000;
        }
      elseif (  $request->input("type_maison") == "L") {
        $buy = 10000;
        }



        // dd($request->all());
        $customer_name =  $request->input('demandeur_nom');
        $customer_surname = $request->input('demandeur_nom');
        $description = $request->input('section');
       
        $amount =  $buy;
        $currency =  "XOF";
    }
    else{
        echo "Veuillez passer par le formulaire";
    }
    //transaction id
    $id_transaction = date("YmdHis"); // or $id_transaction = Cinetpay::generateTransId()

    //Veuillez entrer votre apiKey
    $apikey = "57726851265c3a5aaa1d978.64301769";
    //Veuillez entrer votre siteId
    $site_id = "5868234";

    //notify url
    $notify_url =  env("APP_URL");
    //return url
    $return_url = env("APP_URL");//$commande->index().'cinetpay-sdk-php/return/return.php';
    $channels = "ALL";
    // dd(env("APP_URL"));
    /*information supplémentaire que vous voulez afficher
     sur la facture de CinetPay(Supporte trois variables 
     que vous nommez à votre convenance)*/
    $invoice_data = array(
        "Data 1" => "",
        "Data 2" => "",
        "Data 3" => ""
    );

    //
    $formData = array(
         "transaction_id"=> $id_transaction,
        "amount"=> $buy,
        "currency"=> "XOF",
        "customer_surname"=> $customer_name,
        "customer_name"=> $customer_surname,
        "description"=> $description,
        "notify_url" => $notify_url,
        "return_url" => $return_url,
        "channels" => $channels,
        "invoice_data" => $invoice_data,
        //pour afficher le paiement par carte de credit
        "customer_email" => "", //l'email du client
        "customer_phone_number" => "", //Le numéro de téléphone du client
        "customer_address" => "", //l'adresse du client
        "customer_city" => "", // ville du client
        "customer_country" => "",//Le pays du client, la valeur à envoyer est le code ISO du pays (code à deux chiffre) ex : CI, BF, US, CA, FR
        "customer_state" => "", //L’état dans de la quel se trouve le client. Cette valeur est obligatoire si le client se trouve au États Unis d’Amérique (US) ou au Canada (CA)
        "customer_zip_code" => "" //Le code postal du client 
    );
    // enregistrer la transaction dans votre base de donnée
    /*  $commande->create(); */

    $CinetPay = new CinetPay($site_id, $apikey , $VerifySsl=false);//$VerifySsl=true <=> Pour activerr la verification ssl sur curl 
    $result = $CinetPay->generatePaymentLink($formData);
    // dd($result);
    // // return redirect()->to($resultat[ ]);

    if ($result["code"] == '201')
    {
        $url = $result["data"]["payment_url"];

        // ajouter le token à la transaction enregistré
        /* $commande->update(); */
        //redirection vers l'url de paiement
        // header('Location:'.$url);
        return redirect()->to($url);

    }
} catch (Exception $e) {
    echo $e->getMessage();
}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
