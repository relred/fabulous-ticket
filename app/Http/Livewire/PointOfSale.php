<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Sale;

use App\Http\Controllers\SalesController;

use Livewire\Component;

class PointOfSale extends Component
{
    protected $listeners = ['stepOne', 'stepPlus', 'openCashModal', 'openCardModal', 'openDollarModal', 'inputModals', 'storeSale'];

    public $step = 1;

    public $modalCash = 0;
    public $modalCard = 0;
    public $modalDollar = 0;

    public $adult;
    public $kid;
    public $senior;
    public $disabled;
    public $ticketsTotal;

    public $genderMale;
    public $genderFemale;
    public $genderTotal;

    public $adultTotal;
    public $kidTotal;
    public $seniorTotal;
    public $disabledTotal;

    public $total;
    public $totalDollar;
    public $totalRemaining;
    public $totalDollarRemaining;

    public $cash;
    public $card;
    public $card_voucher;
    public $dollar;
    public $dollarConverted;
    public $dollarChange;
    public $paymentTotal;

    public $test_variable;

    public function render()
    {
        $this->ticketsTotal = (int)$this->adult + (int)$this->kid + (int)$this->senior + (int)$this->disabled;
        $this->genderTotal = (int)$this->genderMale + (int)$this->genderFemale;

        $this->adultTotal = (int)$this->adult * 50;
        $this->kidTotal = (int)$this->kid * 25;
        $this->seniorTotal = (int)$this->senior * 25;
        $this->disabledTotal = (int)$this->disabled * 25;

        $this->dollarConverted = (int)$this->dollar * 17.5;

        $this->paymentTotal = (float)$this->cash + (float)$this->card + (float)$this->dollarConverted;
        $this->total = $this->adultTotal + $this->kidTotal + $this->seniorTotal + $this->disabledTotal;

        $this->totalRemaining = $this->total - $this->paymentTotal;
        $this->totalDollar = $this->total/17.5;
        $this->totalDollarRemaining = $this->totalRemaining/17.5;

        return view('livewire.point-of-sale');
    }

    public function stepOne()
    {
        if(!($this->modalCash || $this->modalCard || $this->modalDollar)){
            $this->step = 1;
        }
    }

    public function stepPlus()
    {
        if($this->step == 3){
            if ($this->totalRemaining <= 0) {
                $this->emitSelf('storeSale');
            }
        }

        if ($this->total) {
            if ($this->genderTotal == $this->ticketsTotal) {
                $this->step = 3;
            }else{
                $this->step = 2;
            }
        }
    }

    public function openCashModal()
    {
        if ($this->step > 2) {
            $this->modalCash = 1;
            $this->modalCard = 0;
            $this->modalDollar = 0;
        }
    }

    public function openCardModal()
    {
        if ($this->step > 2) {
            $this->modalCash = 0;
            $this->modalCard = 1;
            $this->modalDollar = 0;
        }
    }

    public function openDollarModal()
    {
        if ($this->step > 2) {
            $this->modalCash = 0;
            $this->modalCard = 0;
            $this->modalDollar = 1;
        }
    }

    public function inputModals()
    {
        $this->modalCash = 0;
        $this->modalCard = 0;
        $this->modalDollar = 0;
    }

    public function storeSale()
    {

        $cluster_id = uniqid();

        if ($this->cash < 1) {
            $this->dollarChange = abs($this->totalRemaining);
        }else{
            $this->dollarChange = 0;
        }

        $amontCash = ($this->total - $this->card - $this->dollarConverted > 0)
            ? $this->total - $this->card - $this->dollarConverted
            : 0;

         Sale::create([
            'description' => '',
            'user_id' => auth()->user()->id,
            'cluster_id' => $cluster_id,
            'adult' => $this->adult,
            'kid' => $this->kid,
            'senior' => $this->senior,
            'disabled' => $this->disabled,
            'amount' => $this->total,
            'amount_cash' => $amontCash,
            'amount_card' => $this->card,
            'amount_dollar' => (int)$this->dollar,
            'gender_male' => $this->genderMale,
            'gender_female' => $this->genderFemale,
            'session' => auth()->user()->session,
            'user_fullname' => auth()->user()->name,
            'stall' => auth()->user()->stall,
            'dollar_change' => $this->dollarChange,
            'card_voucher' => $this->card_voucher,
        ]);

        if ($this->adult) {
            for ($i=0; $i < $this->adult; $i++) { 
                Ticket::create([
                    'type' => 'adult',
                    'cluster_id' => $cluster_id,
                    'user_id' => auth()->user()->id,
                    'state' => 'none',
                ]);
            }
        }

        if ($this->kid) {
            for ($i=0; $i < $this->kid; $i++) { 
                Ticket::create([
                    'type' => 'kid',
                    'cluster_id' => $cluster_id,
                    'user_id' => auth()->user()->id,
                    'state' => 'none',
                ]);
            }
        }

        if ($this->senior) {
            for ($i=0; $i < $this->senior; $i++) { 
                Ticket::create([
                    'type' => 'senior',
                    'cluster_id' => $cluster_id,
                    'user_id' => auth()->user()->id,
                    'state' => 'none',
                ]);
            }
        }

        if ($this->disabled) {
            for ($i=0; $i < $this->disabled; $i++) { 
                Ticket::create([
                    'type' => 'disabled',
                    'cluster_id' => $cluster_id,
                    'user_id' => auth()->user()->id,
                    'state' => 'none',
                ]);
            }
        }

        return redirect()->route('print', $cluster_id);
    }

}
