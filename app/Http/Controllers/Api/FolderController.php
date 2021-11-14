<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FolderController extends Controller
{
    public function index()
    {
        $data = Folder::where('parent_id', 0)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'list parent id = 0',
            'data' => $data
        ], 200);
    }

    public function detail($id)
    {
        $folder = Folder::with(str_repeat('children.', 20))->with('file')->find($id);
        if (!$folder) {
            return response()->json([
                'not found folder id'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'list parent id = 0',
            'data' => $folder
        ], 200);
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'string|required'
        ];

        $data = $request->all();
        $validasi = Validator::make($data, $rules);
        if ($validasi->fails()) {
            return response()->json([$validasi->errors()], 400);
        }

        $folder = Folder::create($data);

        return response()->json([
            'success create folder', $folder
        ], 200);
    }
    public function createChild(Request $request)
    {
        $rules = [
            'title' => 'string|required',
            'parent_id' => 'integer|required'
        ];

        $data = $request->all();
        $validasi = Validator::make($data, $rules);
        if ($validasi->fails()) {
            return response()->json([$validasi->errors()], 400);
        }

        $folderid = Folder::find($request->parent_id);
        if (!$folderid) {
            return response()->json(['folder id not fount'], 404);
        }

        $folder = Folder::create($data);

        return response()->json([
            'success create folder', $folder
        ], 200);
    }
    public function createFile(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg,pdf,doc,docx',
            'folder_id' => 'integer|required'
        ];

        $data = $request->all();
        $validasi = Validator::make($data, $rules);
        if ($validasi->fails()) {
            return response()->json([$validasi->errors()], 400);
        }

        $folderid = Folder::find($request->folder_id);
        if (!$folderid) {
            return response()->json(['folder id not fount'], 404);
        }

        $file = $request->file('file')->store(
            'assets/' . $folderid->title,
            'public'
        );

        // $file =$request->file('file');
        // $nama_file = time() . "_" . $file->getClientOriginalName();
        // $tujuan_upload = $

        $data['file'] = $file;
        $fileCreate = File::create($data);

        return response()->json(['success create file', $fileCreate], 200);
    }
}
