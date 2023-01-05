<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Support\Facades\Request;

class StudentController extends Controller
{
    // Get all courses where the user is enrolled
    public function courses()
    {
        $courses = auth()->user()->courses;
        return view('student.courses.index', compact('courses'));
    }

    // Get a single course
    public function course(Course $course)
    {
        $course->load('lessons');
        $course->load('notifications');
        return view('student.courses.show', compact('course'));
    }

    // Get all tests where the user is enrolled
    public function tests()
    {
        $tests = auth()->user()->courses->map(function ($course) {
            return $course->tests->where('is_published', true);
        })->flatten();
        return view('student.tests.index', compact('tests'));
    }

    // Get a single test
    public function test(Test $test)
    {
        $test->load('questions');
        $test->load('questionOptions');

        // map the questions to the question options
//        $test->questions->map(function ($question) {
//            $question->questionOptions = $question->questionOptions->shuffle();
//        });

        return view('student.tests.show', compact('test'));
    }

    public function testStore(\Illuminate\Http\Request $request){
        $test = Test::find($request->test_id);
        $test->load('questions');
        $test->load('questionOptions');

        // parse the request
        $answers = $request->except(['_token', 'test_id']);
        $correctAnswers = 0;
        $totalQuestions = 0;
        foreach ($answers as $questionId => $answerId) {
            $question = $test->questions->where('id', $questionId)->first();
            $question->load('questionOptions');
            $correctAnswer = $question->questionOptions->where('is_correct', true)->first();

            if($correctAnswer->id == $answerId){
                $correctAnswers++;
            }
            $totalQuestions++;
        }

        // Save the reulst to test results table
        TestResult::query()->create([
            'student_id' => auth()->user()->id,
            'test_id' => $test->id,
            'score' => $correctAnswers,
            'total_questions' => $totalQuestions,
        ]);

        return redirect()->route('learn.results');
    }

    public function results(){
        $results = auth()->user()->testResults;
        return view('student.results', compact('results'));
    }
}
