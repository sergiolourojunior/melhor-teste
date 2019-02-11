<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sergiolourojunior\MelhorSdk\MelhorSdk;
use App\Quote;
use App\Budget;

class QuoteController extends Controller
{
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
        return view('/calculadora');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $melhorSDK = new melhorSDK();
        $melhorSDK->sandbox = true;
        $melhorSDK->token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImE2MDM5OTUzYjM4ZmRhNTVhNzk3OTcyZWU4MGZkMzdlZGVhYTAxY2NlNTljMDk4ZmYxZmJhNmM4NWVmMmIzZDg1Y2ZiZWRhNTNiZGFiZWM0In0.eyJhdWQiOiIxIiwianRpIjoiYTYwMzk5NTNiMzhmZGE1NWE3OTc5NzJlZTgwZmQzN2VkZWFhMDFjY2U1OWMwOThmZjFmYmE2Yzg1ZWYyYjNkODVjZmJlZGE1M2JkYWJlYzQiLCJpYXQiOjE1NDk1ODU3NjYsIm5iZiI6MTU0OTU4NTc2NiwiZXhwIjoxNTgxMTIxNzY2LCJzdWIiOiJhNzg4NzlmMy05ODBhLTQ0YzAtYmY1MC03OGQ4NDFlZDMwZmEiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.ZziOpiBMtZd3bvDgkqhyjqrloR8GWWRMavRQ_TdZWbghDA9aNqWVR6RE95WLnOYBas_ArR8VlQ_9J6hTeL84Ho27MMcOM1m3IfJkJRrfoWtpu2l9hIz24fQZZ0WVSyGxo-VbQMtpf93-RrPDGFChFp6Nll_iJ5n5Fsw0j-mSu7RxCX0Vc9qAoryNB3tbR_N0J6ywH7BN5XHdzp79oBXw8jWnExE9emY-CHk0ex1MocZlzDKL_6U8bZJuvPxN4T4VyXtFTEvTb6ou8JZFpY4UgLXvz_F8QUyheWDpWS4EZWdgi-5jXnL_3JBy8kFrSV3bsuJY13VIWglFaCd_UwvL76gLKx0dOlGEaba4QiEttxMEaetjNDoQ2Gcw7sUiUKOQBWuSgdm-58AyUYaJwTVIrJsZ-nwAUyw1UkbkTFPZ-00BGk8EDxwHw6hzwDMFmEWFiYjxoipuBFi6WZDwQL-oVKbr5pXN_QvHZudNZ-RFS-PMGlt7m61c5xaChPqS5vshjgFPonilgdB5NP6hqyVye_Bl8S7wycraR2nYdrv5160vOpgogjBoX0I65Y1X97j-zrSM38HZVsJmsZp-KI_vIqf5r9cjjDN5waQlXEt6NLS6fBHG8QCViXO1HXE0wC-sIM5WqRdSy2LjIScWtznghC6WlqaCC2nxoQAU9ft_td4';

        $receipt = $request->input('receipt') !== null ? true : false;
        $own_hand = $request->input('own_hand') !== null ? true : false;

        $data = [
            'from' => [
                'postal_code' => $request->input('postal_code_from')
            ],
            'to' => [
                'postal_code' => $request->input('postal_code_to')
            ],
            'package' => [
                'weight' => $request->input('weight'),
                'width' => $request->input('width'),
                'height' => $request->input('height'),
                'length' => $request->input('length')
            ],
            'options' => [
                'insurance_value' => $request->input('insurance_value'),
                'receipt' => $receipt,
                'own_hand' => $own_hand,
                'collect' => false
            ],
            'services' => '1,2'
        ];

        $rules = [
            'postal_code_from' => 'required|min:8|max:8',
            'postal_code_to' => 'required|min:8|max:8',
            'weight' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
            'insurance_value' => 'required|numeric'
        ];

        $messages = [
            'postal_code_from.required' => 'O campo CEP Origem não pode estar em branco.',
            'postal_code_to.required' => 'O campo CEP Destino não pode estar em branco.',
            'weight.required' => 'O campo Peso não pode estar em branco.',
            'width.required' => 'O campo Largura não pode estar em branco.',
            'height.required' => 'O campo Altura não pode estar em branco.',
            'length.required' => 'O campo Comprimento não pode estar em branco.',
            'insurance_value.required' => 'O campo Valor Segurado não pode estar em branco.',
        ];

        $request->validate($rules, $messages);

        $quote = new Quote([
            'postal_code_from' => $request->input('postal_code_from'),
            'postal_code_to' => $request->input('postal_code_to'),
            'weight' => $request->input('weight'),
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'length' => $request->input('length'),
            'insurance_value' => $request->input('insurance_value'),
            'receipt' => $receipt,
            'own_hand' => $own_hand
        ]);

        if($quote->save()) {
            $quote_id = $quote->id;

            $calculate = $melhorSDK->calculate($data);
            
            $retorno = json_decode($calculate, true);

            foreach($retorno as $k=>$budget){
                $b = new Budget([
                    'service_id' => $budget['id'],
                    'company_id' => $budget['company']['id'],
                    'name' => $budget['name'],
                    'delivery_time' => $budget['delivery_time'],
                    'price' => $budget['price'],
                    'currency' => $budget['currency'],
                    'quote_id' => $quote_id
                ]);

                $b->save();
            }

            return view('resultado', compact('retorno'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
