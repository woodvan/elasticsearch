<?php
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Response;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $students = Student::searchByQuery(array('match' => array('first_name' => $request->input('search'))))->toArray();
            //$students= Student::search($request->input('search'))->toArray();
            return view('student-search',compact('students'));
        }
        return view('student-search');
    }
    /**
     * create student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
        ]);
        $student= Student::create($request->all());
        $student->addToIndex();
        return redirect()->back();
    }
}
?>