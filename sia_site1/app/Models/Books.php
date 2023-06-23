<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Books extends Model{
        protected $table = 'tblbooks';
        protected $fillable = ['book_name','year_publish', 'authorID'];

        public $timestamps = false;
        protected $primaryKey = 'bookID';

        // protected $hidden = [
        //     'password',
        // ];
    }

