<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Emergencies\EmergencySos;
use App\Models\Emergencies\EmergencySmsTemplate;
use App\Models\User;
use App\Services\SmsService;

use Carbon\Carbon;

class EmergencySosController extends Controller
{
    protected $smsService;

    public function __construct()
    {
        $this->smsService = new SmsService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('q');

        return response()->json(
            EmergencySos::with('user', 'emergency_type')->get(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = User::find($request->user_id)->first();
            $smsTemplate = EmergencySmsTemplate::where(
                'emergency_type_id',
                $request->emergency_type_id
            )->first();

            $smsTemplateMessage = "[EMRGNCY-002] CONSTRUCTION-ACCIDENTS - REPORTED FROM LOCATION: Longtitude {location::long} Latitude {location::lat} {location::pinpointAddress} BY USER {user::name} CONTACT NO. {user::contactNo} AT {report::currentTime}";

            $varsToReplace = array("{location::long}", "{location::lat}", "{location::pinpointAddress}", "{user::name}", "{user::contactNo}", "{report::currentTime}");
            $valueToPus   = array(
                $request->lat,
                $request->long,
                $request->pin_adderess,
                $user->first_name.' '.$user->last_name,
                "09999999999",
                Carbon::now()->format('h:i A F d, Y l')
            );

            $formattedSmsTemplateMessage = str_replace($varsToReplace, $valueToPus, $smsTemplateMessage);

            // $this->smsService->sendSmsToMDRRMC($formattedSmsTemplateMessage);

            $emergencySos = EmergencySos::create([
                'user_id' => $request->user_id,
                'emergency_type_id' => $request->emergency_type_id,
                'location' => json_encode((object) [
                    'long' => $request->long,
                    'lat' => $request->lat,
                    'pin_address' => $request->pin_address,
                ]),
                'message' => $smsTemplateMessage,
            ]);

            return response()->json(
                [
                    'data-created' => $emergencySos,
                    'message-sent-to-mdrmmc' => $formattedSmsTemplateMessage
                ],
                201
            );
        } catch (Exception $e) {
            return response()->json(
                $e->getMessage(),
                500
            );
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
        $emergencySos = EmergencySos::with('user')->findOrFail($id);
        $emergencySos->location = json_decode($emergencySos->location);

        return response()->json(
            $emergencySos,
            200
        );
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
        return response()->json(
            EmergencySos::findOrFail($id)->update($request->all()),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(
            EmergencySos::findOrFail($id)->delete(),
            200
        );
    }
}
