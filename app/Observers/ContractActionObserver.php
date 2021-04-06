<?php

namespace App\Observers;

use App\Models\Contract;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ContractActionObserver
{
    public function created(Contract $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Contract'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Contract $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Contract'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Contract $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Contract'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
