<?php
// PHP code support for the Storeroom Self Evaluation program
//
// Includes Gravity Forms hooks and pdf save and generation

// SET HIDDEN KEY VALUE
add_filter( 'gform_field_value_key', 'ticr_gf_key_value' );
function ticr_gf_key_value( $value ) {
    return sha1(time());
}

// AFTER FORM SUBMISSION
add_action('gform_after_submission_11', 'ticr_gf_self_eval_post_submission', 10, 2);
function ticr_gf_self_eval_post_submission($entry, $form)
{
	// SUBMIT TO ACT-ON (TESTED AND WORKING)
	ticr_acton_gf11_submit($entry);
	
	// BUILD REPORT
	create_ticr_self_eval_pdf($entry, $form);
	
	
	//echo 'TEST01: <pre>'.print_r($entry).'</pre><pre>'.print_r($form,true).'</pre><hr />';
}

function ticr_acton_gf11_submit($gf_entry)
{
	// GENERATE THIS IN THE ACT-ON CONTENT/FORM POST URLS PANEL
	$post_url = "http://info.eecoonline.com/acton/eform/13223/0032/d-ext-0001";
	
	// declare new ActonWordPressConnection object
	$ao_gf1 = new ActonWordPressConnection;
	
	$ao_gf1->setPostItems("First Name", $gf_entry['1.3']);
	$ao_gf1->setPostItems("Last Name", $gf_entry['1.6']);
	$ao_gf1->setPostItems("E-mail Address", $gf_entry['3']);
	$ao_gf1->setPostItems("Phone", $gf_entry['4']);
	$ao_gf1->setPostItems("Company Name", $gf_entry['33']);
	$ao_gf1->setPostItems("Company Address", $gf_entry['2.1']);
	$ao_gf1->setPostItems("City", $gf_entry['2.3']);
	$ao_gf1->setPostItems("State", $gf_entry['2.4']);
	$ao_gf1->setPostItems("Zip Code", $gf_entry['2.5']);
	
	// processConnection method, with your external post URL passed as the argument
	$ao_gf1->processConnection($post_url);
}

// UNLOCK DOWNLOAD
add_action('init', 'ticr_self_eval');
function ticr_self_eval()
{
	if(isset($_GET['k']) && $_GET['k']) 
	{
		 $lead_info = ticr_unlock_download($_GET['k']);
		 if($lead_info) { get_ticr_self_eval_pdf($lead_info); } 
	}
}

function ticr_unlock_download($key)
{
	if($key)
	{
		global $wpdb;
		
		$query = "SELECT `l`.* FROM `".$wpdb->prefix."rg_lead_detail` AS `d`
			LEFT JOIN `".$wpdb->prefix."rg_lead` AS `l` ON(`lead_id` = `l`.`id`)
			WHERE `d`.`form_id` = '11'
				AND `d`.`field_number` = '36'
				AND `d`.`value` = '".$key."'
			ORDER BY `l`.`date_created` DESC
			LIMIT 1";

		$results = $wpdb->get_results($query);
		$lead_info['lead'] = $results[0];
				
		$query = "SELECT * FROM `".$wpdb->prefix."rg_lead_detail`
			WHERE `form_id` = '11'
				AND `lead_id` = '".$lead_info['lead']->id."'"; 

		$results = $wpdb->get_results($query);
		foreach($results as $result) 
			{ $lead_info['details'][$result->field_number] = $result->value; }
		
		if($lead_info) { return $lead_info; }
	}
}

