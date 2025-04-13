<?php
namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\OTPHelper;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Services\RegisterService;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\Api\Register\OtpRequest;
use App\Http\Requests\Api\Register\CodeRequest;
use App\Http\Requests\Api\Register\RegisterRequest;
use App\Http\Requests\Api\Register\SendCodeRequest;
use App\Http\Requests\Api\Register\RegisterVendorRequest;

class RegisterController extends Controller
{
    use HttpResponse;
    public function __construct(public RegisterService $registerService)
    {}

    public function register(RegisterRequest $request)
    {
        $data = $this->registerService->register($request->validated());
        $student = null;

        if ($data->type === 'parent' && $data->code_student) {
            $student = User::where('code_student', $data->code_student)->first();
        }
        $resource = [
            'user' => new RegisterResource($data),
            'otp'  => $data['code'],
        ];
        // if ($student) {
        //     $resource['student'] = new RegisterResource($student);
        // }
        return $this->okResponse($resource, __('User registered successfully', [], Request()->header('Accept-language')));
    }

    public function verify(CodeRequest $codeRequest)
    {
        [$user, $token] = $this->registerService->verify($codeRequest->validated());

        $response = [
            'user'  => LoginResource::make($user),
            'token' => $token,
        ];
        return $this->okResponse($response, __('User account verified successfully', [], request()->header('Accept-language')));
    }

    public function otp(OtpRequest $request)
    {
        $data = $this->registerService->otp($request->validated());

        $resource = [
            'user' => new RegisterResource($data),
            'otp'  => $data['code'],
        ];
        return $this->okResponse($resource, __('Otp updated successfully', [], Request()->header('Accept-language')));
    }


}
