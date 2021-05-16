<?php
if (! function_exists('hasPrimary'))
{
	function hasPrimary($module_id, array $array_permissions)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['module_id'] == $module_id && $permission['func_type'] == 1 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				return true;
			}
		}
		return false;
	}
}
if (! function_exists('user_primary_links'))
{
	function user_primary_links(array $array_permissions)
	{
		$strAdditionalUrl = '';
		foreach($_SESSION['appmodules'] as $module)
		{
			if(hasPrimary($module['id'], $array_permissions))
			{


				if ($module['module_type'] == 1)
				{
									echo '<li class="nav-item">';
									echo '<a href="#" class="nav-link">';
									echo getIcon($module['id'], $_SESSION['appmodules'], false);
									echo '&nbsp<p>';
									echo ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'));
									echo '<i class="fas fa-angle-left right"></i>';
									echo '</p>';
									echo '</a>';

									echo '<ul class="nav nav-treeview" aria-labelledby="'.str_replace(' ', '', ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'))).'">';
									echo '<li class="nav-item">';
									foreach($array_permissions as $permission)
									{
										if($permission['status'] == 'a' && $permission['module_id'] == $module['id'] && $permission['func_type'] == 1 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
										{
											echo '<a id="color" class="nav-link title="'.ucwords($permission['function_name']) .'" href="'. base_url() .''.str_replace("_","-",$permission['table_name']).'">'.getIcon($permission['id'], $_SESSION['userPermmissions']);
											echo '&nbsp<p>';
											echo ucwords($permission['function_name']);
											echo '</p>';
											echo '</a>';
										}
									}
								}
									// echo '</li>';
									echo '</ul>';
									echo '</li>';
			}
		}
	}
}
// if (! function_exists('user_primary_links'))
// {
// 	function user_primary_links(array $array_permissions)
// 	{
// 		$strAdditionalUrl = '';
// 		foreach($_SESSION['appmodules'] as $module)
// 		{
// 			if(hasPrimary($module['id'], $array_permissions))
// 			{
//
//
// 				if ($module['module_type'] == 1)
// 				{
// 									echo '<li class="nav-item">';
// 									echo '<a href="#" class="nav-link" id="'.str_replace(' ', '', ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'))).'">';
// 									echo getIcon($module['id'], $_SESSION['appmodules'], false);
// 									echo '&nbsp<p>';
// 									echo ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'));
// 									echo '<i class="fas fa-angle-left right"></i>';
// 									echo '</p>';
// 									echo '</a>';
//
// 									echo '<ul class="nav nav-treeview" aria-labelledby="'.str_replace(' ', '', ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'))).'">';
// 									echo '<li class="nav-item">';
// 									foreach($array_permissions as $permission)
// 									{
// 										if($permission['status'] == 'a' && $permission['module_id'] == $module['id'] && $permission['func_type'] == 1 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
// 										{
// 											echo '<a id="color" class="nav-link title="'.ucwords($permission['function_name']) .'" href="'. base_url() .''.str_replace("_","-",$permission['table_name']).'">'.getIcon($permission['id'], $_SESSION['userPermmissions']);
// 											echo '&nbsp<p>';
// 											echo ucwords($permission['function_name']);
// 											echo '</p>';
// 											echo '</a>';
// 										}
// 									}
// 								}
// 									echo '</li>';
// 									echo '</ul>';
// 									echo '</li>';
// 			}
// 		}
// 	}
// }


if (! function_exists('user_primary_links_two'))
{
	function user_primary_links_two(array $array_permissions)
	{
		$strAdditionalUrl = '';
		foreach($_SESSION['appmodules'] as $module)
		{
			if(hasPrimary($module['id'], $array_permissions))
			{
				if ($module['module_type'] == 1)
				{

				}
				else{

								echo '<li class="nav-item">';
				            echo '<a href="'.base_url() . $module['module_name'].'" class="nav-link">';
				             echo getIcon($module['id'], $_SESSION['appmodules'], false).'&nbsp ';
				             echo '<p>';
				               echo ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'));
				              echo '</p>';
				           echo '</a>';
				          echo '</li>';
					// echo '<a class="nav-link" href="'.base_url() . $module['module_name'].'">';
					// echo getIcon($module['id'], $_SESSION['appmodules'], false).'&nbsp ';
					// echo "<span>";
					// echo ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'));
					// echo "</span>";
					// echo "</a>";
				}
			}
		}
	}
}

if (! function_exists('user_primary_links_three'))
{
	function user_primary_links_three(array $array_permissions)
	{
		$strAdditionalUrl = '';
		foreach($_SESSION['appmodules'] as $module)
		{
			if(hasPrimary($module['id'], $array_permissions))
			{
				if ($module['module_type'] == 3)
				{
					echo '<li class="nav-item">';
					echo '<a href="'.base_url() . $module['module_name'].'" class="nav-link">';
					echo getIcon($module['id'], $_SESSION['appmodules'], false).'&nbsp ';
					echo '<p>';
					echo ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'));
					echo '</p>';
					echo '</a>';
					echo '</li>';
				}
				else{

					// echo '<a class="nav-link" href="'.base_url() . $module['module_name'].'">';
					// echo getIcon($module['id'], $_SESSION['appmodules'], false).'&nbsp ';
					// echo "<span>";
					// echo ucwords(name_on_system($module['id'], $_SESSION['appmodules'], 'modules'));
					// echo "</span>";
					// echo "</a>";
				}
			}
		}
	}
}

if (! function_exists('user_add_link_dashboard'))
{
	function user_add_link_dashboard(string $table, array $array_permissions)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($table)
				{
					case 'parameter_items':
						echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#frmParameterItems"><i class="fas fa-plus"></i> Add Parameter Items</button>';
						break;
					default:
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/edit" class="btn btn-default float-right"><i class="fas fa-print"></i> Print Dashboard</a>';
						break;
				}
				break;
			}
		}

	}
}
if (! function_exists('user_add_link'))
{
	function user_add_link(string $table, array $array_permissions)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($table)
				{
					case 'parameter_items':
						echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#frmParameterItems"><i class="fas fa-plus"></i> Add Parameter Items</button>';
						break;
					default:
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-md btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
				}
				break;
			}
		}

	}
}
if (! function_exists('guests_print'))
{
	function guests_print(string $table, array $array_permissions)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($table)
				{
					case 'parameter_items':
						echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#frmParameterItems"><i class="fas fa-plus"></i> Add Parameter Items</button>';
						break;
					default:
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/print" class="btn btn-md btn-danger btn-block float-right" style="font-size: 15px;"><i class="fas fa-print"></i>&nbsp&nbspGenerate '.ucwords(str_replace('_', ' ', $table)) .' PDF</a>';
						break;
				}
				break;
			}
		}

	}
}
if (! function_exists('guests_print_pdf'))
{
	function guests_print_pdf(string $table, array $array_permissions)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($table)
				{
					case 'parameter_items':
						echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#frmParameterItems"><i class="fas fa-plus"></i> Add Parameter Items</button>';
						break;
					default:
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/print_g" class="btn btn-sm btn-success btn-block float-right" style="padding: 10px; font-size: 15px;"><i class="fas fa-print"></i>&nbsp&nbspGenerate '.ucwords(str_replace('_', ' ', $table)) .' PDF</a>';
						break;
				}
				break;
			}
		}

	}
}

