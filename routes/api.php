<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\AdviserController;
use \App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/teachers', [AdviserController::class, 'getTeachers']);
    Route::get('/teachers/{id}', [AdviserController::class, 'getTeachersById']);
    Route::get('/courses', [AdviserController::class, 'getCourses']);
    Route::post('/student/create', [AdviserController::class, 'createStudent']);
    Route::post('/teacher/create', [AdviserController::class, 'createTeacher']);
    Route::post('/adviser/course/create', [AdviserController::class, 'createCourse']);
    Route::post('/adviser/courses/confirm', [AdviserController::class, 'confirmCourses']);
    Route::post('/adviser/teacher/delete', [AdviserController::class, 'deleteTeacher']);
    Route::post('/adviser/course/delete', [AdviserController::class, 'deleteCourse']);
    Route::get('/students/{type}', [AdviserController::class, 'getStudentsList']);
    Route::get('/students/{type}/{id}', [AdviserController::class, 'getStudentInfo']);
    Route::get('/student-courses/pdf/{type}/{id}', [AdviserController::class, 'createPDF']);
    Route::post('/student/course/create', [StudentController::class, 'createCourse']);
    Route::post('/student/course/submit', [StudentController::class, 'submitCourses']);
    Route::post('/student/course/delete', [StudentController::class, 'deleteCourse']);
    Route::get('/student/courses/{id}/{status}', [StudentController::class, 'getStudentCourses']);
});
