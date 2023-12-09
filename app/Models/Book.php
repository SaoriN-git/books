<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'status'];

  /**
   * id: (autoincrement), no tnull, not same value
   * name: length 255, not null
   * status: tinyInteger(1～255), not null,1:読書中　2:未読　3:読破　4:読みたい
   * author: 著者　length 255, null OK
   * publication: 出版　length 255, not null
   * read_at: 読み終わった日　date(日付 yyyy-mm-dd) , null OK
   * note: メモ(備考)　text, null OK
   * timestamps (updated_at, created_at)
   * 
   * 出来たらtryする
   * cover_image: 本の画像
   */

  public const BOOK_STATUS_READING = 1;
  public const BOOK_STATUS_UNREAD = 2;
  public const BOOK_STATUS_DONE = 3;
  public const BOOK_STATUS_WANT_READ = 4;

  public const BOOK_STATUS_NAME_READING = '読書中';
  public const BOOK_STATUS_NAME_UNREAD = '未読';
  public const BOOK_STATUS_NAME_DONE = '読破';
  public const BOOK_STATUS_NAME_WANT_READ = '読みたい';

  public const BOOK_STATUS_OBJECT = [
    self::BOOK_STATUS_READING => self::BOOK_STATUS_NAME_READING,
    self::BOOK_STATUS_UNREAD => self::BOOK_STATUS_NAME_UNREAD,
    self::BOOK_STATUS_DONE => self::BOOK_STATUS_NAME_DONE,
    self::BOOK_STATUS_WANT_READ => self::BOOK_STATUS_NAME_WANT_READ,
  ];

  public const BOOK_STATUS_ARRAY = [
    self::BOOK_STATUS_READING,
    self::BOOK_STATUS_UNREAD,
    self::BOOK_STATUS_DONE,
    self::BOOK_STATUS_WANT_READ,
  ];
}