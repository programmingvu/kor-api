<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Responses\HasEmailResponse;
use App\Http\Responses\SendEmailResponse;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController as NewController;

class EmailVerificationNotificationController extends NewController
{
    /**
     * 
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */

    public function store(Request $request) : SendEmailResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return app(HasEmailResponse::class);
        }

        $request->user()->sendEmailVerificationNotification();
        return app(SendEmailResponse::class);
    }
}
