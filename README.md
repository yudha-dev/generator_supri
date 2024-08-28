# Generator id suprai

Ini untuk generator id yang table aneh harus ada singkatan depanya.

## Struktur Proyek

Proyek ini menggunakan Laravel 11 dengan beberapa penyesuaian pada model untuk mendukung penggunaan primary key kustom.

## Contoh Model `User`

Model `User` terletak di namespace `App\Models` dan menggunakan trait `HasCustomPrimaryKey` untuk mendukung primary key kustom. Berikut adalah contoh kode dari model `User`:

# Install dependensi

composer require yudhadev/generator-supri

```php
namespace App\Models;

use Yudhadev\GeneratorSupri\HasCustomPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasCustomPrimaryKey;

    // Konfigurasi model lainnya
}
```
