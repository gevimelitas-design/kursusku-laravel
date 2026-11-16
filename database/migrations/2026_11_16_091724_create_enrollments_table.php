protected $fillable = ['participant_id', 'course_id', 'status'];

public function participant(): BelongsTo
{
    return $this->belongsTo(Participant::class);
}

public function course(): BelongsTo
{
    return $this->belongsTo(Course::class);
}