<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class LoanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_id', 'borrower_name', 'borrower_nim', 'borrower_email',
        'loan_date', 'expected_return_date', 'status', 'total_estimated_fee',
        'notes', 'actual_return_date',
    ];

    protected $casts = [
        'loan_date' => 'date',
        'expected_return_date' => 'date',
        'actual_return_date' => 'date',
        'total_estimated_fee' => 'decimal:2',
    ];

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }
}
