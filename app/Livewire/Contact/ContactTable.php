<?php

namespace App\Livewire\Contact;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Contact;

class ContactTable extends DataTableComponent
{
    protected $model = Contact::class;

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([5, 10, 25]);
    }

    public function export()
    {
        $contact = $this->getSelected();
    
        $this->clearSelected();
    
        return Excel::download(new ContactExport($contact), 'users.xlsx');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Nama lengkap', 'nama_lengkap')->sortable(),
            Column::make('Email', 'email')->sortable(),
            Column::make('Nomor telepon', 'nomor_telepon')->sortable(),
            Column::make('Organisasi', 'organisasi')->sortable(),
            Column::make('Edit')
                // Note: The view() method is reserved for columns that have a field
                ->label(fn($row, Column $column) => view('components.partials.button-datatable.edit-button')->withRow($row)),
            // Column::make("Alamat", "alamat")
            //     ->sortable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}