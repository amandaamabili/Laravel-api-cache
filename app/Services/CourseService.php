<?php

namespace App\Services;

use App\Models\Course;
use App\Repository\CourseRepository;

class CourseService {

    protected $repository;

    public function  __construct(CourseRepository $courseRepository){
        $this->repository = $courseRepository;
    }
    public function getCourses(){

        return $this->repository->getAllCourses();
    }
}