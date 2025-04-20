<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Contracts\TwoFactorDisabledResponse;
use Laravel\Fortify\Contracts\TwoFactorEnabledResponse;
use Illuminate\Auth\Events\Verified;
// use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\VerifyEmailResponse;
use Laravel\Fortify\Http\Requests\VerifyEmailRequest;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Fortify\Contracts\RecoveryCodesGeneratedResponse;



class TwoFactorAuthenticationController extends Controller
{

}
