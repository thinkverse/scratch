<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

/**
 * @property-read string               $subject
 * @property-read string               $email
 * @property-read string               $text
 * @property-read int                  $viewed
 * @property-read \Carbon\Carbon       $created_at
 * @property-read \Carbon\Carbon       $updated_at
 * @property-read \Carbon\Carbon|null  $opened_at
 */
class Email extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'opened_at',
        'subject',
        'viewed',
        'email',
        'text',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'opened_at' => 'datetime',
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            // TODO: Don't really like this, need to find a better way.
            $model->tracking_id = resolve(Hashids::class)->encode(random_int(0, PHP_INT_MAX));
        });
    }

    /**
     * Mark Email as viewed by incrementing viewed field.
     *
     * @return \App\Models\Email
     */
    public function markAsViewed(): self
    {
        return tap($this)->increment('viewed');
    }

    /**
     * Mark Email as opened
     *
     * @return \App\Models\Email
     */
    public function markAsOpened(): self
    {
        return tap($this)->update([
            'opened_at' => now(),
        ]);
    }

    /**
     * Mark Email as un-opened
     *
     * @return \App\Models\Email
     */
    public function markAsUnopened(): self
    {
        return tap($this)->update([
            'opened_at' => null,
        ]);
    }

    /**
     * Check is Email has been opened.
     *
     * @return boolean
     */
    public function wasOpened(): bool
    {
        return ! is_null($this->opened_at);
    }

    /**
     * Get an HTML element for displaying opened state.
     *
     * @return string
     */
    public function getOpenedElement(): string
    {
        return [
            1 => '<span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Opened</span>',
            0 => '<span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pending</span>',
        ][$this->wasOpened()];
    }

    /**
     * Get tracking URL for Email model.
     *
     * @return string
     */
    public function getTrackingURL(): string
    {
        return route('leads.show', [$this]) ?? config('app.url') . "/leads/{$this->tracking_id}/";
    }

    /**
     * Get a generated 1x1 pixel png.
     *
     * @return string
     */
    public function getTrackingImage(): string
    {
        $image = @imagecreate(1, 1)
            or die("Cannot Initialize new GD image stream");
        imagecolorallocatealpha($image, 0, 0, 0, 0);

        ob_start();
        imagepng($image);

        $image_data = ob_get_clean();
        ob_end_clean();

        imagedestroy($image);

        return $image_data;
    }
}
