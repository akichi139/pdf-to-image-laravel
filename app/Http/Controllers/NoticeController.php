<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use Storage;
use File;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $data['notices'] = Notice::orderBy('id', 'asc')->paginate(5);

        return view('notice.index', $data);
    }

    public function create()
    {
        return view('notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'information' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048', // Validate PDF files, max 2MB
        ]);

        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFileName = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfFile->storeAs('notice', $pdfFileName, 'local'); // Store the file in the 'public/pdfs' directory
        }

        $reserve = new Notice;
        $reserve->name = $request->name;
        $reserve->information = $request->information;
        $reserve->pdf = $pdfFileName;
        $reserve->save();

        return redirect()->route('notice.index')->with('success', 'Room has been created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('notice.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);

        $room = Notice::find($id);
        $room->room_name = $request->name;
        $room->color = $request->color;
        $room->max_participant = $request->max_participant;
        $room->image = $fileName;
        $room->admin_permission = $request->admin_permission == 'on' ? 1 : 0;
        $room->save();

        return redirect()->route('notice.index')->with('success', 'Room has been update successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();

        return redirect()->route('notice.index')->with('success', 'Room has been delete successfully.');
    }

    public function view(Notice $notice)
    {
        $contents = Storage::disk("local")->path("notice/" . $notice->pdf);

        $pdf = new Pdf($contents);

        $outputDirectory = Storage::disk("local")->path("notice/image/");

        foreach (range(1, $pdf->getNumberOfPages()) as $pageNumber) {
            $outputFilename = 'page' . $pageNumber . '.jpg';
            $pdf->setPage($pageNumber)->saveImage($outputDirectory . $outputFilename);
        }

        return view('notice.view', compact('pageNumber'));
    }
}