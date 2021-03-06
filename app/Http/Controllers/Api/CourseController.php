<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCourse;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Services\CourseService;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CourseController extends Controller
{

    protected $courseService;

    public function  __construct(CourseService $courseService){
        $this->courseService = $courseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = $this->courseService->getCourses();
         return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCourse $request)
    {
            $course =  $this->courseService->createNewCourse($request->validated());
            return new CourseResource($course);

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $indentify
     * @return \Illuminate\Http\Response
     */
    public function show($indentify)
    {
        $course =  $this->courseService->getCourse($indentify);
        return  new  CourseResource($course);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
