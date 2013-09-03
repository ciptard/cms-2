<?php namespace Pongo\Cms\Classes;

use Asset, HTML, View;

class Pongo {
	
	/**
	 * Asset base path
	 * 
	 * @var string
	 */
	public $asset_path = 'packages/pongocms/cms/';

	public function __construct()
	{
		
	}

	/**
	 * Asset helper shortcut
	 * 
	 * @param  string $source Asset path
	 * @param  array  $attributes
	 * @return string         Asset path
	 */
	public function asset($source = null, $attributes = array())
	{		
		if ( ! is_null($source)) {
			$type = (pathinfo($source, PATHINFO_EXTENSION) == 'css') ? 'style' : 'script';

			return HTML::$type($this->asset_path . $source, $attributes);
		} 
	}

	/**
	 * Asset container wrapper for scripts
	 * 
	 * @param  string $name Container name
	 * @return string       Asset string
	 */
	public function scripts($name = 'default')
	{
		return Asset::container($name)->scripts();
	}

	/**
	 * Asset container wrapper for styles
	 * 
	 * @param  string $name Container name
	 * @return string       Asset string
	 */
	public function styles($name = 'default')
	{
		return Asset::container($name)->styles();
	}

	/**
	 * Append asset to container
	 * @param  string $container  Container name
	 * @param  string $name       Asset name
	 * @param  string $source     Asset source
	 * @param  string $dependency Asset dependency (comes after)
	 * @return string             Print out the asset
	 */
	public function add_asset($container = 'default', $name = 'asset', $source = '', $dependency = null)
	{
		return Asset::container($container)->add($name, $source, $dependency);
	}

	/**
	 * View::make a Pongo view
	 * 
	 * @param  string $name View location
	 * @param  array  $data Array of data
	 * @return string       View content
	 */
	public function view($name, array $data = array())
	{		
		// Point to cms views
		$view_name = 'cms::' . $name;

		// Set to 'default' view if view not found
		if ( ! View::exists($view_name)) {
			$view_name_arr = explode('.', $view_name);
			$view_name = str_replace(end($view_name_arr), 'default', $view_name);
		}

		return View::make($view_name, $data);
	}

	/**
	 * Get Class name back
	 * 
	 * @return string Name of the class
	 */
	public function name()
	{
		return get_class($this);
	}
	
}