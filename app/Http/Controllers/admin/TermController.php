<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;
class TermController extends Controller{
    
    public function term_list(){
        $terms = Term::orderBy('id', 'asc')->get();
        return view('admin.term&condition.term_condition',['terms'=>$terms]);
    }
    
    public function add(){
        return view('admin.term&condition.add');
    }
    
    public function store(Request $request){ 
        $name=$request->name;
        $content=$request->content;

        $data_add=['name'=>$request->name,
        'content'=>$content,
    ];    
    
    if(Term::insert($data_add)){
        return redirect()->route('admin.term&condition.term_condition')->with('success','add user success..');
    }
    return redirect::back()->witherrors(['msg' => 'add t&c failed']);
    }
    
    public function term_edit($id){
        $terms = Term::where('id', $id)->first();
        return view('admin.term&condition.edit',['terms'=>$terms]);
    }
    
    public function term_delete($id){
        $terms = Term::where('id',$id)->firstorfail()->delete();
        return redirect()->route('admin.term&condition.term_condition')->with('success','Deleted successfully..');
    }
    
    public function term_update(Request $request,$id){
        $name=$request->name;
        $terms = Term::where('id',$id)->first();
    
        $data_add['name']=$name;
        Term::where('id',$id)->update($data_add);
        return redirect()->route('admin.term&condition.term_condition')->with('success','Data updated successfully..');
    }   
}