function get_ticr_self_eval_pdf($lead_info = NULL)
{	
	$company = preg_replace('/[^\w]/', '_', $lead_info['details']['33']);
	$name = preg_replace('/[^\w]/', '_', $lead_info['details']['1.3'].'_'.$lead_info['details']['1.6']);
	$date = strftime('%Y%m%d', strtotime($lead_info['lead']->date_created));
	
	$filename = $company.'-EECO_SELF_EVALUATION-'.$name.'-'.$date.'.pdf';
	
	$upload_dir = wp_upload_dir();
	$base_dir =  $upload_dir['basedir'].'/self-evaluation/';
	
	$full_path = $base_dir.$filename;
	
	header( 'Content-Description: File Transfer' );
	header( 'Content-Disposition: inline; filename= ' . $filename );
	header( 'Content-Type: application/pdf' );
	header( 'Content-Transfer-Encoding: binary' );
	header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
	header( 'Pragma: public' );
	header( 'Content-Length: ' . $full_path );
	header( 'Expires: 0' );	
	
	/*
	* Now clear the buffer, read the file and output it to the browser.
	*/
	ob_clean( );
	flush( );
	readfile( $full_path );
	exit;
}

function create_ticr_self_eval_pdf($entry, $form)
{	
	// CREATE DEMO EVALUATION
	if(!is_array($entry))
	{
		return false;
	} 
	
	// SET CONSTANTS
	$title = 'Electrical Storeroom Self Evaluation';
	
	// INITIALIZE PDF
	//$pdf = new FPDF('P','in','Letter');
	$pdf = new SelfEvalPDF('P','in','Letter'); // EXTENDED CLASS
	$pdf->SetMargins(.75,1.125);
	$pdf->AddPage();
	$pdf->SetFont('Arial','',9);
	
	// CREATE COVER PAGE
		// Add color bands to left
		$pdf->SetFillColor(0,84,159);	// Dark Blue
		$pdf->SetDrawColor(0,84,159);
		$pdf->Rect(0,0,.3125,11,DF);
		$pdf->SetFillColor(40,99,168);
		$pdf->SetDrawColor(40,99,168);
		$pdf->Rect(.3125,0,.25,11,DF);
		$pdf->SetFillColor(82,118,181);
		$pdf->SetDrawColor(82,118,181);
		$pdf->Rect(.5625,0,.25,11,DF);
		$pdf->SetFillColor(249,194,50);
		$pdf->SetDrawColor(249,194,50);	// GOLD
		$pdf->Rect(.8125,0,.25,11,DF);
		
		// Add logo
		$pdf->Image('http://www.eecoonline.com/wp-content/uploads/2015/05/r-logo1.png',1.5,9,1.625,0,'PNG'); 
		// Add Title
		$pdf->SetXY(4,2);
		$pdf->SetFont('','B',32);
		$text = strtoupper($title);
		$pdf->MultiCell(3,.45,$text);
		$pdf->SetX(4);
		$pdf->SetFont('','',10);
		$pdf->SetTextColor(75,75,75);
		$pdf->MultiCell(3,.375,"\n".$entry['1.3']." ".$entry['1.6']."\n".$entry['33']);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetX(4);
		$pdf->MultiCell(3,.375,"\n".strftime('%B, %Y', strtotime($entry['date_created'])));

		
	// CREATE PAGE 2 (Program Summary)
		$page_info = array(
			'title' => 'Program Summary',
			'page' => 2
		);
		$pdf->AddPage();
		
		// Add Page Title
		$pdf->SetFontSize(14);
		$pdf->SetTextColor(0,84,159);	// Dark Blue
		$text = strtoupper($page_info['title']);
		$pdf->MultiCell(7,.25,$text);
		$pdf->SetFontSize(9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		
		// Summary Table
		$pdf->SetDrawColor(0,0,0);
		$pdf->SetFontSize(9);
			// Header
			$pdf->Cell(7,.375,'Goals and Metrics',1,1);
			// First Row Header
			$pdf->Cell(1.75,.4,'Total SKUs',1,0);
			$pdf->Cell(1.75,.4,'Total electrical inventory',1,0);
			$pdf->Cell(1.75,.4,'Total Suppliers',1,0);
			$pdf->MultiCell(1.75,.2,'Estimated purchases with non-electrical distributors (%)',1,1);
			// second Row
			$pdf->Cell(1.75,.2,$entry['34'],1,0);
			$pdf->Cell(1.75,.2,$entry['30'],1,0);
			$pdf->Cell(1.75,.2,$entry['31'],1,0);
			$pdf->Cell(1.75,.2,$entry['32'],1,1);
		
		$pdf->Ln(.25); // Blank Line
			foreach($form['fields']['29']['choices'] as $choice)
			{
				$i++;
				$entry_29 .= ($entry_29 ? ', ' : '').($entry['29.'.$i] ? $entry['29.'.$i] : '');
			}
			$pdf->Cell(7,.375,'Items included in your storeroom program',1,1);
			$pdf->MultiCell(7,.2,$entry_29,1,1);
			
		$pdf->Ln(.25); // Blank Line
			$pdf->Cell(7,.375,'Currently observed goals and metrics',1,1);
			$pdf->Cell(7,.2,$entry['27'],1,1);
		$pdf->Ln(.5); // Blank Line
		
		// Immediate Opportunities
		$pdf->SetFontSize(14);
		$pdf->SetTextColor(0,84,159);	// Dark Blue
		$text = strtoupper('Immediate opportunities to act on');
		$pdf->MultiCell(7,.25,$text);
		$pdf->SetFontSize(9);
		$pdf->SetTextColor(0,0,0);
		
		// Add Bullets
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'1.',0,0,'R');
		$pdf->MultiCell(6,.2,'Conduct a storeroom assessment. Storeroom organization should be reviewed every 3 years and can typically be improved within two weeks. After 5 years, storeroom efficiency erodes significantly if organization and waste are not promptly assessed.');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'2.',0,0,'R');
		$pdf->MultiCell(6,.2,'Systems change due to requirements of demand, upgrades, new installations, and other factors. Conduct a Criticality Assessment and to define support requirements of the storeroom, and periodically update the assessment. At five years or more there can be significant change, requiring a more extensive assessment such as an Installed Base Evaluation (IBE).');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'3.',0,0,'R');
		$pdf->MultiCell(6,.2,'Many domestic power and control system components are reaching end of life. Increasing compliance requirements for issues such as arc flash often require upgrades. Critical components should be evaluated for both lifecycle and compliance driven change. The storeroom is a very efficient point of inspection for multiyear migration planning. Components not evaluated in the last five years could result in much higher replacement cost or compliance/safety concerns.');
		
		
	
	// CREATE PAGE 3 (Areas to Explore for opportunity)
		$page_info = array(
			'title' => 'Areas to explore for opportunity',
			'page' => 3
		);
		$pdf->AddPage();
		
		// Add Page Title
		$pdf->SetFontSize(14);
		$pdf->SetTextColor(0,84,159);	// Dark Blue
		$text = strtoupper($page_info['title']);
		$pdf->Cell(7,.25,$text);
		$pdf->SetFontSize(9);
		$pdf->SetTextColor(0,0,0);
		
		// Add Bullets
		$pdf->Cell(.5,.4,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'a.',0,0,'R');
		$pdf->MultiCell(6,.2,'There may be an opportunity to act in the following areas. A brief phone call with us could reveal additional potential and options you may want to consider.');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'b.',0,0,'R');
		$pdf->MultiCell(6,.2,'Incomplete labels reduce access speed and generate errors. There are multiple data points to include on labels depending on your CMMS or inventory system.');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'c.',0,0,'R');
		$pdf->MultiCell(6,.2,'Most storerooms serve high speed and often stressful environments. Higher efficiency can be achieved with low cost, simple systems that can be easily implemented.');
		
		// Add Bullets
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'d.',0,0,'R');
		$pdf->MultiCell(6,.2,'Documented processes for modification of inventoried items, replenishment parameters, and processing returns provide means for supplier management and will increase efficiency.');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'e.',0,0,'R');
		$pdf->MultiCell(6,.2,'A defined expectation to evaluate and adjust replenishment parameters is a necessary control of suppliers and will help optimize levels.');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'f.',0,0,'R');
		$pdf->MultiCell(6,.2,'Usage, suggested product, upgrades, and cost savings opportunities should be identified and reported by suppliers as part of periodic performance review.');
		
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->Cell(.5,.2,'g.',0,0,'R');
		$pdf->MultiCell(6,.2,'Suppliers of critical components should have proof of capability required to support you through emergencies.');
	
		// Related Reading
		$pdf->SetLeftMargin(3.5);
		$pdf->Ln(.5);
		$pdf->SetFillColor(196,204,230);
		$pdf->SetDrawColor(196,204,230);
		$pdf->SetLineWidth(.125);
		$pdf->Cell(.5,.2,'',0,1); // Blank Line
		$pdf->SetFontSize(14);
		$pdf->SetTextColor(0,84,159);	// Dark Blue
		$pdf->Cell(3.75,.375,'RELATED READING:','TRL',1,'L',1);
		$pdf->SetFontSize(9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(.125,.2,$pdf->Bullet(),'L',0,'L',1);
		$pdf->SetFont('','U');
		$pdf->Cell(3.625,.2," Electrical storeroom assessments...what happens next?",'R',1,'L',1,"http://www.eecoonline.com/electrical-storeroom-assessments-what-happens-next/");
		$pdf->SetFont('','');
		$pdf->Cell(.125,.2,$pdf->Bullet(),'L',0,'L',1);
		$pdf->SetFont('','U');
		$pdf->Cell(3.625,.2," What's hiding in your electrical storeroom?",'R',1,'L',1,"http://www.eecoonline.com/whats-hiding-in-your-electrical-storeroom/");
		$pdf->SetFont('','');
		$pdf->Cell(.125,.2,$pdf->Bullet(),'L',0,'L',1);
		$pdf->SetFont('','U');
		$pdf->Cell(3.625,.2," Helpful advice for managing your electrical storeroom.",'R',1,'L',1,"http://www.eecoonline.com/helpful-advice-for-managing-your-electrical-storeroom/");
		$pdf->SetFont('','');
		$pdf->Cell(.125,.2,$pdf->Bullet(),'L',0,'L',1);
		$pdf->SetFont('','U');
		$pdf->Cell(3.625,.2," Critical spares: is your electrical storeroom ready to serve?",'R',1,'L',1,"http://www.eecoonline.com/critical-spares-is-your-electrical-storeroom-ready-to-serve/");
		$pdf->SetFont('','');
		$pdf->Cell(3.75,.2,'','RL',1,'L',1);
		$pdf->Cell(3.75,.2,"Download the whitepaper:",'RL',1,'L',1);
		$pdf->Cell(.25,.2,'','L',0,'L',1);
		$pdf->SetFont('','U');
		$pdf->Cell(3.5,.2,"5 Steps to Efficient electrical Storerooms",'R',1,'L',1,"http://www.eecoonline.com/electrical-supplies/electrical-storeroom-management/");
		$pdf->SetFont('','');
		$pdf->Cell(3.75,.2,'','RL',1,'L',1);
		$pdf->Cell(3.75,.2,"\nContact EECO for a free storeroom assessment:",'RL',1,'L',1);
		$pdf->SetFont('','U');
		$pdf->Cell(.25,.2,'','L',0,'L',1);
		$pdf->Cell(3.5,.2,"Storeroom optimization for storeroom managers",'R',1,'L',1,"http://www.eecoonline.com/storeroom-optimization/");
		$pdf->Cell(.25,.2,'','BL',0,'L',1);
		$pdf->Cell(3.5,.2,"Storeroom assessment for purchasing managers",'BR',1,'L',1,"http://www.eecoonline.com/storeroom-assessment/");
		$pdf->SetFont('','');
		$pdf->SetLeftMargin(.75);
		$pdf->SetDrawColor(0,0,0);
		$pdf->SetLineWidth('');
	
	// CREATE PAGE 4 (Self-Evaluation Detail)
		$page_info = array(
			'title' => 'Self-Evaluation Detail',
			'page' => 4
		);
		$pdf->AddPage();
		// Add Page Title
		$pdf->SetFontSize(14);
		$pdf->SetTextColor(0,84,159);	// Dark Blue
		$text = strtoupper($page_info['title']);
		//$pdf->SetXY(.75,1.125); 
		$pdf->Cell(7,.25,$text,0,1);
		$pdf->SetFontSize(9);
		$pdf->SetTextColor(0,0,0);

		
		// Exclude from Summary Detail
		$exclude_label = array(
			'Contact Information',
			'Email',
			'Phone',
			'Name',
			'Company Name',
			'Program Summary'
		);
		
		$exclude_id = array(
			27,34,29,30,31,32 // All Program Summary Fields
		);
		
		// Section Break AFTER
		$section_break = array('Critical Support and Operational Readiness');
		
		foreach($form['fields'] as $field)
		{
			if($field['type'] != 'hidden')
			{
				if($field['inputs'])
				{
					//Advanced Field
					
				} else {
					// Normal Field
	
					if(!in_array($field['label'], $exclude_label) && !in_array($field['id'], $exclude_id))
					{
						switch($field['type'])
						{
							// Section
							case 'section':
								// Add Section Break
								if(in_array($field['label'], $section_break)) { $pdf->AddPage(); }
								else { $pdf->Ln(); }
								$pdf->SetFillColor(0,84,159);	// Dark Blue
								$pdf->SetDrawColor(0,0,0);
								$pdf->SetTextColor(250,250,250);
								$pdf->SetFont('', 'B');
								$text = strtoupper($field['label']);
								$pdf->Cell(7,.2,$text,1,1,'',1);
								$pdf->SetFont('','');
								$pdf->SetTextColor(0,0,0);
								// Add Section Break
								
								break;
								
							// Normal Row
							default:
								if($pdf->GetX() > 9) { $pdf->AddPage(); }
								$response = $pdf->EvalResponse($field['id'], $entry[$field['id']]);
								switch($response['status'])
								{
									case 'Caution': 
										$rgb['r'] = 200; $rgb['g'] = 155; $rgb['b'] = 0;
										$fill_rgb = array('r'=>245, 'g'=>235, 'b'=>200);
										break;
									case 'Warning':
										$rgb['r'] = 220; $rgb['g'] = 0; $rgb['b'] = 0;
										$fill_rgb = array('r'=>255, 'g'=>175, 'b'=>175);
										break;
									case 'OK':
										$rgb = array('r'=>0, 'g'=>150, 'b'=>30);
										$fill_rgb = array('r'=>200, 'g'=>245, 'b'=>200);
										break;
									default:
										$rgb['r'] = 0; $rgb['g'] = 0; $rgb['b'] = 0;
										break;
								}
								$answer_border = ($response['message'] ? 'RL' : 'BRL');
								$tab_space = "          ";
								
								$pdf->MultiCell(7,.2,$field['label'],'TRL',1);
								$pdf->SetTextColor($rgb['r'], $rgb['g'], $rgb['b']);
								$pdf->MultiCell(7,.2,$tab_space.$entry[$field['id']],$answer_border,1);
								$pdf->SetTextColor(0,0,0);
								$pdf->SetFillColor($fill_rgb['r'], $fill_rgb['g'], $fill_rgb['b']);
								if($response['message'])
								{
									$pdf->SetFillColor($fill_rgb['r'], $fill_rgb['g'], $fill_rgb['b']);
									$pdf->MultiCell(7,.2,$response['message'],'BRL',1,'L',1);
								}
								break;
						}
					}
				}
			}
		}
	
	// CREATE BACK COVER
		$pdf->AddPage();
		$pdf->LastPage = true;
		$pdf->SetFillColor(0,84,159);	// DARK BLUE
		$pdf->SetDrawColor(0,84,159);
		$pdf->Rect(0,0,8.5,2.25,DF);
		$pdf->Rect(0,8,8.5,.75,DF);
		$pdf->Rect(0,9.5,8.5,1.5,DF);
		
		// Add logo
		$pdf->Image('http://www.eecoonline.com/wp-content/uploads/2015/08/r-logo1-white.png',5.25,.75,2.375,0,'PNG'); 
		
		$pdf->SetY(8.3125);
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFont('','B',24);
		$pdf->Cell(0,0,'www.eecoonline.com | 800.993.3326',0,0,'C');
		$pdf->SetY(9.75);
		$pdf->SetFont('','',12);
		$copyright = iconv('UTF-8', 'windows-1252', '©');
		$pdf->Cell(0,0,$copyright.' 2015 Electrical Equipment Company, Inc. All rights reserved.',0,0,'C');
		

	// OUTPUT PDF
	$upload_dir = wp_upload_dir();
	$base_dir =  $upload_dir['basedir'].'/self-evaluation/';
	
	// Filename
	$company_name = preg_replace('/[^\w]/', '_', trim($entry['33']));
	$name = preg_replace('/[^\w]/', '_', trim($entry['1.3'].'_'.$entry['1.6']));
	$date = strftime('%Y%m%d', strtotime($entry['date_created']));
	$filename = $company_name.'-EECO_SELF_EVALUATION-'.$name.'-'.$date.'.pdf';
	
	$stream = 'F'; $filepath = $base_dir.$filename;		// SAVE TO FILE
	// $stream = 'I'; $filepath = $filename;			// SEND TO BROWSER
	
	$pdf->Output($filepath,$stream);
	//exit;
}

