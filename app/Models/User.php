class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function pembeli()
    {
        return $this->hasMany(Pembeli::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
