<?php

namespace App\Http\Livewire;

use App\Models\TicketFile;
use App\Models\Tickets;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFilesTickets extends Component
{

    use WithFileUploads;

    protected $listeners = ['updatedEstatusTicket'];

    public $ticket_id;
    public $archivo;

    public function render()
    {
        $ticket = Tickets::findOrFail($this->ticket_id);

        return view('livewire.upload-files-tickets', compact('ticket'));
    }

    public function uploadFile()
    {
        $this->validate([
            'archivo' => 'required|mimes:png,jpg,pdf'
        ]);

        $nombre = $this->archivo->getClientOriginalName();

        $ruta = $this->archivo->store('ticktes');

        TicketFile::create([
            'ticket_id' => $this->ticket_id,
            'ruta'      => $ruta,
            'nombre'    => $nombre
        ]);

        $this->reset(['archivo']);

        session()->flash('success', 'Archivo subido exitosamente');
    }

    public function download($archivo_id)
    {
        $archivo = TicketFile::findOrFail($archivo_id);

        return Storage::download($archivo->ruta);
    }

    public function updatedEstatusTicket()
    {
        //
    }
}
