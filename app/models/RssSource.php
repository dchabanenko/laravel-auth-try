<?php
/**
 * Rss source contains paper source url, name, description and connection to the author
 */

class RssSource extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feeds';

    public function creator()
    {
        return $this->belongsTo('User', 'local_key');
    }

} 