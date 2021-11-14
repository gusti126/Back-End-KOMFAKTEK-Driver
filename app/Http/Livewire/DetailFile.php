<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Livewire\Component;

class DetailFile extends Component
{
    public $fileId, $menus, $label;
    public $confirmAdd = false;
    public $isCreateFolder = false;
    public $folderBaru = 'Folder Tanpa Nama';


    public function mount($id)
    {
        $this->fileId = $id;
        $folder = Folder::with(str_repeat('parent.', 10))->find($id);
        // dd($folder);
        $this->label = 'Files / ' . $folder->title;
        // dd($this->label);
    }
    public function render()
    {
        $this->menus = Folder::where('parent_id', '=', $this->fileId)->get();
        return view('livewire.detail-file', [
            'folders' => $this->menus,
            'fileId' => $this->fileId,
        ])->extends('layouts.dashboard')->section('content');
    }

    public function detail($id)
    {
        $labelold = $this->label;
        $folder = Folder::find($id);
        $labelnew = $labelold . '/' . $folder->title;
        // dd($labelnew);
        $this->emit('labelEmit', $labelnew);

        return redirect()->to('files/' . $id);
    }

    public function hendleConfirmAdd($id)
    {
        if ($this->confirmAdd) {
            $this->confirmAdd = false;
        } else {
            $this->confirmAdd = true;
        }
    }
    public function createFolder()
    {
        $this->isCreateFolder = true;
    }
    public function cancleCreateFolder()
    {
        $this->isCreateFolder = false;
        $this->confirmAdd = false;
    }
}
