<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * Filter form
 */
class BookFilter extends Model
{
    public $author_id;
    public $name;
    
    public $date_start;
    public $date_end;
    
    public $date_start_int;
    public $date_end_int;
    
    public $doFilter;

    public function rules()
    {
        return [
	        [['author_id', 'date_start_int', 'date_end_int', 'doFilter'], 'integer'],
	        ['name', 'string', 'max' => 255],
	        ['date_start', 'date', 'format' => 'php:d/m/Y', 'timestampAttribute' => 'date_start_int'],
	        ['date_end', 'date', 'format' => 'php:d/m/Y', 'timestampAttribute' => 'date_end_int'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'author_id' => 'Автор',
            'name' => 'Название книжки',
            'date_start' => 'Дата выхода книги (от)',
            'date_end' => 'Дата выхода книги (до)',
        ];
    }
}
