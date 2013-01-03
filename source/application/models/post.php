<?php

class Post extends Eloquent {

	public static $table = 'posts';

	public static $default_title = 'Untitled Post';

	public function __construct($attributes = array(), $exists = false)
	{
		$this->exists = $exists;

		$defaults = array(
			'title'      => static::$default_title,
			'status'     => 'draft',
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
			'title'      => static::$default_title,
			'status'     => 'draft',
			'created_by' => \Auth::user()->id
		);

		$attributes = array_merge($defaults, $attributes);

		$attributes['slug'] = self::create_slug($defaults['title']);

		$model = new static($attributes);

		$success = $model->save();

		return ($success) ? $model : false;
	}

	public function tags()
	{
		return $this->has_many_and_belongs_to('Tag', 'post_tags');
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

	public function get_permalink()
	{
		return URL::to($this->slug);
	}

	public function get_edit_url()
	{
		$url = URL::to_route('Post');
		return $url . '/' . $this->id;
	}

	public function get_date()
	{
		return strftime('%e, %b %Y', strtotime($this->created_at));
	}

	public function get_tag_array()
	{
		$models = $this->tags()->get();

		$list = array();

		foreach($models as $model)
		{
			$list[$model->slug] = $model->title;
		}

		return $list;
	}

	public function get_comma_seperated_tags()
	{
		$models = $this->tags()->get();

		$list = array();

		foreach($models as $model)
		{
			$list[] = $model->title;
		}

		return implode($list, ',');
	}

	public function get_tag_titles()
	{
		$models = $this->tags()->get();

		$list = array();

		foreach($models as $model)
		{
			$list[] = $model->title;
		}

		asort($list);

		if (count($list) > 3)
		{
			$list = array(
				$list[0],
				$list[1],
				$list[2] . ' ...'
			);
		}

		return implode($list, ', ');
	}

}