class SelfEvalPDF extends FPDF
{
	function Header()
	{
		if($this->PageNo() > 1 && !$this->LastPage)
		{
			// Add Header Stripe
			$this->SetFillColor(0,84,159); $this->SetDrawColor(0,84,159); $this->Rect(0,0,8.5,.25,DF);
			// Add Document Title
			$this->SetXY(4.25,.5);
			$this->Cell(3.5,0,'Electrical Storeroom Self-Evaluation',0,0,'R');
			$this->SetXY(.75,1.125);
		}
	}
	
	function Footer()
	{
		if($this->PageNo() > 1 && !$this->LastPage)
		{
			// Add Page Number
			$this->SetXY(.75,10.5);
			$this->Cell(.25,0,$this->PageNo(),0,0,'L');
			$this->Cell(0,0,"Electrical Equipment Company, Inc. ".$this->Bullet()." eecoonline.com ".$this->Bullet()." 800.993.3326",0,0,'R');
			// Add Footer Stripe
			$this->SetFillColor(249,194,50); $this->SetDrawColor(249,194,50); $this->Rect(0,10.75,8.5,.25,DF);
		}
	}
	// SPECIAL CHARS
	function Bullet() { return iconv('UTF-8', 'windows-1252', '•'); }
	
	
	////////////////////////////////////////////////////////////
	
