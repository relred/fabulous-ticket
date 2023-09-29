<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;

class VipCheckout extends Component
{
    protected $listeners = ['stepOne', 'stepPlus', 'openCashModal', 'openCardModal', 'openDollarModal', 'inputModals', 'storeSale'];

    public $tickets = 1;

    public $modalCash = 0;
    public $modalCard = 0;
    public $modalDollar = 0;

    public $total;
    public $totalDollar;
    public $totalRemaining;
    public $totalDollarRemaining;

    public $cash;
    public $card;
    public $card_voucher;
    public $dollar;
    public $dollarConverted;
    public $paymentTotal;

    public $test_variable;

    public function render()
    {

        $this->dollarConverted = (int)$this->dollar * 16;

        $this->paymentTotal = (float)$this->cash + (float)$this->card + (float)$this->dollarConverted;
        $this->total = $this->tickets * 500;

        $this->totalRemaining = $this->total - $this->paymentTotal;
        $this->totalDollar = $this->total/16;
        $this->totalDollarRemaining = $this->totalRemaining/16;

        return view('livewire.vip-checkout');
    }

    public function ticketPlus()
    {
        $this->tickets++;
    }

    public function ticketMinus()
    {
        $this->tickets--;
    }

    public function openCashModal()
    {
        $this->modalCash = 1;
        $this->modalCard = 0;
        $this->modalDollar = 0;
    }

    public function openCardModal()
    {
        $this->modalCash = 0;
        $this->modalCard = 1;
        $this->modalDollar = 0;
    }

    public function openDollarModal()
    {
        $this->modalCash = 0;
        $this->modalCard = 0;
        $this->modalDollar = 1;
    }

    public function inputModals()
    {
        $this->modalCash = 0;
        $this->modalCard = 0;
        $this->modalDollar = 0;
    }

    public function storeSale(){
        if($this->totalRemaining <= 0){
            $cluster_id = uniqid();
    
            $amontCash = ($this->total - $this->card - $this->dollarConverted > 0)
                ? $this->total - $this->card - $this->dollarConverted
                : 0;
    
             Sale::create([
                'description' => '',
                'user_id' => auth()->user()->id,
                'cluster_id' => $cluster_id,
                'amount' => $this->total,
                'amount_cash' => $amontCash,
                'amount_card' => $this->card,
                'amount_dollar' => (int)$this->dollar,
                'session' => auth()->user()->session,
                'user_fullname' => auth()->user()->name,
                'stall' => auth()->user()->stall,
                'dollar_change' => $this->tickets,
                'card_voucher' => $this->card_voucher,
            ]);
    
            return redirect()->route('print', $cluster_id);
        }
    }
}
