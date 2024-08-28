<?php

namespace Yudhadev\GeneratorSupri;

use Illuminate\Support\Str;

trait HasCustomPrimaryKey
{
    protected static function bootHasCustomPrimaryKey()
    {
        static::creating(function ($model) {
            $tableName = $model->getTable();
            $singularTableName = Str::singular($tableName); // Mengubah bentuk jamak menjadi tunggal
            $primaryKey = 'id_' . $singularTableName;

            // Set properti model
            $model->primaryKey = $primaryKey;
            $model->incrementing = false;
            $model->keyType = 'string';

            // Generate primary key value
            $model->{$primaryKey} = PrimaryKeyGenerator::generatePrimaryKey($tableName);
        });
    }
}
