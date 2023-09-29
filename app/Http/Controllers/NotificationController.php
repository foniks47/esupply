<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notification()
    {
        // $notifpicapproverequest = Transaction::where('pic_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('pic_approval', 'Pending')->count();
        // $notifpicapproverdirect = Transaction::where('pic_approver', auth()->user()->id_user_me)->where('purchase_type', 'Direct Pick Up')->where('pic_approval', 'Pending')->count();


        // $notiftluserapproverequest = Transaction::where('tl_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('tl_approval', 'Pending')->count();
        // $notiftlgamapproverequest = Transaction::where('tlgam_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('tlgam_approval', 'Pending')->count();
        // return $notifpicapproverequest;
    }
}
