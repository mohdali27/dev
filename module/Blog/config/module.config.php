<?php
return array(
				'db' => array(
				 'driver'         => 'Pdo',
				 'username'       => 'root',  //edit this
				 'password'       => '',  //edit this
				 'dsn'            => 'mysql:dbname=blog;host=localhost',
				 'driver_options' => array(
					 \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				 )
				),
				'service_manager' => array(
					 'factories' => array(
						 'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
						 'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
						 'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory'
					 ),
					
				 ),
				/* 'service_manager' => array(
					 'factories' => array(
						 'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory'
					 )
				 ),

				'service_manager' => array(
					 'invokables' => array(
						 'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
					 )
				 ), */

				'view_manager' => array(
					 'template_path_stack' => array(
						 __DIR__ . '/../view',
					 ),
				 ),

				'controllers' => array(
					/* 'invokables' => array(
						'Blog\Controller\List' => 'Blog\Controller\ListController'
					) */
					'factories' => array(
						 'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
					 )

				),
				'router'=>array(
					'routes'=>array(
						'post'=>array(
								'type'=>'literal',
								'options'=>array(
									'route'=>'/blog',
									'defaults'=>array(
										'controller'=>'Blog\Controller\List',
										'action'=>'index',
									)
								
								)
						)
					)
				)
			);