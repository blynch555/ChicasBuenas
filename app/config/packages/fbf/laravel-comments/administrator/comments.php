<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Comentarios',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'comentario',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelComments\Comment',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'user_id' => array(
			'title' => 'Autor',
			'relationship' => 'user', //this is the name of the Eloquent relationship method!
			'select' => "(:table).username",
		),
		'comment_for_administrator' => array(
			'title' => 'Comentario',
			'select' => 'comment',
		),
		'commentable_type' => array(
			'title' => 'Tipo',
			'editable' => false,
		),
		'on_title' => array(
			'title' => 'Titulo',
		),
		'created_at' => array(
			'title' => 'Creado'
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'comment' => array(
			'title' => 'Comentario',
			'type' => 'textarea',
		),
		'created_at' => array(
			'title' => 'Creado',
			'type' => 'datetime',
			'editable' => false,
		),
		'updated_at' => array(
			'title' => 'Actualizado',
			'type' => 'datetime',
			'editable' => false,
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'comment' => array(
			'type' => 'text',
			'title' => 'Contenido',
		),
		'created_at' => array(
			'title' => 'Creado',
			'type' => 'datetime',
		),
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'comment' => 'required',
	),

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'created_at',
		'direction' => 'desc',
	),

	/**
	 * The action_permissions option lets you define permissions on the four primary actions: 'create', 'update', 'delete', and 'view'.
	 * It also provides a secondary place to define permissions for your custom actions.
	 *
	 * @type array
	 */
	'action_permissions'=> array(
		'create' => function($model)
			{
				return false;
			}
	),

	/**
	 * If provided, this is run to construct the front-end link for your model
	 *
	 * @type function
	 */
	'link' => function($model)
		{
			return $model->getUrl();
		},

);