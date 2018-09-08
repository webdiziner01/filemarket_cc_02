<?php

namespace App\Http\Controllers\Account;

use App\File;
use App\Http\Requests\File\StoreFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{


    public function index(Request $request)
    {
        $files = auth()->user()->files()->latest()->finished()->get();



        return view('account.files.index', compact('files'));

    }


    public function edit(File $file){

        $this->authorize('touch',$file);

        return view('account.files.edit',compact('file'));
    }

    public function create(File $file){
        if(!$file->exists){
            $file = $this->createAndReturnSkeletonFile();

            return redirect()->route('account.files.create',$file);
        }

        $this->authorize('touch',$file);

        return view('account.files.create',compact('file'));
    }




    public function store(StoreFileRequest $request, File $file){
        $this->authorize('touch',$file);

        $file->fill($request->only(['title','overview_short','overview','price']));
        $file->finished = true;

        $file->save();


        return redirect()->route('account.files.index')->withSuccess('Thanks submitted for review.');


    }


    public function update(File $file,UpdateFileRequest $request){
        $this->authorize('touch',$file);


        $approvalProperties = $request->only(File::APPROVAL_PROPERTIES);

        if($file->needsApproval($approvalProperties)){
            dd('needs approval');
            return;
        }



       // dd($request->get('live'));

        $file->update($request->only('live','price'));

        return back()->withsuccess('File Udpated!');
    }




    protected function createAndReturnSkeletonFile(){

        return auth()->user()->files()->create([
           'title' => 'Untitled',
           'overview' => 'None',
           'overview_short' => 'None',
           'price' => 0,
           'finished' => false

        ]);

    }




}
