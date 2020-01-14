<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    /**
     * массив, в котором перечисляются поля, доступные для mass-assignment.
     * Все что там не перечислено будет игнорироваться.
     * @var array
     */
    protected $fillable = ['name', 'description', 'notes'];

    /**
     * Этот метод, как бы, сообщает нам, кто автор текущего поста:) belongsTo определяется у
     * модели содержащей внешний ключ. Второй параметр можно не указывать, но я для удобства
     * отмечу - это имя внешнего ключа, по которому строится связь.
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
}
