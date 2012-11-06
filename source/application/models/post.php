<?php

class Post extends Eloquent {

	public static $table = 'posts';

	public function __construct($attributes = array(), $exists = false)
	{
		$this->exists = $exists;

		$defaults = array(
			'title'      => 'Untitled Post',
			'created_by' => \Auth::user()->id
		);

		$attributes = array_merge($defaults, $attributes);

		if (! $this->exists)
		{
			$attributes['slug'] = self::create_slug($attributes['title']);
		}

		$this->fill($attributes);
	}

	public static function create($attributes = array())
	{
		$defaults = array(
			'title'      => 'Untitled Post',
			'created_by' => \Auth::user()->id
		);

		$attributes = array_merge($defaults, $attributes);

		$attributes['slug'] = self::create_slug($defaults['title']);
		
		$model = new static($attributes);

		$success = $model->save();

		return ($success) ? $model : false;
	}

	public static function create_slug($string)
	{
		$slug = Str::slug($string);

		$query = DB::table(static::$table)->get(array('slug'));

		$slugs = array();

		foreach($query as $row)
		{
			$slugs[] = $row->slug;
		}

		while(in_array($slug, $slugs))
		{
			$slug = increment_string($slug, '-');
		}

		return $slug;
	}

}
