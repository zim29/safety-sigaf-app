<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Notification as n;

class Notification extends Component
{

    public int $newNotificationCount;
    public array $notificationsMessages;

    protected $listeners = [
        'new-notification' => '$refresh'
    ];

    #[On('new-notification')]
    public function newNotification () : void
    {
        $this->loadNotifications();
        $this->mount();
        $this->dispatch('notifications-updated');        
    }


    public function loadNotifications () : void 
    {
        $this->notificationsMessages = [];
        $this->newNotificationCount = n::select('count(id)')
                                                        ->where('user_id', \Auth::id())
                                                        ->where('readed', false)
                                                        ->count();

        $this->notificationsMessages = n::select('*')->where('user_id', \Auth::id())
                                                        ->limit(3)
                                                        ->orderBy('readed')
                                                        ->orderByDesc('created_at')
                                                        ->get()
                                                        ->toArray();

    }

    public function markAsReaded (int $id) : void 
    {
        $notification = n::findOrFail($id);
        $notification->readed = true;
        $notification->save();
        $this->loadNotifications();

    }

    public function mount () : void 
    {
        $this->loadNotifications();
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
