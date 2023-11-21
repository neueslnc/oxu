<?php

namespace App\Models;

use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\StudentCourses\Models\StudentCourse;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'login',
        "full_name",
        "img_path",
        'email',
        'number_phone',
        'debit_contrakt',
        'departament_id',
        'group_id',
        'level_id',
        'hemis_id',
        'password',
        'mb_status',
        'student_id',
        // 'phone',
        'language_id',
        'type_of_education_id',
        'form_of_education_id',
        'student_course_id',
        'direction_id',
        'dean_group_id',
        'add_time',
        "birthday",
        "father_fio",
        "father_phone",
        "number_phone",
        "mather_fio",
        "mather_phone",
        "address",
        "address_temporarily",
        "deprived_of_parental",
        "disabled",
        "social_security",
        "court",
        "workplace"
    ];

    protected $maps = [
        'img_path' => 'img_url',
        'debit_contrakt' => 'debit_sum_format'
    ];

    protected $appends = [
        'img_url',
        'debit_sum_format',
        'status_student_exam_accept'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activePc()
    {
        return $this->hasOne(ExamsContorlPC::class, 'user_id', 'id');
    }

    public function getStatusStudentExamAcceptAttribute()
    {
        if($this->attributes['mb_status'] != 0 || $this->attributes['debit_contrakt'] > 0){
            return 0;
        }

        return 1;
    }

    public function getImgUrlAttribute()
    {
        if (!empty($this->attributes['img_path'])) {

            return asset('students/images/'.$this->attributes['img_path']);
        }

        return null;

    }

    public function getDebitSumFormatAttribute()
    {
        return number_format($this->attributes['debit_contrakt'], 0, '.', ' ');
    }

    public function user_level()
    {
        return $this->hasOne(UserLevel::class, 'id', 'level_id');
    }

    public function group()
    {
        return $this->hasOne(DeanGroup::class, 'id', 'group_id');
    }

    public function hasRole($role) {
        if ($this->user_level->name == $role) {

            return true;
        }

        return false;
    }

    public function subjects()
    {
        return $this->hasMany(TeacherOnSubject::class, 'user_id', 'id');
    }

    public function teacher_subjects()
    {
        return $this->hasMany(TeacherOnSubject::class, 'user_id', 'id');
    }

    public function date_create()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function teacher_tests()
    {
        return $this->hasMany(NBTestThemeModel::class, 'user_id', 'id');
    }

    public function teacher_test_on_students()
    {
        return $this->hasMany(NBTestOnStudentModel::class, 'teacher_id', 'id');
    }

    public function subject_themes($subject_id = null)
    {

        if (isset($subject_id)) {

            return $this->hasMany(ThemeModel::class, 'teacher_id', 'id')->with('direction')->where('subject_id', '=', $subject_id)->where('status', '=', 0)->get();
        }else{

            return $this->hasMany(ThemeModel::class, 'teacher_id', 'id')->where('status', '=', 0)->get();
        }
    }

    public function departament()
    {

        return $this->hasOne(DepartamentModel::class, 'id', 'departament_id');
    }

    /**
     * @var int
     */
    protected $perPage = 15;

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function type_of_education(): BelongsTo
    {
        return $this->belongsTo(TypeOfEducationModel::class);
    }

    /**
     * @return BelongsTo
     */
    public function form_of_education(): BelongsTo
    {
        return $this->belongsTo(FormOfEducation::class, 'form_of_education_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function student_course(): BelongsTo
    {
        return $this->belongsTo(StudentCourse::class, 'student_course_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function dean_group(): BelongsTo
    {
        return $this->belongsTo(DeanGroup::class, 'group_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function dean_group_supervisor(): HasMany
    {
        return $this->hasMany(DeanGroup::class, 'supervisor_id', 'id');
    }

    public function direction_supervisor(): HasMany
    {
        return $this->hasMany(DirectionOnSupervisorModel::class, 'superviosr_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function transfer(): BelongsTo
    {
        return $this->belongsTo(TransferStudentGroup::class,'id','student_id');
    }

    public function sex(): BelongsTo
    {
        return $this->belongsTo(Sex::class);
    }

    public function add_time_sup()
    {

        return $this->add_time->format('d.m.Y');
    }

    public function get_group_supervisors()
    {
        return $this->hasMany(DeanGroup::class, 'supervisor_id', 'id');
    }

    public function get_nb()
    {
        return $this->hasMany(NBTestOnStudentModel::class, 'student_id', 'id');
    }
}
