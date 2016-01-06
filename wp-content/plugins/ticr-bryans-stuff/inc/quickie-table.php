<?php


add_shortcode('ticr-qt', 'ticr_quickie_table');

function ticr_quickie_table()
{
	$qt_data = ticr_quickie_table_data();
	
	$output .= '
		<style>
			.content .ticr-qt { margin:30px 0; }
			.content .ticr-qt td { vertical-align:top; line-height:1.2; }
			.content .ticr-qt a { text-decoration:none; font-weight:normal; }
			.content .ticr-qt a:hover { text-decoration:underline; } 
			.content .ticr-qt .row-2 > td { border-top:none; }
			
			.content .ticr-qt tr.compact { display:none; }
			
			@media screen and (max-width:420px)
			{
				.content .ticr-qt tr.large { display:none; }
				.content .ticr-qt tr.compact { display:table-row; }
			}
		</style>
	';
	$output .= '<table class="ticr-qt">';
	$output .= '<thead>';
	$output .= '<tr class="large"><td>Start</td><td>End</td><td>Course Description</td><td>Cost</td></tr>';
	// COMAPCT HEADER
	$output .= '<tr class="compact"><td colspan="3">Course Description</td><td>Cost</td></tr>';

	$output .= '</thead>';
	$output .= '<tbody>';
	
	if(is_array($qt_data)) { foreach($qt_data as $data)
	{
		if(isset($data['start']) && strtotime($data['start']) > time()-3600*24*4)
		{
			if($data['info_link']) 
				{ $course_desc = '<a href="'.$data['info_link'].'" title="Click here for more information about '.$data['course_num'].'" target="_blank">'.$data['desc'].'</a>'; }
			else { $course_desc = $data['desc']; }
			
			if($data['reg_link'])
				{ $reg = '<a class="register '.$data['course_num'].'" href="'.$data['reg_link'].'" title="Click here to Register for '.$data['course_num'].' ">Register</a>'; }
			else { $reg = '&nbsp'; }
			
			// Large Table
			$output .= '<tr class="large row-1"><td>'.$data['start'].'</td><td>'.$data['end'].'</td><td class="description">'.$data['course_num'].' | '.$course_desc.'</td><td>'.$data['price'].'</td></td></tr>';
			$output .= '<tr class="large row-2"><td colspan="2">&nbsp</td><td>'.$data['location'].'</td><td>'.$reg.'</td></tr>';
			
			// Compact Table
			$output .= '<tr class="compact row-1"><td class="description" colspan="3">'.$data['course_num'].' | '.$course_desc.'</td><td>'.$data['price'].'</td></td></tr>';
			$output .= '<tr class="compact row-2"><td colspan="2">'.$data['start'].'-'.$data['end'].'</td><td>'.$data['location'].'</td><td>'.$reg.'</td></tr>';
		}
	} }
	$output .= '</tbody>';
	$output .= '</table>';
	
	return $output;
}

