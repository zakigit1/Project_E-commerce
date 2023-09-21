<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
  public function index(){
    
    return view('admin.languages.index',
    ['languages'=>Language::select()->paginate(PAGINATION_COUNT)]);

  }



  public function create(){

    return view('admin.languages.create');

  }
  


  public function store(LanguageRequest $request){
    
    try{

      #Method 1 :
        // $add= new Language();
      
        // $add->name=strip_tags($request->input('name'));
        // $add->abbr=strip_tags($request->input('abbr'));
        // $add->direction=strip_tags($request->input('direction'));
        // $add->active=strip_tags($request->input('active'));
        // $add->save();
      
      #Method 2 :
      Language::create($request->except(["_token"]));

       return redirect()->route('admin.all.lang')->with(['success' => 'تم حفظ اللغة بنجاح']);

    }catch(\Exception $e){
      
      return redirect()->route('admin.all.lang')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
      
    }

  
  }
  

  
  public function edit(string $id){
  
    $language=Language::select()->find($id);

    if(!$language){
      return redirect()->route('admin.all.lang')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
    }

    return view('admin.languages.edit', compact('language'));
  
  }



  public function update(LanguageRequest $request , string $id){

    try{
      
      $to_update=Language::find($id);

      if(!$to_update){
        return redirect()->route('admin.edit.lang',$id)->with(['error' => 'هناك خطا أثناء تحديث']);
      }
      
      #Method 1 : This Method is not working 
        // $to_update->name=strip_tags($request->input('name'));
        // $to_update->abbr=strip_tags($request->input('abbr'));
        // $to_update->direction=strip_tags($request->input('direction'));
        // $to_update->action=strip_tags($request->input('action'));
        // $to_update->save();

      #Method 2 : is working

      // $to_update->update($request->all());


      #Method 3 : is working
      $to_update->update($request->except(['_token']));

      return redirect()->route('admin.all.lang')->with(['success' => 'تم تحديث اللغة بنجاح']);
      
    }catch(\Exception $e){
 
      return redirect()->route('admin.all.lang')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
    
    }

  }



  public function delete($id){

    try{
      $to_delete=Language::find($id);
      
      if(!$to_delete){
        return redirect()->route('admin.all.lang')->with(['error' => 'هناك خطا أثناء الحذف']);
      }
      
      $to_delete->delete();
      return redirect()->route('admin.all.lang')->with(['success' => 'تم الحذف اللغة بنجاح']);
      
      // $language=Language::findOrFail($id);
      // $language->delete();
      
    }catch(\Exception $e ){

      return redirect()->route('admin.all.lang')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);

    }
    }



}