if (! function_exists('guest_detail_add_link'))
{
	function guest_detail_add_link(string $table, array $array_permissions, int $id)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($table)
				{
					case 'parameter_items':
						echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#frmParameterItems"><i class="fas fa-plus"></i> Add Parameter Items</button>';
						break;
					default:
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add/'.$id.'" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
				}
				break;
			}
		}
	}
}
if (! function_exists('maintenance_detail_add_link'))
{
	function maintenance_detail_add_link(string $table, array $array_permissions)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($table)
				{
					case 'genders':
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
					case 'extensions':
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
					case 'provinces':
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
					case 'cities':
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
					case 'departments':
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
					case 'types':
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
					case 'parameter_items':
						echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#frmParameterItems"><i class="fas fa-plus"></i> Add Parameter Items</button>';
						break;
					default:
						echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/add" class="btn btn-sm btn-primary btn-block float-right"><i class="fas fa-plus"></i> Add '.ucwords(str_replace('_', ' ', $table)) .'</a>';
						break;
				}
				break;
			}
		}
	}
}

if (! function_exists('file_upload_link'))
{
	function file_upload_link($slugs, array $array_permissions, $name, $class, $hasStyle = 1)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['slugs'] == $slugs && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				echo '<div class="col-md">';
					echo '<a id = "'.$name.'" name="'.$name.'" href="'.base_url('academic-documents/'.$slugs) .'" class="'.$class.'">';
					if($hasStyle == 1){
						echo '<i style="font-size: 3em" class="fas fa-file-upload"></i> <br>'.$permission['function_name'];
					}
					else {
						echo '<i style="font-size: 1.3em" class="fas fa-file-upload"></i> '.$permission['function_name'];
					}
		 	    echo '</a>';
				echo '</div>';
				break;
			}
		}

	}
}

if (! function_exists('user_edit_link'))
{
	function user_edit_link(string $table, string $slugs, array $array_permissions, $id)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['slugs'] == $slugs && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/edit/'.$id.'" class="btn btn-sm btn-warning btn-block"><i class="far fa-edit"></i> Edit</a>';
				break;
			}
		}

	}
}

if (! function_exists('guest_detail_link'))
{
	function guest_detail_link(string $table, string $slugs, array $array_permissions, $id)
	{
		foreach($array_permissions as $permission)
		{
			if($permission['slugs'] == $slugs && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				echo  '<a href="'. base_url() .''.str_replace("_","-",$table).'/show/'.$id.'" class="btn btn-sm btn-warning"><i class="fas fa-bars"></i> Show Detail</a>';
				break;
			}
		}

	}
}

