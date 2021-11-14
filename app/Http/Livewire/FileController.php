<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Livewire\Component;

class FileController extends Component
{
    public $menus, $allMenus, $label = "Files";
    public $detailId = 0;
    public function mount()
    {
        $this->menus = Folder::where('parent_id', '=', 0)->get();
        $this->allMenus =
            Folder::where('parent_id', 0)->with(str_repeat('children.', 10))->get();
        $this->label = 'Files';
    }
    public function render()
    {
        return view('livewire.file-controller', [
            'folders' => $this->menus,
            'allFolders' => $this->allMenus
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
}
