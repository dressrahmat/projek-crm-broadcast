<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport implements FromCollection
{
    public $contacts;
 
    public function __construct($contacts) {
        $this->contacts = $contacts;
    }
 
    public function collection()
    {
        return Contact::whereIn('id', $this->contacts)->get();
    }
}