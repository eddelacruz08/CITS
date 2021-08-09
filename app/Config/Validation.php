<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];
    public $scan = [
        'identifier' => [
            'label'  => 'ID',
            'rules'  => 'required',
        ],
    ];
    public $role = [
        'role_name' => [
            'label'  => 'Role Name',
            'rules'  => 'required',
        ],
        'description' => [
            'label'  => 'Role Description',
            'rules'  => 'required',
        ],
        'function_id' => [
            'label'  => 'Landing Page',
            'rules'  => 'required',
        ],
    ];
	public $user = [
        'lastname' => [
            'label'  => 'Lastname',
            'rules'  => 'required',
        ],
		'middlename' => [
			'label'  => 'Middle Name',
			'rules'  => 'required',
		],
        'firstname' => [
            'label'  => 'Firstname',
            'rules'  => 'required',
        ],
        'username' => [
            'label'  => 'Username',
            'rules'  => 'required|alpha_numeric|is_unique[users.username]|min_length[8]',
        ],
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email|is_unique[users.email]',
        ],
        'password' => [
            'label'  => 'Password',
            'rules'  => 'required|min_length[7]',
        ],
        'password_retype' => [
            'label'  => 'Password Retype',
            'rules'  => 'required|matches[password]',
        ],
        'birthdate' => [
            'label'  => 'Birthdate',
            'rules'  => 'required',
        ],
		'gender_id' => [
			'label'  => 'Gender',
			'rules'  => 'required',
		],
		'user_type_id' => [
			'label'  => 'Guest Type',
			'rules'  => 'required',
		],
		'cellphone_no' => [
			'label'  => 'Contact No.',
			'rules'  => 'required|numeric|regex_match[((^(\+)(\d){12}$)|(^\d{11}$))]|is_unique[users.cellphone_no]',
		],
		'address' => [
			'label'  => 'Address',
			'rules'  => 'required',
		],
		'city_id' => [
			'label'  => 'City',
			'rules'  => 'required',
		],
				'province_id' => [
			'label'  => 'Province',
			'rules'  => 'required',
		],
		'postal' => [
			'label'  => 'Postal',
			'rules'  => 'required',
		],
    ];
	public $email = [
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email',
        ],
    ];
    public $user_edit = [
        'lastname' => [
            'label'  => 'Lastname',
            'rules'  => 'required',
        ],
        'firstname' => [
            'label'  => 'Firstname',
            'rules'  => 'required',
        ],
        'username' => [
            'label'  => 'Username',
            'rules'  => 'required',
        ],
        'email' => [
            'label'  => 'Email',
            'rules'  => 'required|valid_email',
        ],
        'password_retype' => [
            'label'  => 'Password Retype',
            'rules'  => 'matches[password]',
        ],
        'role_id' => [
            'label'  => 'Role',
            'rules'  => 'required',
        ],
    ];
	public $checklists = [
		'q_one' => [
			'label'  => 'Question One',
			'rules'  => 'required',
		],
		'q_two' => [
			'label'  => 'Question Two',
			'rules'  => 'required',
		],
		'q_three' => [
			'label'  => 'Question Three',
			'rules'  => 'required',
		],
		'q_four' => [
			'label'  => 'Question Four',
			'rules'  => 'required',
		],
		'q_five' => [
			'label'  => 'Question Five',
			'rules'  => 'required',
		],
	];
	public $requestChecklist = [
		'email' => [
			'label'  => 'Email',
			'rules'  => 'required',
		],
		'form_id' => [
			'label'  => 'Form',
			'rules'  => 'required',
		],
		'r_q_one' => [
			'label'  => 'Question One',
			'rules'  => 'required',
		],
		'r_q_two' => [
			'label'  => 'Question Two',
			'rules'  => 'required',
		],
		'r_q_three' => [
			'label'  => 'Question Three',
			'rules'  => 'required',
		],
		'r_q_four' => [
			'label'  => 'Question Four',
			'rules'  => 'required',
		],
		'r_q_five' => [
			'label'  => 'Question Five',
			'rules'  => 'required',
		],
	];
	public $requestHealthForm = [
		'email' => [
			'label'  => 'Email',
			'rules'  => 'required',
		],
		'q_one' => [
			'label'  => 'Question One',
			'rules'  => 'required',
		],
		'q_two' => [
			'label'  => 'Question Two',
			'rules'  => 'required',
		],
		'q_three' => [
			'label'  => 'Question Three',
			'rules'  => 'required',
		],
		'q_four' => [
			'label'  => 'Question Four',
			'rules'  => 'required',
		],
		'q_five' => [
			'label'  => 'Question Five',
			'rules'  => 'required',
		],
	];
	public $reason = [
		'reason' => [
		 	'label'  => 'Reason',
		 	'rules'  => 'required',
		],
		'status' => [
		 	'label'  => 'Department Status',
		 	'rules'  => 'required',
		],
	];
	public $gender = [
		'gender' => [
		 	'label'  => 'Gender',
		 	'rules'  => 'required',
		],
		'status' => [
			'label'  => 'Gender Status',
			'rules'  => 'required',
		],
	];
	public $extension = [
		'extension' => [
		 	'label'  => 'Extension',
		 	'rules'  => 'required',
		],
		'status' => [
		 	'label'  => 'Extension Status',
			'rules'  => 'required',
		],
	];
	public $city = [
		'city' => [
		 	'label'  => 'City',
		 	'rules'  => 'required',
		],
		'status' => [
		 	'label'  => 'City Status',
		 	'rules'  => 'required',
		],
	];
	public $province = [
		'province' => [
			'label'  => 'Province',
			'rules'  => 'required',
		],
		'status' => [
			'label'  => 'Province Status',
			'rules'  => 'required',
		],
	];
	public $types = [
		'guest_type' => [
			'label'  => 'Guest Type',
			'rules'  => 'required',
		],
		'status' => [
		 	'label'  => 'Guest Type Status',
		 	'rules'  => 'required',
		],
	];
	public $guidelines = [
		'content' => [
			'label'  => 'Guidelines',
			'rules'  => 'required',
		],
	];
	public $questions = [
		'q_one' => [
		 	'label'  => 'Question One',
		 	'rules'  => 'required',
		],
		'q_two' => [
		 	'label'  => 'Question Two',
		 	'rules'  => 'required',
		],
		'q_three' => [
		 	'label'  => 'Question Three',
		 	'rules'  => 'required',
		],
		'q_four' => [
		 	'label'  => 'Question Four',
		 	'rules'  => 'required',
		],
		'q_five' => [
		 	'label'  => 'Question Five',
		 	'rules'  => 'required',
		],
	];
	public $guests = [
		'date' => [
			'label'  => 'Date',
			'rules'  => 'required',
		],
		'user_type' => [
		 	'label'  => 'Patient Status',
		 	'rules'  => 'required',
		],
		'gender' => [
			'label'  => 'Patient Status',
		 	'rules'  => 'required',
		],
	];
	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
