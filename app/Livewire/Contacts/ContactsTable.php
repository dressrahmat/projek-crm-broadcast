<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ContactsTable extends DataTableComponent
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
    

    #[On('refreshDatatable')]
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->searchable()->sortable(),
            Column::make('Nama lengkap', 'nama_lengkap')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Nomor telepon', 'nomor_telepon')->searchable()->sortable(),
            Column::make('Organisasi', 'organisasi')->searchable()->sortable(),
            Column::make('Aksi')
                // Note: The view() method is reserved for columns that have a field
                ->label(fn($row, Column $column) => view('components.partials.button-datatable.edit-button')->withRow($row)),
            // Column::make('Hapus')
            //     // Note: The view() method is reserved for columns that have a field
            //     ->label(fn($row, Column $column) => view('components.partials.button-datatable.hapus-button')->withRow($row)),
            // Column::make("Alamat", "alamat")
            //     ->sortable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}