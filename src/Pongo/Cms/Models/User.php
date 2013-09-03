<?php namespace Pongo\Cms\Models;

use Eloquent;

class User extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Allowed mass assignment columns
	 * 
	 * @var array
	 */
	protected $fillable = array('username', 'email');

	/**
	 * Danied mass assignment columns
	 * 
	 * @var array
	 */
	protected $guarded = array('id', 'password');



}