if (! function_exists('users_action'))
{
	function users_action(string $table, array $array_permissions, $id, $pId = 0)
	{

		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($permission['func_action'])
				{
					case 'show':
						echo '<a class="btn btn-default btn-sm" style="border: 1px solid #343a40;" title="show" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'"><i class="fas fa-bars"></i></a> ';
						break;
					case 'edit':
						switch($table){
							case 'attachments':
								echo '<a class="btn btn-default btn-sm" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'/'.$pId . '"><i class="far fa-edit"></i></a> ';
							break;
							case 'checklists':
								echo '<a class="btn btn-warning" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'/'.$pId . '"><i class="far fa-clipboard"></i> Proceed to assessment.</a> ';
							break;
							case 'dashboard':
								echo '<a class="btn btn-default" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'"><i class="far fa-print"></i> Print Dashboard</a> ';
							break;
							case 'guest%20assessment':
								echo '<a class="btn btn-warning btn-md" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'"><i class="far fa-clipboard"></i> Evaluate</a> ';
							break;
							default:
								echo '<a class="btn btn-default btn-sm" style="border: 1px solid #343a40;" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'"><i class="far fa-edit"></i></a> ';
							break;
						}
						break;
					case 'delete':
						switch($table){
							case 'guest_conditions':
								echo  '<a class="btn btn-default btn-sm remove" onClick="confirmDelete(\''.base_url().''.str_replace("_","-",$table).'/delete/'.$id.'/'.$pId.'\')" title="delete"><i class="far fa-trash-alt"></i></a>';
							break;
							case 'guests':
									echo  '<a class="btn btn-default btn-sm remove" style="border: 1px solid #343a40;" onClick="confirmDelete(\''.base_url().''.str_replace("_","-",$table).'/delete/'.$id.'\')" title="delete"><i class="far fa-trash-alt"></i></a>';
							break;
							default:
									echo  '<a class="btn btn-default btn-sm remove" style="border: 1px solid #343a40;" onClick="confirmDelete(\''.base_url().''.str_replace("_","-",$table).'/delete/'.$id.'\')" title="delete"><i class="far fa-trash-alt"></i></a>';
							break;
						}
						break;
				}
			}
		}
	}
}

if (! function_exists('maintenance_action'))
{
	function maintenance_action(string $table, array $array_permissions, $id, $pId = 0)
	{

		foreach($array_permissions as $permission)
		{
			if($permission['table_name'] == $table && $permission['func_type'] == 3 && in_array($_SESSION['rid'], json_decode($permission['allowed_roles'])))
			{
				switch($permission['func_action'])
				{
					case 'edit':
						switch($table){
							case 'attachments':
								echo '<a class="btn btn-default btn-sm" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'/'.$pId . '"><i class="far fa-edit"></i></a> ';
							break;
							case 'checklists':
								echo '<a class="btn btn-warning" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'/'.$pId . '"><i class="far fa-clipboard"></i> Check this Person</a> ';
							break;
							case 'dashboard':
								echo '<a class="btn btn-default" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'"><i class="far fa-print"></i> Print Dashboard</a> ';
							break;
							case 'genders':
								echo '<a class="btn btn-default btn-sm" style="border: 1px solid #343a40;" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'"><i class="far fa-edit"></i></a> ';
							break;
							default:
								// echo '<a class="btn btn-warning btn-lg" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'/'.$pId . '"><i class="far fa-clipboard"></i> Take Assessment</a> ';
								echo '<a class="btn btn-default btn-sm" style="border: 1px solid #343a40;" title="edit" href="'. base_url() .''.str_replace("_","-",$table).'/'.$permission['func_action'].'/'. $id.'"><i class="far fa-edit"></i></a> ';
							break;
						}
						break;
					// case 'delete':
					// 	switch($table){
					// 		case 'guest_conditions':
					// 			echo  '<a class="btn btn-default btn-sm remove" onClick="confirmDelete(\''.base_url().''.str_replace("_","-",$table).'/delete/'.$id.'/'.$pId.'\')" title="delete"><i class="far fa-trash-alt"></i></a>';
					// 		break;
					// 		case 'guests':
					// 				echo  '<a class="btn btn-default btn-sm remove" style="border: 1px solid #343a40;" onClick="confirmDelete(\''.base_url().''.str_replace("_","-",$table).'/delete/'.$id.'\')" title="delete"><i class="far fa-trash-alt"></i></a>';
					// 		break;
					// 		default:
					// 				echo  '<a class="btn btn-default btn-sm remove" style="border: 1px solid #343a40;" onClick="confirmDelete(\''.base_url().''.str_replace("_","-",$table).'/delete/'.$id.'\')" title="delete"><i class="far fa-trash-alt"></i></a>';
					// 		break;
						// }
						// break;
				}
			}
		}
	}
}

if (! function_exists('user_link'))
{
	function user_link(string $slugs, array $array_permissions)
	{
		$isValidSlug = 0;

		if(!empty($array_permissions))
		{
			foreach($array_permissions as $permission)
			{
				if(in_array($slugs, $permission))
				{
					return 1;
				}
			}

			if($isValidSlug == 0)
			{
				return 0;
			}

		}
	}
}
