<?php namespace App\Database\Migrations;

class CreateGuidelines extends \CodeIgniter\Database\Migration {

    private $table = 'guidelines';

    public function up()
    {
      $this->forge->addField([
        'id' => [
          'type'  => 'BIGINT',
          'constraint'  => 5,
          'unsigned'  => TRUE,
          'auto_increment' => TRUE
        ],
        'user_id' => [
          'type' => 'BIGINT',
          'comment' => 'The user who created the information'
        ],
        'content' => [
          'type' => 'TEXT',
        ],
        'status' => [
          'type' => 'CHAR',
          'constraint' => '1',
        ],
        'created_date' => [
          'type' => 'DATETIME',
          'comment' => 'Date of creation',
        ],
        'updated_date' => [
          'type' => 'DATETIME',
          'null' => true,
          'default' => null,
          'comment' => 'Date last updated',
        ],
        'deleted_date' => [
          'type' => 'DATETIME',
          'null' => true,
          'default' => null,
          'comment' => 'Date of soft deletion',
        ]
      ]);

      $this->forge->addKey('id', TRUE);
      $this->forge->createTable($this->table);

      $data = [
        [
          'user_id' => '0',
          'content' => '
            <table class="table table-bordered"><tbody><tr><td><div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.0pt;
            mso-border-bottom-alt:solid windowtext .5pt;padding:0in 0in 1.0pt 0in">
            
            <p class="MsoNormal" style="border:none;mso-border-bottom-alt:solid windowtext .5pt;
            padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
            &quot;Arial&quot;,sans-serif">How to treat a fever at home<o:p></o:p></span></b></p>
            
            </div></td></tr><tr><td><p class="MsoNormal"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
            font-family:&quot;Arial&quot;,sans-serif">Care for a fever depends on its severity. <b>A low-grade fever with no other symptoms</b>
            doesn’t typically require medical treatment. Drinking fluids and resting are
            usually enough to fight off a fever.<o:p></o:p></span></p></td></tr><tr><td><p class="MsoNormal"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
            font-family:&quot;Arial&quot;,sans-serif">When a fever is accompanied by mild symptoms,
            such as general discomfort or dehydration, it can be helpful to treat elevated
            body temperature by:</span></p><ul><li><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
            font-family:&quot;Arial&quot;,sans-serif">M</span><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">aking sure the room
            temperature where the person is resting is comfortable.</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">T</span><span style="background-color: transparent; color: inherit; font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in;">aking a regular bath or
            sponge bath using lukewarm water</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Taking paracetamol or
            ibuprofen (Advil)</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Drinking plenty of fluids.</span></li></ul><p class="MsoNormal"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
            font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></p></td></tr><tr><td><p class="MsoNormal"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">When
            to see a doctor about a fever<o:p></o:p></span></b></p></td></tr><tr><td><p class="MsoNormal"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
            font-family:&quot;Arial&quot;,sans-serif">Fever can be a symptom of a serious medical
            condition that requires prompt treatment.</span></p><ul><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Have a body temperature
            exceeding 39.4</span><sup style="font-family: Arial, sans-serif; text-indent: -0.25in; background-color: transparent; color: inherit;">0</sup><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">C</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Have has a fever for more than
            three days</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Have a serious medical illness
            or a compromised immune system</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Have recently been in a
            developing country.</span></li><li><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Arial, sans-serif;">A severe headache</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Throat swelling</span></li><li><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Symbol;"><span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Arial, sans-serif;">A skin rash, especially if the
            rash gets worse</span></li><li><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Symbol;"><span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Arial, sans-serif;">Sensitivity to bright light</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">A stiff neck and neck pain</span></li><li><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Arial, sans-serif;">Persistent vomiting</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Listlessness or&nbsp; irritability</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Abdominal pain</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Pain when urinating</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Muscle weakness</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; text-indent: -0.25in; background-color: transparent; color: inherit;">Trouble breathing or chest
            pain</span></li><li><span lang="EN-PH" style="text-indent: -0.25in; background-color: transparent; color: inherit; font-size: 12pt; line-height: 107%; font-family: Arial, sans-serif;">Confusion</span></li></ul></td></tr><tr><td><div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.0pt;
            mso-border-bottom-alt:solid windowtext .5pt;padding:0in 0in 1.0pt 0in">
            
            <p class="MsoNormal" style="border:none;mso-border-bottom-alt:solid windowtext .5pt;
            padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
            &quot;Arial&quot;,sans-serif">For Tested Positive or Close Contact</span></b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></p>
            
            </div></td></tr><tr><td><ul><li><span lang="EN-PH" style="font-size:12.0pt;line-height:
            107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:
            minor-latin;mso-ansi-language:EN-PH;mso-fareast-language:EN-US;mso-bidi-language:
            AR-SA">Kindly isolate or quarantine yourself</span></li></ul><p><i style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;"><span lang="EN-PH" style="font-size: 12pt; line-height: 107%;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Quarantine – period
            to monitor well-being after being identified as a close&nbsp;</span></i><i style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;"><span lang="EN-PH" style="font-size: 12pt; line-height: 107%;">contact with a person
            with COVID-19.</span></i></p><p><i><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;
            mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:
            EN-PH;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Isolation - separating
            people with symptoms or confirmed COVID-19 cases</span></i></p><ul><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">As much as possible, isolate
            yourself from other people at your home</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">If you need to interact with
            other people or you need to go outside, wear face mask and practice one meter
            physical distancing</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">Remind your family members to
            always wear face mask if they have to interact with you</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">Cover your mouth and nose using
            tissue when you cough or sneeze and wash your hands afterwards</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">Do not let others use your
            personal belongings such as towels, bed sheets, plates, and utensils</span></li></ul></td></tr><tr><td><div style="border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0in 0in 1pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
            
            <p class="MsoNormal" style="line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none; padding: 0in;"><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
            mso-fareast-font-family:&quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;
            mso-fareast-language:EN-PH">If you have fever, you may do the following</span></b><b><span lang="EN-PH" style="font-size:12.0pt;
            font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
            
            </div></td></tr><tr><td><ul><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
            &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
            EN-PH">Check temperature every four (4) hours; You may drink paracetamol if
            your temperature reaches above 37.5 degree celsius, every four (4) hours.</span></li><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="background-color: transparent; color: black; font-family: Arial, sans-serif; font-size: 12pt;">Take a bath daily if you can and if possible</span></li><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="color: black; font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent;">Ensure good ventilation and airflow in your room</span></li><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="color: black; font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent;">Do not wear more layers of clothes</span></li><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="color: black; font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent;">Drink a lot of water, fresh fruit juices, and mild tea</span></li></ul></td></tr><tr><td><div style="border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0in 0in 1pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
            
            <p class="MsoNormal" style="line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none; padding: 0in;"><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
            mso-fareast-font-family:&quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;
            mso-fareast-language:EN-PH">If you have cough or sore throat, you do the
            following:</span></b><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
            &quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
            
            </div></td></tr><tr><td><ul><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
            &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
            EN-PH">Make sure to drink your prescribed medicines</span></li><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="color: black; font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent;">Drink a lot of water</span></li><li style="margin-left: 0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Keep away from those that can heighten your
            symptoms such as dust, pollen, perfume, and animal fur</li></ul></td></tr><tr><td><div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.0pt;
            mso-border-bottom-alt:solid windowtext .5pt;padding:0in 0in 1.0pt 0in">
            
            <p class="MsoNormal" style="border:none;mso-border-bottom-alt:solid windowtext .5pt;
            padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
            &quot;Arial&quot;,sans-serif">Been in a place with high number of Covid-19.<o:p></o:p></span></b></p>
            
            </div></td></tr><tr><td><p class="MsoNormal"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
            font-family:&quot;Arial&quot;,sans-serif">Get tested. Tell your Barangay Health Emergency
            Response Team (BHERTS) that you’ve been in a place with high case, and you’re
            possible to be a close contact. This is to inform your next steps:</span></p><ul><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">COVID-19 Testing</span></li><li><span style="font-family: Arial, sans-serif; font-size: 12pt; background-color: transparent; color: inherit;">Referral to the Temporary
            Treatment and Monitoring Facility (TTMF) or hospital (if needed)</span></li></ul></td></tr></tbody></table>
          ',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
      ];

      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $builder->insertBatch($data);
    }

    public function down()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $db->simpleQuery('DELETE FROM '.$this->table);
      $this->forge->dropTable($this->table);
    }
}