	//		SELF EVALUATION RESPONSES
	
	////////////////////////////////////////////////////////////
	
	function EvalResponse($field_id, $answer)
	{
		switch($field_id)
		{
			//	ORGANIZATION
			case '8':
				switch($answer)
				{
					case '3-5 years':
						$response['status'] = 'Caution';
						$response['message'] = "Conduct a storeroom assessment. Storeroom organization should be reviewed every 3 years and can typically be improved within 2 weeks.";
						break;
						
					case 'More than 5 years':
						$response['status'] = 'Warning';
						$response['message'] = "After 5 years, storeroom efficiency erodes significantly if organization and waste are not properly assessed.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '9':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "A formal bin system is documented for sustainability and greatly improves efficiency.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '10':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Incomplete errors reduce access speed and generate errors. There are multiple data points to include on labels depending on your CMMS or inventory system.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '11':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Most storerooms serve high speed and often stressful environments. Higher efficiency can be acheived with low cost, simple systems that can be easilly implemented.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			//	STOREROOM MANAGEMENT AND INVENTORY CONTROL
			case '13':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Documented processes for modification of inventoried items, replentishment parameters, and processing returns provide means for supplier management and will increase efficiency.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '14':
				switch($answer)
				{
					case 'Not sure':
						$response['status'] = 'Caution';
						$response['message'] = "A defined expectation to evaluate and adjust replentishment parameters is a necessary control of suppliers and will help optimize levels.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '15':
				switch($answer)
				{
					case 'Not sure':
						$response['status'] = 'Caution';
						$response['message'] = "Usage, suggested product, upgrades, and cost savings opportunities should be identified and reported by suppliers as part of periodic performance review.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '17':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "A stock out is essentially a system failure, and the root cause should be investigated and used for improvement.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '16':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "A formal repair standard, with consistent documentation, provides a structure and means to evaluate repair quality, costs, and warranty matters.";
						break;
						
					case 'Not sure':
						$response['status'] = 'Warning';
						$response['message'] = "";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '18':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Many electronic devices, such as PLC I/O and VFDs, can be repaired, reducing cost and landfill waste.";
						break;
						
					case 'Not sure':
						$response['status'] = 'Warning';
						$response['message'] = "";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '19':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "The use of failure analysis provides more insight for corrective action which will increase reliability and overall equipment effectiveness.";
						break;
						
					case 'Not sure':
						$response['status'] = 'Warning';
						$response['message'] = "";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			//	Critical Support and Operational Readiness
			case '21':
				switch($answer)
				{
					case '3-5 years':
						$response['status'] = 'Caution';
						$response['message'] = "Systems change due to requirements of demand, upgrades, new installations, and other factors. Conduct a criticality assessment and to define support requirements of the storeroom, and periodically update the assessment.";
						break;
						
					case 'More than 5 years':
						$response['status'] = 'Warning';
						$response['message'] = "";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '22':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Conduct a Criticality Assessment of critical system components. Gaps in critical inventory will reduce your emergency response capability and almost always negatively impact overall equipment effectiveness.";
						break;
						
					case 'Not sure':
						$response['status'] = 'Warning';
						$response['message'] = "At five years or more there can be significant change, requiring a more extensive assessment such as an Installed Base Evalaution (IBE).";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '23':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Suppliers of critical components should have proof of capability required to support support you through emergencies.";
						break;
						
					case 'Not sure':
						$response['status'] = 'Warning';
						$response['message'] = "";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '24':
				switch($answer)
				{
					case '3-5 years':
						$response['status'] = 'Caution';
						$response['message'] = "Many domestic power and control system components are reaching end of life. Increasing compliance requirements for issues such as arc flash often require upgrades. Critical components should be evaluated for both lifecycle and compliance driven change. The storeroom is a very efficient point of inspection for multiyear migration planning.";
						break;
						
					case 'More than 5 years':
						$response['status'] = 'Warning';
						$response['message'] = "Components not evaluated in the last five years could result in much higher replacement cost or compliance/safety concerns.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
				
			case '25':
				switch($answer)
				{
					case 'No':
						$response['status'] = 'Caution';
						$response['message'] = "Motors should be routinely assessed to assure they are operable when placed in service. Testing and repair records should be immediately assessible to installation personnel.";
						break;
						
					case 'Not sure':
						$response['status'] = 'Warning';
						$response['message'] = "Components not evaluated in the last five years could result in much higher replacement cost or compliance/safety concerns.";
						break;
						
					default:
						$response['status'] = 'OK';
						$response['message'] = "";
				}
				break;
		}

		return $response;
	}
}
?>