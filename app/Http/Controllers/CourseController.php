<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct(){
        // middleware validation of user role dobavlyaem middleware
        $this->middleware(['teacherAdmin'])->only('create','store','edit','update','destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //berem info vse kursi i schitivayem
        $courses = Course::all();
        // return view('courses',['coursesAll'=>$courses]);
        return view('courses',compact('courses'));
    }
    // return ('Hello');

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //to chto bilo schitano vivodim na ekran s pomoshyu view 
    public function create()
    {
        return view('course_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data validation rules
        $validated_data = $request->validate([
            'Name' => 'required|string|max:200',
            'Duration' => 'requireD|string',
            'Cost' => 'required|integer|min:100|max:10000',
            'Location' => 'required|string',
            'teacher_id' => 'integer|exists:users,id'
        ]);
        // if data was validated 
        // dd('hello'); // - good command for checking incoming data
        
        // create new Course
        $course = Course::create($validated_data);
        \DB::table('users__courses')->insert([
            'user_id' => $validated_data['teacher_id'],
            'course_id'=>$course->id]);
        //posle togo kak dobavili kurs vozvrashemsya v courses show 
        return redirect()->route('courses.show',$course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(\Auth::user()->email);
        $course = Course::findOrFail($id);
        return view('course',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // tut mi delayem edit kakogoto kursa 
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('course_edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // data validation rules
        $validated_data = $request->validate([
            'Name' => 'required|string|min:10|max:200',
            'Duration' => 'requireD|string',
            'Cost' => 'required|integer|min:100|max:10000',
            'Location' => 'required|string'
        ]);
        // if data was validated 
        // dd('hello'); // - good command for checking incoming data

        // create new Course
        $course = Course::findOrFail($id)->update($validated_data);

        return redirect()->route('courses.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('courses.index');
    }

    public function firstCourse(){
        $course = Course::first();
        // return view('courses_first',compact('course'));        
        return view('courses_first',['course'=>$course]);        
    }

    public function apply($id){
        $course = Course::findOrFail($id);
        \DB::table('users__courses')->updateOrInsert([
            'user_id' => \Auth::id(),
            'course_id' => $id
        ]);
        return redirect()->route('courses.show',$id)->with('message','You have applied!');
    }

    public function deleteApplication(Request $request){
        DB::table('users__courses')
            ->where('user_id',$request->input('user_id'))
            ->where('course_id',$request->input('course_id'))->delete();
        return redirect()->route('courses.show',$request->input('course_id'));
    }
}
