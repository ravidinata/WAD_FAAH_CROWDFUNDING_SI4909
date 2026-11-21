<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['user_id','kategori_bantuan_id','judul','deskripsi','target_dana','terkumpul','gambar'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBantuan::class, 'kategori_bantuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar ? asset('storage/'.$this->gambar) : asset('images/bencana.webp');
    }
}