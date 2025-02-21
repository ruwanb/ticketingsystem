<?php

namespace App\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Component;

class CheckTicketStatusLivewire extends Component
{

    public $formContainer = false;
    public $reference;

    #[Locked]
    public $attempts = 0;

    public function showFormContainer()
    {
        $this->formContainer = true;
    }

    public function hideFormContainer()
    {
        $this->formContainer = false;
    }

    public function render()
    {
        return view('livewire.check-ticket-status-livewire');
    }

    public function submit()
    {
        if($this->attempts < 4){
            if($this->validateReference() != null){
                return redirect()->to('tickets/'.$this->validateReference()->reference);
            } else {
                return redirect()->to('tickets');
            };
            $this->attempts = $this->attempts + 1;
        } else {
            return redirect()->to('tickets');
        }
    }

    private function validateReference()
    {
        return $ticket = \App\Models\Ticket::where('reference', $this->reference)->first();
    }
}
