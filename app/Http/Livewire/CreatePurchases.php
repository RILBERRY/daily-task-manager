<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePurchases extends Component
{
    Use WithFileUploads;
    public $photo;
    public $E;

    public function storeAttachment()
    {
        if($this->invoice){

            $attachmentLocation = 'public';
            $fileName = 'EXP-'.$this->customer['bill_no'] . '-' . uniqid() . '_' . time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs($attachmentLocation, $fileName);

            $this->invoice->update([
                'attachment'=>$fileName,
            ]);
            session()->flash('success', 'Attachment uploaded');
        }else{
            session()->flash('fail', 'Create Customer first');

        }
    }

    public function render()
    {
        return view('livewire.create-purchases');
    }
}
