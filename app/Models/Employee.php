<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    protected $casts = [
        'birth_date' => 'date',
        'hire_date' => 'date',
    ];

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    // scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeTerminated($query)
    {
        return $query->where('status', 'terminated');
    }
    // get count of active, inactive, terminated employees
    public function getActiveCountAttribute()
    {
        return $this->where('status', 'active')->count();
    }
    public function getInactiveCountAttribute()
    {
        return $this->where('status', 'inactive')->count();
    }
    public function getTerminatedCountAttribute()
    {
        return $this->where('status', 'terminated')->count();
    }
    
    // relationships

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }
    public function performanceReviews()
    {
        return $this->hasMany(PerformanceReview::class);
    }
    public function employeeSalaries()
    {
        return $this->hasMany(EmployeeSalary::class);
    }

    public function employeeDocuments()
    {
        return $this->hasMany(EmployeeDocument::class);
    }
    public function attendanceRecords()
    {
        return $this->hasMany(AttendanceRecord::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
