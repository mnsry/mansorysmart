<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'category_id', 'mahale', 'mahalekharid', 'address', 'sanad', 'jahat', 'senbana', 'kolvahed',
        'vahed', 'tabaghat', 'tabaghe', 'tabaghatbeyn', 'parking', 'anbari', 'elvator', 'metrajzamin', 'metrajmaskoni',
        'metrajtejari', 'metrajmohavate', 'metrajmohavatebeyn', 'metrajbanabeyn', 'metrajbeyn', 'metrajhashiye',
        'metraj', 'metrajbana', 'metrajbalkon', 'metrajhayat', 'otagh', 'ashpazkhane', 'emtiazat', 'emtiazatbagh',
        'abouteemtiazat', 'nama', 'darb', 'kafposh', 'divar', 'divarsanati', 'saghf', 'loster', 'hammam', 'tovalet',
        'dastshor', 'zarfiyattedad', 'zarfiyat', 'zarfiyatmazad', 'abgarm', 'garmayesh', 'sarmayesh', 'estakhr',
        'sonajacozi', 'alachigh', 'gasromizi', 'takht', 'moble', 'tv', 'yakhchal', 'pokhtopaz', 'priceadi',
        'priceendhafte', 'pricetatilat', 'pricenafar', 'price', 'pricerahnaz', 'priceejareaz', 'pricerahnta',
        'priceejareta', 'priceasl', 'pricebarahn', 'priceejarebeyn', 'takhleyeday', 'takhleyemonth', 'van', 'komoddivari',
        'kabinet', 'shoghl', 'aboute', 'image', 'imagemulti', 'video', 'sabeghe', 'sabegheaz', 'mojavez', 'shekar',
        'ajnas', 'pricemoaveze', 'like', 'moavezeba', 'mahalemoaveze', 'status',
    ];

    protected $casts = [
        'mahalekharid' => 'array', 'tabaghatbeyn' => 'array', 'metrajmohavatebeyn' => 'array', 'imagemulti' => 'array',
        'metrajbanabeyn' => 'array', 'metrajbeyn' => 'array', 'emtiazat' => 'array', 'emtiazatbagh' => 'array',
        'priceejarebeyn' => 'array', 'sabegheaz' => 'array', 'mahalemoaveze' => 'array', 'sarmayesh' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    function hosCol(string $column): bool
    {
        return Schema::hasColumn('files', $column);
    }

    function type(string $column): string
    {
        return Schema::getColumnType('files', $column);
    }

    function isFK(string $column): bool
    {
        $fkColumns = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableForeignKeys('files');

        return collect($fkColumns)->map(function ($fkColumn) {
            return $fkColumn->getColumns();
        })->flatten()->contains($column);
    }
}
