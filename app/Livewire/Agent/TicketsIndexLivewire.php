<?php

namespace App\Livewire\Agent;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class TicketsIndexLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'id';
    public $order = 'desc';
    public $pagination = 10;

    protected $queryString = ['search'];
    

    public function render()
    {
        return view('livewire.agent.tickets-index-livewire', [
            'tickets' => Ticket::where('reference', 'like', '%'.$this->search.'%')
                ->orWhereHas('user', function (EloquentBuilder $builder) {
                    return $builder->where('name', 'like', '%'.$this->search.'%' );
                })
                ->orWhereHas('user', function (EloquentBuilder $builder) {
                    return $builder->where('email', 'like', '%'. $this->search.'%' );
                })
                ->orderBy($this->orderBy, $this->order)
                ->paginate($this->pagination),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPagination()
    {
        $this->resetPage();
    }
}