function ticr_quickie_table_data()
{
	$qt_data = array(
	array(
		'start' => '01/05/2016',
		'end' => '01/08/2016',
		'course_num' => 'CCV204',
		'desc' => 'FactoryTalk View ME and Panelview Plus Programming',
		'location' => 'Rockwell Automation - Richmond, VA',
		'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0048:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCV204-training-description.pdf',
		),
	array(
		'start' => '01/19/2016',
		'end' => '01/20/2016',
		'course_num' => 'CCA182',
		'desc' => 'PowerFlex 750-Series Configuration and Startup',
		'location' => 'Rockwell Automation - Richmond, VA',
		'price' => '$1,280.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0049:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCA182-course-description.pdf',
		),
	array(
		'start'	=> '01/19/2016',
		'end' => '01/20/2016',	
		'course_num' => 'CCA183',	
		'desc' => 'PowerFlex 750-Series Maintenance and Troubleshooting',
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$1,280.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/004a:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCA183-course-description.pdf'
		),
	array( 
		'start' => '01/19/2016',	
		'end' => '01/22/2016',	
		'course_num' => 'CCP153',	
		'desc' => 'Studio 5000 Logix Designer Level 2: Controllogix Maintenance and Troubleshooting',	
		'location' => 'Electrical Equipment Company - Lynchburg, VA',	 
		'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/004b:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP153-course-description.pdf',
		),
	array( 
		'start' => '02/01/2016',	
		'end' => '02/05/2016',	
		'course_num' => 'IMINS2',	
		'desc' => 'Managing Industrial Networks and Manufacturing with Cisco Technologies',	
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$3,375.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/004e:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-IMINS2-course-description.pdf',
		),
	array( 
		'start' => '02/09/2016',	
		'end' => '02/12/2016',	
		'course_num' => 'CCN144',	
		'desc' => 'Studio 5000 Logix Designer Level 4: Kinetix 6500 (CIP) Programming',	
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/004f:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCN144-course-description.pdf',
		),
	array( 
		'start' => '02/15/2016',	
		'end' => '02/19/2016',	
		'course_num' => 'IMINS',	
		'desc' => 'Managing Industrial Networks and Cisco Networking Technologies',
		'location' => 'Electrical Equipment Company - Richmond, VA',	 
		'price' => '$3,375.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0050:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-IMINS-course-description.pdf',
		),
	array(
		'start' => '02/23/2016',	
		'end' => '02/24/2016',	
		'course_num' => 'CCA182',	
		'desc' => 'PowerFlex 750-Series Configuration and Startup',	
		'location' => 'Electrical Equipment Company - Lynchburg, VA',	 
		'price' => '$1,280.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0051:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCA182-course-description.pdf',
		),
	array( 
		'start' => '02/25/2016',	
		'end' => '02/26/2016',	
		'course_num' => 'CCA183',	
		'desc' => 'PowerFlex 750-Series Maintenance and Troubleshooting',			'location' => 'Electrical Equipment Company - Lynchburg, VA',	 
		'price' => '$1,280.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0052:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCA183-course-description.pdf',
		),
	array(
		'start' => '02/29/2016',	
		'end' => '03/04/2016',	
		'course_num' => 'IMINS',	
		'desc' => 'Managing Industrial Networks and Cisco Networking Technologies',	
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$3,375.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0053:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-IMINS-course-description.pdf',
		),
	array(
		'start' => '03/08/2016',	
		'end' => '03/11/2016',	
		'course_num' => 'RS-FTHSEC',	
		'desc' => 'FactoryTalk Historiam Site Edition Confirguration and Data Collection',	
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$2,150.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0054:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-RS-FTHSEC-course-description.pdf',
		),
	array( 
		'start' => '03/15/2016',	
		'end' => '03/15/2016',	
		'course_num' => 'CCP180',	
		'desc' => 'EtherNet/IP Fundamentals and Troubleshooting (Prereq CCP 146)',		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$860.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0055:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP180-course-description.pdf',
		),
	array( 
		'start' => '03/16/2016',	
		'end' => '03/17/2016',	
		'course_num' => 'CCP179',	
		'desc' => 'Stratix 5700 Switch Configuration for an EtherNet/IP Network',		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$1,280.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0056:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP179-course-description.pdf',
		),
	array( 
		'start' => '03/22/2016',
		'end' => '03/25/2016',	
		'course_num' => 'CCP143',	
		'desc' => 'Studio 5000 Logix Designer Level 3: Project Development',			'location' => 'Electrical Equipment Company - Lynchburg, VA',	 
		'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0057:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP143-course-description.pdf',
		),
	array( 
		'start' => '04/12/2016',	
		'end' => '04/15/2016',	
		'course_num' => 'CCP153',	
		'desc' => 'Studio 5000 Logix Designer Level 2: Controllogix Maintenance and Troubleshooting',	
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0059:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP153-course-description.pdf',
		),
	array( 
		'start' => '05/17/2016',	
		'end' => '05/20/2016',	
		'course_num' => 'CCV204',	
		'desc' => 'FactoryTalk View ME and Panelview Plus Programming',	
		'location' => 'Electrical Equipment Company - Lynchburg, VA',	 			'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/005a:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCV204-training-description.pdf',
		),
	array(
		'start' => '06/14/2016',	
		'end' => '06/17/2016',	
		'course_num' => 'CCP143',	
		'desc' => 'Studio 5000 Logix Designer Level 3: Project Development',			'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$2,130.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/005b:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP143-course-description.pdf',
		),
	array( 
		'start' => '06/27/2016',	
		'end' => '07/01/2016',	
		'course_num' => 'IMINS',	
		'desc' => 'Managing Industrial Networks and Cisco Networking Technologies',	
		'location' => 'Rockwell Automation - Richmond, VA',	  
		'price' => '$3,375.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/005c:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-IMINS-course-description.pdf',
		),
	array( 
		'start' => '07/18/2016',	
		'end' => '07/22/2016',	
		'course_num' => 'CCP299',	
		'desc' => 'Studio 5000 Logix Designer Level 1: Controllogix Fundamentals and Troubleshooting',	
		'location' => 'Electrical Equipment Company - Lynchburg, VA',	 
		'price' => '$2,560.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/005d:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP299-course-description.pdf',
		),
	array(
		'start' => '08/15/2016',	
		'end' => '08/19/2016',	
		'course_num' => 'IMINS2',	
		'desc' => 'Managing Industrial Networks and Manufacturing with Cisco Technologies',	
		'location' => 'Rockwell Automation - Richmond, VA',	 
		'price' => '$3,375.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/005f:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-IMINS2-course-description.pdf',
		),
	array( 
		'start' => '08/16/2016',	
		'end' => '08/17/2016', 	
		'course_num' => 'CCP122',	
		'desc' => 'PLC-5/SLC 500 and RSLogix Fundamentals',	
		'location' => 'Electrical Equipment Company - Lynchburg, VA',	 
		'price' => '$1,280.00',
		'reg_link' => 'http://info.eecoonline.com/acton/form/13223/0060:d-0001/0/-/-/-/-/index.htm',
		'info_link' => 'http://www.eecoonline.com/wp-content/uploads/2015/12/Rockwell-CCP122-course-description.pdf',
		)
	);
	
	return $qt_data;
}

?>