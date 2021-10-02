<?php
if (! function_exists('name_on_system'))
{
	function name_on_system($id = 0, $lists = [], $table = '')
	{
		$str = "";
		if(!empty($lists))
		{
			foreach($lists as $list)
			{
				if($list['id'] == $id)
				{
					switch($table)
					{
						case 'roles':
							$str = $list['role_name'];
							break;
						case 'users':
							$str = $list['firstname'].' '.$list['lastname'];
							break;
						case 'modules':
							$str = $list['module_name'];
							break;
						case 'permissions':
							$str = $list['function_name'];
							break;
						case 'areas':
							$str = $list['area_code'].' - '.$list['area_name'];
							break;
						case 'departments':
							$str = $list['department_name'];
							break;
						case 'academic_programs':
							$str = $list['program_name'];
							break;
						case 'document_types':
							$str = $list['document_type_code'].' - '.$list['document_type_name'];
							break;
						case 'accreditation_levels':
							$str = $list['accreditation_level'];
							break;
						default:
							break;
					}
					break;
				}
			}
		}
		return $str;
	}
}

if (! function_exists('getIcon'))
{
	function getIcon($id = 0, $lists = [], $isPermalink = true)
	{
		if(!empty($lists))
		{
			foreach($lists as $list)
			{
				if($list['id'] == $id)
				{
					if($isPermalink)
					{
						return $list['link_icon'];
					}
					else
					{
						return $list['module_icon'];
					}
					break;
				}
			}
		}
		// die($str);

		return $str;
	}
}

if (! function_exists('role_name'))
{
	function role_name($id = 0, $lists = [])
	{
		$str = "";
		if(!empty($lists))
		{
			foreach($lists as $list)
			{
				if($list['id'] == $id)
				{
					$str = $list['role_name'];
					break;
				}
			}
		}
		// die($str);

		return $str;
	}
}
