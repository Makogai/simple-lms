<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'test_results';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'human_readable_date',
        'human_readable_date_full',
    ];

    protected $fillable = [
        'test_id',
        'student_id',
        'score',
        'created_at',
        'updated_at',
        'deleted_at',
        'question_count'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function getHumanReadableDateFullAttribute()
    {
        return $this->serializeDate($this->created_at);
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
