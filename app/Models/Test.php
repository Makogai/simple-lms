<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @internal
 * @coversNothing
 */
class Test extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'human_readable_date',
        'human_readable_date_full',
        'has_taken_test',
        'questions_count',
    ];

    protected $fillable = [
        'course_id',
        'lesson_id',
        'title',
        'description',
        'is_published',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'test_id');
    }

    public function questionOptions()
    {
        return $this->hasManyThrough(QuestionOption::class, Question::class, 'test_id', 'question_id');
    }

    public function testResults()
    {
        return $this->hasMany(TestResult::class, 'test_id');
    }

    public function getHasTakenTestAttribute()
    {
        return $this->testResults->where('student_id', auth()->user()->id)->count() > 0;
    }

    public function getHumanReadableDateFullAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getQuestionsCountAttribute()
    {
        return $this->questions->count();
    }

    public function getHumanReadableDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
