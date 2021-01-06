<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory; //Эта модель связона с таблицей  сontact_models, потому что в ее миграции(Database\Migrations\create_contact_models_table.php) было создана данная таблица
}
