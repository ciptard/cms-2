<?php

return array(

	/**
	 * Custom Service Providers
	 *
	 * PongoServiceProvider loaded on runtime by /app/config/app.php
	 * Loaded on boot by PongoServiceProvider -> loadServiceProviders()
	 */

	'providers' => array(

		'MarkerServiceProvider',
		'PageServiceProvider',
		'ToolServiceProvider',

		// Dependency providers

		'Teepluss\Asset\AssetServiceProvider',
		'Krucas\Notification\NotificationServiceProvider',

	),

	/**
	 * Custom Facades
	 *
	 * Loaded on boot by PongoServiceProvider -> activateFacades()
	 */

	'facades' => array(

		'Pongo' => array(

			'class' => 'Pongo\Cms\Classes\Pongo',
			'alias' => 'Pongo\Cms\Support\Facades\Pongo'

		),

		'Marker' => array(

			'class' => 'Pongo\Cms\Classes\Marker',
			'alias' => 'Pongo\Cms\Support\Facades\Marker'

		),

		'Page' => array(

			'class' => 'Pongo\Cms\Classes\Page',
			'alias' => 'Pongo\Cms\Support\Facades\Page'

		),

		'Tool' => array(

			'class' => 'Pongo\Cms\Classes\Tool',
			'alias' => 'Pongo\Cms\Support\Facades\Tool'

		),

		// Dependency facades

		'Asset' => array(

			'class' => 'Teepluss\Asset\Asset',
			'alias' => 'Teepluss\Asset\Facades\Asset'

		),

		'Notification' => array(

			'class' => 'Krucas\Notification\Notification',
			'alias' => 'Krucas\Notification\Facades\Notification'

		),

	),

	/**
	 * IoC repository binds
	 *
	 * Loaded on boot by PongoServiceProvider -> bindRepositories()
	 */
	
	'repositories' => array(

		'user' => array(

			'method'		=> 'singleton',
			'interface' 	=> 'Pongo\Cms\Support\Repositories\UserRepositoryInterface',
			'repository' 	=> 'Pongo\Cms\Support\Repositories\UserRepositoryEloquent'

		),

		'page' => array(

			'method'		=> 'singleton',
			'interface' 	=> 'Pongo\Cms\Support\Repositories\PageRepositoryInterface',
			'repository' 	=> 'Pongo\Cms\Support\Repositories\PageRepositoryEloquent'

		),

	),

	/**
	 * Custom Artisan pongo:<command>
	 *
	 * Loaded on boot by PongoServiceProvider -> bootCommands()
	 */
	
	'commands' => array(

		'pongo:import_asset' 		=> 'Pongo\Cms\Commands\ImportAssetCommand',
		'pongo:change_auth_model' 	=> 'Pongo\Cms\Commands\ChangeAuthModelCommand',

	),

);