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
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.0pt;
          mso-border-bottom-alt:solid windowtext .5pt;padding:0in 0in 1.0pt 0in">
          
          <p class="MsoNormal" style="text-align:justify;border:none;mso-border-bottom-alt:
          solid windowtext .5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><b><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">For Tested Positive or Close
          Contact</span></b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
          font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l10 level1 lfo2"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Kindly isolate or quarantine
          yourself. <o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.4pt;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l14 level1 lfo1"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><i><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Quarantine
          – period to monitor well-being after being identified as a close contact with a
          person with COVID-19.<o:p></o:p></span></i></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.4pt;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l14 level1 lfo1"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><i><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Isolation
          - separating people with symptoms or confirmed COVID-19 cases.<o:p></o:p></span></i></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l10 level1 lfo2"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">As much as possible, isolate yourself from other
          people at your home</span><i><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></i></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l10 level1 lfo2"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">If you need to interact with other people or you
          need to go outside, wear face mask and practice one meter physical distancing</span><i><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></i></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l10 level1 lfo2"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">Remind your family members to always wear face mask
          if they have to interact with you</span><i><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></i></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l10 level1 lfo2"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">Cover your mouth and nose using tissue when you
          cough or sneeze and wash your hands afterwards</span><i><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif"><o:p></o:p></span></i></p>
          
          <p class="MsoListParagraphCxSpLast" style="text-align:justify;text-indent:-.25in;
          mso-list:l10 level1 lfo2"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">Do not let others use your personal belongings such
          as towels, bed sheets, plates, and utensils</span><b style="font-size: 1rem;"><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-language:EN-PH">&nbsp;</span></b></p>
          
          <div style="border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0in 0in 1pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
          
          <p class="MsoNormal" style="text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none; padding: 0in;"><b><span lang="EN-PH" style="font-size:12.0pt;
          font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          color:black;mso-color-alt:windowtext;mso-fareast-language:EN-PH">If you have fever,
          you may do the following</span></b><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          </div>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Check temperature every four (4) hours; You may drink paracetamol if
          your temperature reaches above 37.5 degree Celsius, every four (4) hours.</span><b><span lang="EN-PH" style="font-size:12.0pt;
          font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Take a bath daily if you can and if possible</span><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Ensure good ventilation and airflow in your room</span><b><span lang="EN-PH" style="font-size:12.0pt;
          font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Do not wear more layers of clothes</span><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpLast" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Drink a lot of water, fresh fruit juices, and mild tea</span></p>
          
          <div style="border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0in 0in 1pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
          
          <p class="MsoNormal" style="text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none; padding: 0in;"><b><span lang="EN-PH" style="font-size:12.0pt;
          font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          color:black;mso-color-alt:windowtext;mso-fareast-language:EN-PH">If you have
          cough or sore throat, you do the following:</span></b><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          </div>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Make sure to drink your prescribed medicines</span><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Drink a lot of water</span><b><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;mso-fareast-language:EN-PH"><o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpLast" style="text-align: justify; text-indent: -0.25in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;;mso-fareast-language:EN-PH">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:
          &quot;Times New Roman&quot;;color:black;mso-color-alt:windowtext;mso-fareast-language:
          EN-PH">Keep away from those that can heighten your symptoms such as dust,
          pollen, perfume, and animal fur</span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.0pt;
          mso-border-bottom-alt:solid windowtext .5pt;padding:0in 0in 1.0pt 0in">
          
          <p class="MsoNormal" style="text-align:justify;border:none;mso-border-bottom-alt:
          solid windowtext .5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><b><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Been in a place with high
          number of Covid-19.<o:p></o:p></span></b></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Get
          tested. Tell your Barangay Health Emergency Response Team (BHERTS) that you’ve
          been in a place with high case, and you’re possible to be a close contact. This
          is to inform your next steps:<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l6 level1 lfo5"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">COVID-19 Testing</span><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpLast" style="text-align:justify;text-indent:-.25in;
          mso-list:l6 level1 lfo5"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Courier New&quot;;mso-fareast-font-family:
          &quot;Courier New&quot;">o<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
          mso-fareast-language:EN-PH">Referral to the Temporary Treatment and Monitoring
          Facility (TTMF) or hospital (if needed)</span><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif"><o:p></o:p></span></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in">
          
          <p class="MsoNormal" style="text-align:justify;border:none;mso-border-bottom-alt:
          solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><b><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">FAQ’S ABOUT COVID-19 <o:p></o:p></span></b></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">HOW CAN I PROTECT MYSELF FROM COVID 19?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l0 level1 lfo6"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Wear face mask and face shield<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l0 level1 lfo6"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Sanitize your hands<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l0 level1 lfo6"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Practice one-meter physical
          distancing and limit physical interaction<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l0 level1 lfo6;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Ensure good indoor ventilation
          and air flow.<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHO ARE CONSIDERED AS CLOSE CONTACTS IN THE CONTEXT OF
          COVID-19?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l12 level1 lfo7"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Interacted with a person with
          COVID-19 within one meter for more than 15 minutes<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l12 level1 lfo7"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Had direct physical
          interaction with probable or confirmed COVID-19 case<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l12 level1 lfo7;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Had interaction with a person
          with COVID-19 without wearing protective equipment<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHAT SHOULD I DO IF I AM A CLOSE CONTACT?<o:p></o:p></span></b></p>
          
          <p class="MsoNormal" style="margin-left:.5in;text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Get
          tested if you are a close contact. Tell your Barangay Health Emergency Response
          Team (BHERT) that you are a close contact. This is to inform your next steps:<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l5 level1 lfo8"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">COVID-19 Testing<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l5 level1 lfo8;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Referral to the Temporary
          Treatment and Monitoring Facility (TTMF) or hospital (if needed)<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHAT TESTS WILL BE USED?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l4 level1 lfo9"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">RT-PCR (gold standard)<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l4 level1 lfo9;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Antigen (for those specified
          places with rising cases of COVID-19, wherein RT-PCR tests are lacking)<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHAT IS THE DIFFERENCE BETWEEN QUARANTINE AND ISOLATION?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l9 level1 lfo10"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Quarantine - period to monitor
          well-being after being identified as a close contact with a person with
          COVID-19<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l9 level1 lfo10;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Isolation - separating people
          with symptoms or confirmed COVID-19 cases<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">I HAVE TO ISOLATE MYSELF, WHAT SHOULD I DO?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l11 level1 lfo11"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Continue wearing your face
          mask to prevent the spread of any virus/disease<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l11 level1 lfo11"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Disinfect all objects and
          surfaces that are frequently touched<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l11 level1 lfo11;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Practice physical distance and
          stay in your room<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">HOW IS THE HOME QUARANTINE OR ISOLATION BEING DONE?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l17 level1 lfo12"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:Arial">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If
          you have severe or critical symptoms, you will be referred to a hospital<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l17 level1 lfo12"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;
          mso-fareast-font-family:Arial">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If
          you are asymptomatic or with mild/moderate symptoms, you may isolate yourself
          at your home or you may go to a Temporary Treatment and Monitoring Facility
          (TTMF)<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">You
          may only isolate yourself at home if:<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:1.0in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">You have a separate room with
          other members of the family<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:1.0in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">You have a separate
          bathroom/comfort room in your room<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:1.0in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">You are not living with people
          who belong to the vulnerable population<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:1.0in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If you are allowed to isolate
          at home, make sure to:<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:1.0in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Practice one meter physical
          distancing, wear face mask, and sanitize your hands every time you interact
          with your family member/s<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:1.0in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Eat right and drink medicines
          prescribed by your doctor<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.75in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l13 level1 lfo13;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Disinfect properly your
          things, wash hands before and after you use them<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHAT SHOULD I REMEMBER IF I AM DOING HOME
          QUARANTINE/ISOLATION?<o:p></o:p></span></b></p>
          
          <p class="MsoNormal" style="text-align:justify;text-indent:.5in"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Ensure
          to not spread COVID-19 to others!<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l1 level1 lfo14"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">As much as possible, isolate
          yourself from other people at your home<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l1 level1 lfo14"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If you need to interact with
          other people or you need to go outside, wear face mask and practice one meter
          physical distancing<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l1 level1 lfo14"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Remind your carers or family
          members to always wear face mask if they have to interact with you<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l1 level1 lfo14"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Cover your mouth and nose
          using tissue when you cough or sneeze and wash your hands afterwards<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l1 level1 lfo14;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Do not let others use your
          personal belongings such as towels, bed sheets, plates, and utensils<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">I WANT TO QUARANTINE/ISOLATE IN A TEMPORARY TREATMENT AND
          MONITORING FACILITY (TTMF), WHAT SHOULD I DO?<o:p></o:p></span></b></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraph" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l7 level1 lfo15;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If you choose to go to a TTMF,
          contact your Barangay Health Emergency Response Team (BHERT) for your referral.<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">HOW WILL THE HOME MANAGEMENT OF MILD OR MODERATE SYMPTOMS
          BE DONE?<o:p></o:p></span></b></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If you
          have fever, you may do the following:<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l7 level1 lfo15"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Check temperature every four
          (4) hours; You may drink paracetamol if your temperature reaches above 37.5
          degree celsius, every four (4) hours.<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l7 level1 lfo15"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Take a bath daily if you can
          and if possible<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l7 level1 lfo15"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Ensure good ventilation and
          airflow in your room<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l7 level1 lfo15"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Do not wear more layers of
          clothes<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpLast" style="text-align:justify;text-indent:-.25in;
          mso-list:l7 level1 lfo15"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Drink a lot of water, fresh
          fruit juices, and mild teas<o:p></o:p></span></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If you
          have cough or sore throat, you do the following:<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l16 level1 lfo16"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Make sure to drink your
          prescribed medicines<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l16 level1 lfo16"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Drink a lot of water<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l16 level1 lfo16;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Keep away from those that can
          heighten your symptoms such as dust, pollen, perfume, and animal fur<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHAT ARE THE SYMPTOMS THAT YOU NEED TO WATCH OUT FOR?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Difficulty in breathing, even
          when sitting<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Cough, fever, and difficulty
          in breathing<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Severe coughing<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Confusion or sudden change in
          mental well-being<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Pain in the chest<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Low oxygen level<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Excessive sleepiness or cannot
          be woken up<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l18 level1 lfo17"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Bluish or darkened face or
          lips<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l18 level1 lfo17;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">If you are experiencing other
          severe symptoms, call your BHERT immediately.<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span><span style="font-family: Arial, sans-serif; font-size: 12pt;">&nbsp;</span></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">DO I
          NEED TO FINISH MY 14-DAY QUARANTINE IF I AM A CLOSE CONTACT THAT TESTED
          NEGATIVE FOR COVID-19?<o:p></o:p></span></p>
          
          <p class="MsoListParagraph" style="margin-left:.75in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l19 level1 lfo18"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Yes. You need to finish your
          14-day quarantine and finish it without developing any symptoms.<o:p></o:p></span></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">ASYMPTOMATIC<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="margin-left:.75in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l19 level1 lfo18"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Isolation period: At least ten
          (10) days, from the day you received your positive result<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l19 level1 lfo18"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Where to isolate: Home or in a
          Temporary Treatment and Monitoring Facility (TTMF)<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l19 level1 lfo18"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Clearance: If you remain not
          having any symptoms within ten (10) days from the day you got tested<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.75in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l19 level1 lfo18"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Do you need to get re-tested?
          No</span></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">MILD<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="margin-left:.75in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l15 level1 lfo19"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Isolation period: At least ten
          (10) days, from the day you received your positive result<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l15 level1 lfo19"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Where to isolate: Home or in a
          Temporary Treatment and Monitoring Facility (TTMF)<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l15 level1 lfo19"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Clearance: If you remain not
          having any symptoms and are clinically recovered in the past three (3) days<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
          auto;text-align:justify;text-indent:-.25in;mso-list:l15 level1 lfo19"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Do you need to get re-tested?
          No<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.75in;mso-add-space:auto;
          text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;
          font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">MODERATE,
          SEVERE O CRITICAL<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l8 level1 lfo20"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Isolation period: At least
          twenty one (21) days, from the first day you experience any symptoms<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l8 level1 lfo20"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Where to isolate: Hospital<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l8 level1 lfo20"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Clearance: If you remain not
          having any symptoms and are clinically recovered in the past three (3) days<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l8 level1 lfo20"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Do you need to get re-tested?
          No<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.5in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:0in;mso-add-space:auto;
          text-align:justify;border:none;mso-border-bottom-alt:solid windowtext 1.5pt;
          padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">*home
          isolation/quarantine may only be done if you have your own room and
          bathroom/comfort room, and you do not live with a family member who belong to
          the vulnerable group<o:p></o:p></span></p>
          
          </div>
          
          <p class="MsoNormal" style="text-align:justify"><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
          
          <p class="MsoNormal" style="text-align:justify"><b><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:
          &quot;Arial&quot;,sans-serif">WHAT ARE THE WAYS TO MAINTAIN A STRONG PHYSICAL AND MENTAL
          WELL-BEING?<o:p></o:p></span></b></p>
          
          <p class="MsoListParagraphCxSpFirst" style="text-align:justify;text-indent:-.25in;
          mso-list:l3 level1 lfo21"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Eat nutritious food such as
          fruits, vegetables, fish, and meat<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l3 level1 lfo21"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Exercise inside for 30 minutes
          per day<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l3 level1 lfo21"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Ensure to have enough sleep<o:p></o:p></span></p>
          
          <p class="MsoListParagraphCxSpMiddle" style="text-align:justify;text-indent:-.25in;
          mso-list:l3 level1 lfo21"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
          Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Practice self-care. Simple
          relaxing and talking with your loved ones is a form of self-care.<o:p></o:p></span></p>
          
          <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.5pt;
          padding:0in 0in 1.0pt 0in;margin-left:.25in;margin-right:0in">
          
          <p class="MsoListParagraphCxSpLast" style="margin-left:.25in;mso-add-space:auto;
          text-align:justify;text-indent:-.25in;mso-list:l3 level1 lfo21;border:none;
          mso-border-bottom-alt:solid windowtext 1.5pt;padding:0in;mso-padding-alt:0in 0in 1.0pt 0in"><!--[if !supportLists]--><span lang="EN-PH" style="font-size:12.0pt;line-height:107%;font-family:Symbol;
          mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol">·<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </span></span><!--[endif]--><span lang="EN-PH" style="font-size:12.0pt;
          line-height:107%;font-family:&quot;Arial&quot;,sans-serif">Talk and check on with your
          loved ones.<o:p></o:p></span></p>
          
          </div>
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
