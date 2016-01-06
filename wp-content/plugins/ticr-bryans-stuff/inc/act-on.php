<?
// ACT-ON support for specific forms
add_action('wp_enqueue_scripts', 'ticr_act_on_scripts');
function ticr_act_on_scripts()
{
	// Set page ids with form
	$act_on_pages = array(25,61,63,67);
	wp_enqueue_style( 'act-on-form-style-adaptive', 'http://info.eecoonline.com/acton/adaptiveForm.css');
	wp_enqueue_style( 'act-on-formNegCap-style', 'http://info.eecoonline.com/acton/formNegCap.css');
	wp_enqueue_style( 'act-on-form-style-eeco', plugins_url('act-on.css', __FILE__));
	wp_enqueue_script( 'act-on-form-script', 'http://info.eecoonline.com/acton/form/13223/0017/form.js');
	wp_enqueue_script( 'act-on-head-script', plugins_url('js/act-on-head-script.js', __FILE__));
}

add_shortcode('ticr-act-on', 'ticr_act_on_form');
function ticr_act_on_form($atts)
{
	if(!isset($atts['form'])) { $atts['form'] = NULL; }
	switch($atts['form'])
	{
		case '001a':
			// 001a - Motor Maintenance and Reliability Whitepaper
			break;
			
		case '001b':
			// 001b - 5 Things to Review in Your Storeroom Whitepaper
			$form = '
				<form id="form_001b" method="post" enctype="multipart/form-data" action="http://info.eecoonline.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8">
				<input type="hidden" name="ao_a" value="13223" >
				<input type="hidden" name="ao_f" value="001b" >
				<input type="hidden" name="ao_d" value="001b:d-0001" >
				<input type="hidden" name="ao_p" id="ao_p" value="0" >
				<input type="hidden" name="ao_jstzo" id="ao_jstzo" value="" >
				<input type="hidden" name="ao_cuid" value="" >
				<input type="hidden" name="ao_srcid" value="" >
				<input type="hidden" name="ao_bot" id="ao_bot" value="yes" >
				<input type="hidden" name="ao_camp" value="" >
				<link rel="stylesheet" type="text/css" href="http://info.eecoonline.com/acton/form/13223/001b/form.css">
				<div id="ao_alignment_container" class="aoFormContainer" align="center">
				<table class="ao_tbl_container" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formField">
				<div class="formSectionDescription">
				<p>
				<strong>
				Complete the form to download your copy of <br />
				 <em>
				\'5 Things to Review in Your Electrical Storeroom\'</em>
				.</strong>
				</p>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="sideBySideCell formFieldLabel" >
				<label for = "form_001b_fld_1_fn">
				First Name</label>
				</td>
				<td class="sideBySideCell formFieldLabel" style="padding-left: 5px">
				<label for = "form_001b_fld_1_ln">
				Last Name</label>
				</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="l6e formFieldText formFieldMediumLeft" id="form_001b_fld_1_fn" name="First Name" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="l6e formFieldText formFieldMediumRight" id="form_001b_fld_1_ln" name="Last Name" value="">
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td class="formFieldLabel sideBySideCell">
				<label for = "form_001b_fld_1_em">
				Email Address</label>
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<input type="Email" class="l6e formFieldText formFieldLarge" id="form_001b_fld_1_em" name="E-mail Address" value="">
				</td>
				</tr>
				</table>
				</div>
				<script type="text/javascript">
				if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_001b_fld_1_em\', \'EMAIL\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_001b_fld_2-Label">
				<label for = "form_001b_fld_2">
				Company Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldLarge" id="form_001b_fld_2" name="Company Name" >
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_001b_fld_2\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<!-- BUTTONS -->
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td style="padding-bottom: 10px" align="center" id="form_001b_ao_submit_button">
					<a id="form_001b_ao_submit_href" href="javascript: doSubmit(document.getElementById(\'form_001b\'))">
						<img src="http://info.eecoonline.com/cdnr/77/acton/attachment/13223/f-0005/1/-/-/-/-/image.png" border="0">
					</a>
				</td>
				</tr>
				<tr class="formNegCap">
				<td>
				<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
				</td>
				</tr>
				</table>
				</div>
				<img src="http://info.eecoonline.com/acton/form/13223/001b:d-0001/pgend.gif" width="1" height="1">
				</form>
			';
			break;
			//<input id="form_001b_ao_submit_input" type="button" name="Submit" value="Submit" onClick="doSubmit(document.getElementById(\'form_001b\'))">
			
		case '001c':
			// 001c - Request a Quote from EECO
			$form = '
				<form id="form_001c" method="post" enctype="multipart/form-data" action="http://info.eecoonline.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8" target="_self">
				<input type="hidden" name="ao_a" value="13223" >
				<input type="hidden" name="ao_f" value="001c" >
				<input type="hidden" name="ao_d" value="001c:d-0001" >
				<input type="hidden" name="ao_p" id="ao_p" value="0" >
				<input type="hidden" name="ao_jstzo" id="ao_jstzo" value="" >
				<input type="hidden" name="ao_cuid" value="" >
				<input type="hidden" name="ao_srcid" value="" >
				<input type="hidden" name="ao_bot" id="ao_bot" value="yes" >
				<input type="hidden" name="ao_camp" value="" >
				<link rel="stylesheet" type="text/css" href="http://info.eecoonline.com/acton/form/13223/001c/form.css">
				<div id="ao_alignment_container" class="aoFormContainer" align="center">
				<table class="ao_tbl_container" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formField">
				<div class="formSectionDescription">
				<p>
				<span style="color: #00549e; font-size: 12pt;">
				<strong>
				Fill out the form to request a quote.</strong>
				</span>
				</p>
				<p>
				<span style="font-size: 10pt;">
				* Indicates required field.</span>
				</p>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="sideBySideCell formFieldLabel" >
				<label for = "form_001c_fld_1_fn">
				First Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				<td class="sideBySideCell formFieldLabel" style="padding-left: 5px">
				<label for = "form_001c_fld_1_ln">
				Last Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="l6e formFieldText formFieldMediumLeft" id="form_001c_fld_1_fn" name="First Name" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="l6e formFieldText formFieldMediumRight" id="form_001c_fld_1_ln" name="Last Name" value="">
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td class="formFieldLabel sideBySideCell">
				<label for = "form_001c_fld_1_em">
				Email Address</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<input type="Email" class="l6e formFieldText formFieldLarge" id="form_001c_fld_1_em" name="E-mail Address" value="">
				</td>
				</tr>
				</table>
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_001c_fld_1_fn\'); addRequiredField (\'form_001c_fld_1_ln\'); addRequiredField (\'form_001c_fld_1_em\'); } if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_001c_fld_1_em\', \'EMAIL\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_001c_fld_2-Label">
				<label for = "form_001c_fld_2">
				Zip Code</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldMedium" id="form_001c_fld_2" name="Zip Code" onBlur="singleCheck (\'form_001c_fld_2\', \'NUMBER\', \'form_001c_fld_2-Label\')">
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_001c_fld_2\'); } </script>
				<script type="text/javascript">
				if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_001c_fld_2\', \'NUMBER\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_001c_fld_3-Label">
				<label for = "form_001c_fld_3">
				Manufacturer</label>
				</div>
				<input type="text" class="formFieldText formFieldLarge" id="form_001c_fld_3" name="Manufacturer" >
				</div>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_001c_fld_4-Label">
				<label for = "form_001c_fld_4">
				Part # / Item Description</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldLarge" id="form_001c_fld_4" name="Part # / Item Description" >
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_001c_fld_4\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div id="prev_form_001c_fld_5" style="display: none;">
				&nbsp;</div>
				<div class="formFieldLabel">
				Upload Photos or Files:</div>
				<input type="file" class="formFieldFile formFieldLarge" id="form_001c_fld_5" name="Upload Files:" onchange="$(\'prev_form_001c_fld_5\').style.display=\'none\';">
				<div class="fine-print">Acceptable file types: doc, docx, pdf, dwg, txt, gif, jpg, jpeg, png</div>
				</div>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel">
				Notes / Special Instructions</div>
				<textarea class="formTextArea formTextAreaLarge formTextAreaWidthLarge" id="form_001c_fld_6" name="Notes / Special Instructions">
				</textarea>
				</div>
				</div>
				</div>
				</td>
				</tr>
				<!-- BUTTONS -->
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td style="padding-bottom: 10px" align="center" id="form_001c_ao_submit_button">
				<a id="form_001c_ao_submit_href" href="javascript: doSubmit(document.getElementById(\'form_001c\'))">
				<img src="http://info.eecoonline.com/cdnr/77/acton/attachment/13223/f-0005/1/-/-/-/-/image.png" border="0">
				</a>
				</td>
				</tr>
				<tr class="formNegCap">
				<td>
				<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
				</td>
				</tr>
				</table>
				</div>
				<img src="http://info.eecoonline.com/acton/form/13223/001c:d-0001/pgend.gif" width="1" height="1">
				</form>
			';
			break;
			
		case '001e':
			// 001e - Low/Med Voltage Motor Service Center Selection and Eval Guide
			break;
			
		case '001f':
			// 001f - Low / Medium Motor Testing and Common Standards
			break;
			
		case '0018':
			// 0018 -  Storeroom Manager Assessment
			$form = '
				<form id="form_0018" method="post" enctype="multipart/form-data" action="http://info.eecoonline.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8">
				<input type="hidden" name="ao_a" value="13223" >
				<input type="hidden" name="ao_f" value="0018" >
				<input type="hidden" name="ao_d" value="0018:d-0001" >
				<input type="hidden" name="ao_p" id="ao_p" value="0" >
				<input type="hidden" name="ao_jstzo" id="ao_jstzo" value="" >
				<input type="hidden" name="ao_cuid" value="" >
				<input type="hidden" name="ao_srcid" value="" >
				<input type="hidden" name="ao_bot" id="ao_bot" value="yes" >
				<input type="hidden" name="ao_camp" value="" >
				<link rel="stylesheet" type="text/css" href="http://info.eecoonline.com/acton/form/13223/0018/form.css">
				<div id="ao_alignment_container" class="aoFormContainer" align="center">
				<table class="ao_tbl_container" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formField">
				<div class="formSectionDescription">
				<p>
				<strong>
				Get your free storeroom assessment and optimization plan</strong>
				</p>
				<p>
				Fill in the form below to have one of our storeroom specialists arrange your assessment at a time that\'s most convenient for you.</p>
				<p>
				</p>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="sideBySideCell formFieldLabel" >
				<label for = "form_0018_fld_1_fn">
				First Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				<td class="sideBySideCell formFieldLabel" style="padding-left: 5px">
				<label for = "form_0018_fld_1_ln">
				Last Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="l6e formFieldText formFieldMediumLeft" id="form_0018_fld_1_fn" name="First Name" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="l6e formFieldText formFieldMediumRight" id="form_0018_fld_1_ln" name="Last Name" value="">
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td class="formFieldLabel sideBySideCell">
				<label for = "form_0018_fld_1_em">
				Email Address</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<input type="Email" class="l6e formFieldText formFieldLarge" id="form_0018_fld_1_em" name="E-mail Address" value="">
				</td>
				</tr>
				</table>
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0018_fld_1_fn\'); addRequiredField (\'form_0018_fld_1_ln\'); addRequiredField (\'form_0018_fld_1_em\'); } if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0018_fld_1_em\', \'EMAIL\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_0018_fld_2-Label">
				<label for = "form_0018_fld_2">
				Company Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldLarge" id="form_0018_fld_2" name="Company Name" >
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0018_fld_2\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="formFieldLabel sideBySideCell" >
				Business Phone</td>
				<td class="formFieldLabel sideBySideCell" style="padding-left: 5px">
				Cell Phone</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="formFieldText formFieldMediumLeft" id="form_0018_fld_3_1" name="Business Phone" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="formFieldText formFieldMediumRight" id="form_0018_fld_3_2" name="Cell Phone" value="">
				</td>
				</tr>
				</table>
				</div>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_0018_fld_4-Label">
				<label for = "form_0018_fld_4">
				Zip Code</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldMedium" id="form_0018_fld_4" name="Zip Code" onBlur="singleCheck (\'form_0018_fld_4\', \'NUMBER\', \'form_0018_fld_4-Label\')">
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0018_fld_4\'); } </script>
				<script type="text/javascript">
				if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0018_fld_4\', \'NUMBER\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<!-- BUTTONS -->
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td style="padding-bottom: 10px" align="center" id="form_0018_ao_submit_button">
					<a id="form_0018_ao_submit_href" href="javascript: doSubmit(document.getElementById(\'form_0018\'))">
						<img src="http://info.eecoonline.com/cdnr/77/acton/attachment/13223/f-0005/1/-/-/-/-/image.png" border="0">
					</a>
				</td>
				</tr>
				<tr class="formNegCap">
				<td>
				<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
				</td>
				</tr>
				</table>
				</div>
				<img src="http://info.eecoonline.com/acton/form/13223/0018:d-0001/pgend.gif" width="1" height="1">
				</form>
			';
			//<input id="form_0018_ao_submit_input" type="button" name="Submit" value="Submit" onClick="doSubmit(document.getElementById(\'form_0018\'))">
		
			break;
			
		case '0019':
			// 0019 - Purchasing Storeroom Assessment
			$form = '
				<form id="form_0019" method="post" enctype="multipart/form-data" action="http://info.eecoonline.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8">
				<input type="hidden" name="ao_a" value="13223" >
				<input type="hidden" name="ao_f" value="0019" >
				<input type="hidden" name="ao_d" value="0019:d-0001" >
				<input type="hidden" name="ao_p" id="ao_p" value="0" >
				<input type="hidden" name="ao_jstzo" id="ao_jstzo" value="" >
				<input type="hidden" name="ao_cuid" value="" >
				<input type="hidden" name="ao_srcid" value="" >
				<input type="hidden" name="ao_bot" id="ao_bot" value="yes" >
				<input type="hidden" name="ao_camp" value="" >
				<link rel="stylesheet" type="text/css" href="http://info.eecoonline.com/acton/form/13223/0019/form.css">
				<div id="ao_alignment_container" class="aoFormContainer" align="center">
				<table class="ao_tbl_container" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formField">
				<div class="formSectionDescription">
				<p>
				<strong>
				Sign up for a free storeroom assessment and optimization plan<br />
				</strong>
				</p>
				<p>
				Fill in the form below to arrange with one of our storeroom specialists for an assessment at a time that is most convenient for you.</p>
				<p>
				</p>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="sideBySideCell formFieldLabel" >
				<label for = "form_0019_fld_1_fn">
				First Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				<td class="sideBySideCell formFieldLabel" style="padding-left: 5px">
				<label for = "form_0019_fld_1_ln">
				Last Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="l6e formFieldText formFieldMediumLeft" id="form_0019_fld_1_fn" name="First Name" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="l6e formFieldText formFieldMediumRight" id="form_0019_fld_1_ln" name="Last Name" value="">
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td class="formFieldLabel sideBySideCell">
				<label for = "form_0019_fld_1_em">
				Email Address</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<input type="Email" class="l6e formFieldText formFieldLarge" id="form_0019_fld_1_em" name="E-mail Address" value="">
				</td>
				</tr>
				</table>
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0019_fld_1_fn\'); addRequiredField (\'form_0019_fld_1_ln\'); addRequiredField (\'form_0019_fld_1_em\'); } if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0019_fld_1_em\', \'EMAIL\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_0019_fld_2-Label">
				<label for = "form_0019_fld_2">
				Company Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldLarge" id="form_0019_fld_2" name="Company Name" >
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0019_fld_2\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="formFieldLabel sideBySideCell" >
				Business Phone</td>
				<td class="formFieldLabel sideBySideCell" style="padding-left: 5px">
				Cell Phone</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="formFieldText formFieldMediumLeft" id="form_0019_fld_3_1" name="Business Phone" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="formFieldText formFieldMediumRight" id="form_0019_fld_3_2" name="Cell Phone" value="">
				</td>
				</tr>
				</table>
				</div>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formInputBlock">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel" id="form_0019_fld_4-Label">
				<label for = "form_0019_fld_4">
				Zip Code</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<input type="text" class="formFieldText formFieldMedium" id="form_0019_fld_4" name="Zip Code" onBlur="singleCheck (\'form_0019_fld_4\', \'NUMBER\', \'form_0019_fld_4-Label\')">
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0019_fld_4\'); } </script>
				<script type="text/javascript">
				if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0019_fld_4\', \'NUMBER\'); } </script>
				</div>
				</div>
				</td>
				</tr>
				<!-- BUTTONS -->
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td style="padding-bottom: 10px" align="center" id="form_0019_ao_submit_button">
					<a id="form_0019_ao_submit_href" href="javascript: doSubmit(document.getElementById(\'form_0019\'))">
						<img src="http://info.eecoonline.com/cdnr/77/acton/attachment/13223/f-0005/1/-/-/-/-/image.png" border="0">
					</a>
				</td>
				</tr>
				<tr class="formNegCap">
				<td>
				<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
				</td>
				</tr>
				</table>
				</div>
				<img src="http://info.eecoonline.com/acton/form/13223/0019:d-0001/pgend.gif" width="1" height="1">
				</form>
			';
			//<input id="form_0019_ao_submit_input" type="button" name="Submit" value="Submit" onClick="doSubmit(document.getElementById(form_0019))">
	
			break;
			
		case '0020':
			// FORM 0020 - Contact Area of Interest
			if($atts['title']) { $title = '<h3>'.$atts['title'].'</h3>'; }
			
			$form = '
				<form id="form_0020" method="post" enctype="multipart/form-data" action="http://info.eecoonline.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8" target="_blank">
				<input type="hidden" name="ao_a" value="13223" >
				<input type="hidden" name="ao_f" value="0020" >
				<input type="hidden" name="ao_d" value="0020:d-0001" >
				<input type="hidden" name="ao_p" id="ao_p" value="0" >
				<input type="hidden" name="ao_jstzo" id="ao_jstzo" value="" >
				<input type="hidden" name="ao_cuid" value="" >
				<input type="hidden" name="ao_srcid" value="" >
				<input type="hidden" name="ao_bot" id="ao_bot" value="yes" >
				<input type="hidden" name="ao_camp" value="" >
				<link rel="stylesheet" type="text/css" href="http://info.eecoonline.com/acton/form/13223/0020/form.css">
				<div id="ao_alignment_container" class="aoFormContainer" align="center">
				<table class="ao_tbl_container" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div class="formField">
				<div class="formSectionDescription">
				'.$title.'<h2><em>Have a question about EECO?</em></h2>
				<p>
				• Careers • Credit Inquiries • Media Inquiries • Website Questions • Contact President</p>
				<p>
				<span style="font-size: 10pt;">
				<span style="font-size: 9pt;">Fill in the form below and click on your area of interest.<br />
				Your inquiry will be sent to the proper person at EECO.<br />
				</span>
				</span>
				</p>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="sideBySideCell formFieldLabel" >
				<label for = "form_0020_fld_1_fn">
				First Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				<td class="sideBySideCell formFieldLabel" style="padding-left: 5px">
				<label for = "form_0020_fld_1_ln">
				Last Name</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="l6e formFieldText formFieldMediumLeft" id="form_0020_fld_1_fn" name="First Name" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="l6e formFieldText formFieldMediumRight" id="form_0020_fld_1_ln" name="Last Name" value="">
				</td>
				</tr>
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td class="formFieldLabel sideBySideCell">
				<label for = "form_0020_fld_1_em">
				Email Address</label>
				<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<input type="Email" class="l6e formFieldText formFieldLarge" id="form_0020_fld_1_em" name="E-mail Address" value="">
				</td>
				</tr>
				</table>
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0020_fld_1_fn\'); addRequiredField (\'form_0020_fld_1_ln\'); addRequiredField (\'form_0020_fld_1_em\'); } if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0020_fld_1_em\', \'EMAIL\'); } </script>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div align="left">
				<div class="formField">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td class="formFieldLabel sideBySideCell" >
				Work Phone</td>
				<td class="formFieldLabel sideBySideCell" style="padding-left: 5px">
				Cell Phone</td>
				</tr>
				<tr>
				<td class="sideBySideCell" >
				<input type="text" class="formFieldText formFieldMediumLeft" id="form_0020_fld_3_1" name="Business Phone" value="">
				</td>
				<td class="sideBySideCell" style="padding-left: 5px">
				<input type="text" class="formFieldText formFieldMediumRight" id="form_0020_fld_3_2" name="Cell Phone" value="">
				</td>
				</tr>
				</table>
				</div>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel">
				Message<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<textarea class="formTextArea formTextAreaSmall formTextAreaWidthLarge" id="form_0020_fld_2" name="Message">
				</textarea>
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0020_fld_2\'); } </script>
				</div>
				</td>
				</tr>
				<tr>
				<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
				<div align="left">
				<div class="formField">
				<div class="formFieldLabel">
				Select One<b style="color: #FF0000; cursor: default" title="Required Field">
				*</b>
				</div>
				<select size="1" id="form_0020_fld_4" name="Area of Interest" class="formFieldMedium">
				<option value="">
				</option>
				<option id="form_0020_fld_4-0" value="creditandcollections@eeco-net.com">
				Credit Inquiries</option>
				<option id="form_0020_fld_4-1" value="jack.lawson@eeco-net.com">
				Contact the President</option>
				<option id="form_0020_fld_4-2" value="lynn.durham@eeco-net.com">
				Careers at EECO</option>
				<option id="form_0020_fld_4-3" value="jack.lawson@eeco-net.com">
				Media Inquiries</option>
				<option id="form_0020_fld_4-4" value="allyson.murphy@eeco-net.com">
				Website Questions</option>
				</select>
				</div>
				<script type="text/javascript">
				if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0020_fld_4\'); } </script>
				</div>
				</td>
				</tr>
				<!-- BUTTONS -->
				<tr>
				<td>
				&nbsp;</td>
				</tr>
				<tr>
				<td style="padding-bottom: 10px" align="center" id="form_0020_ao_submit_button">
				<a id="form_0020_ao_submit_href" href="javascript: doSubmit(document.getElementById(\'form_0020\'))">
						<img src="http://info.eecoonline.com/cdnr/77/acton/attachment/13223/f-0005/1/-/-/-/-/image.png" border="0">
					</a>
				</td>
				</tr>
				<tr class="formNegCap">
				<td>
				<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
				</td>
				</tr>
				<tr class="formNegCap">
				<td>
				<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
				</td>
				</tr>
				</table>
				</div>
				<img src="http://info.eecoonline.com/acton/form/13223/0020:d-0001/pgend.gif" width="1" height="1">
				</form>
			';
			break;
			
		default:
			// FORM 0017 - Ask EECO
			$form = '
				<form id="form_0017" method="post" enctype="multipart/form-data" action="http://info.eecoonline.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8" target="_parent">
				<input type="hidden" name="ao_a" value="13223" >
				<input type="hidden" name="ao_f" value="0017" >
				<input type="hidden" name="ao_d" value="0017:d-0001" >
				<input type="hidden" name="ao_p" id="ao_p" value="0" >
				<input type="hidden" name="ao_jstzo" id="ao_jstzo" value="" >
				<input type="hidden" name="ao_cuid" value="" >
				<input type="hidden" name="ao_srcid" value="" >
				<input type="hidden" name="ao_bot" id="ao_bot" value="yes" >
				<input type="hidden" name="ao_camp" value="" >
				<input type="hidden" name="ao_refurl" value="'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'">
				<link rel="stylesheet" type="text/css" href="http://info.eecoonline.com/acton/form/13223/0017/form.css">
				<div id="ao_alignment_container" class="aoFormContainer" align="center">
				<table class="ao_tbl_container" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
						<div class="formField">
							<div class="formSectionDescription">
								<h3>Ask EECO</h3>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
						<div class="formInputBlock">
							<div align="left">
								<div class="formField">
									<table cellspacing="0" cellpadding="0">
										<tr>
											<td class="sideBySideCell formFieldLabel" >
												<label for = "form_0017_fld_1_fn">First Name</label><b style="color: #FF0000; cursor: default" title="Required Field">*</b>
											</td>
											<td class="sideBySideCell formFieldLabel" style="padding-left: 5px">
												<label for = "form_0017_fld_1_ln">Last Name</label><b style="color: #FF0000; cursor: default" title="Required Field">*</b>
											</td>
										</tr>
										<tr>
											<td class="sideBySideCell" >
												<input type="text" class="l6e formFieldText formFieldMediumLeft" id="form_0017_fld_1_fn" name="First Name" value="">
											</td>
											<td class="sideBySideCell" style="padding-left: 5px">
												<input type="text" class="l6e formFieldText formFieldMediumRight" id="form_0017_fld_1_ln" name="Last Name" value="">
											</td>
										</tr>
										<tr>
											<td class="formFieldLabel sideBySideCell">
												<label for = "form_0017_fld_1_em">Your Email</label><b style="color: #FF0000; cursor: default" title="Required Field">*</b>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="Email" class="l6e formFieldText formFieldLarge" id="form_0017_fld_1_em" name="Your Email" value="">
											</td>
										</tr>
									</table>
								</div>
								<script type="text/javascript">
									if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0017_fld_1_fn\'); addRequiredField (\'form_0017_fld_1_ln\'); addRequiredField (\'form_0017_fld_1_em\'); } if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0017_fld_1_em\', \'EMAIL\'); }
								</script>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
						<div class="formInputBlock">
							<div align="left">
								<div class="formField">
									<div class="formFieldLabel" id="form_0017_fld_2-Label">
										<label for = "form_0017_fld_2">Zip Code</label><b style="color: #FF0000; cursor: default" title="Required Field">*</b>
									</div>
									<input type="text" class="formFieldText formFieldLarge" id="form_0017_fld_2" name="Zip Code" onBlur="singleCheck (\'form_0017_fld_2\', \'NUMBER\', \'form_0017_fld_2-Label\')">
								</div>
								<script type="text/javascript">
									if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0017_fld_2\'); } </script>
								<script type="text/javascript">
									if (typeof(addFieldToValidate) != \'undefined\') { addFieldToValidate (\'form_0017_fld_2\', \'NUMBER\'); } </script>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
						<div class="formInputBlock">
							<div align="left">
								<div class="formField">
									<div class="formFieldLabel" id="form_0017_fld_3-Label">
										<label for = "form_0017_fld_3">Subject</label><b style="color: #FF0000; cursor: default" title="Required Field">*</b>
									</div>
									<input type="text" class="formFieldText formFieldLarge" id="form_0017_fld_3" name="Subject" >
								</div>
								<script type="text/javascript">
									if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0017_fld_3\'); } </script>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="ao_tbl_cell" style="padding-left: 10px; padding-right: 10px" align="center">
						<div class="formInputBlock">
							<div align="left">
								<div class="formField">
									<div class="formFieldLabel">
										Your Question<b style="color: #FF0000; cursor: default" title="Required Field">*</b>
									</div>
									<textarea class="formTextArea formTextAreaMedium formTextAreaWidthMedium" id="form_0017_fld_4" name="Your Question"></textarea>
								</div>
								<script type="text/javascript">
									if (typeof(addRequiredField) != \'undefined\') { addRequiredField (\'form_0017_fld_4\'); } </script>
							</div>
						</div>
					</td>
				</tr>
				<!-- BUTTONS -->
				<tr>
					<td style="padding-bottom: 10px" align="center" id="form_0017_ao_submit_button">
						<a id="form_0017_ao_submit_href" href="javascript: doSubmit(document.getElementById(\'form_0017\'))">
							<img src="http://info.eecoonline.com/cdnr/77/acton/attachment/13223/f-0005/1/-/-/-/-/image.png" border="0">
						</a>
					</td>
				</tr>
				<tr class="formNegCap">
					<td>
						<input type="text" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
					</td>
				</tr>
				</table>
				</div>
				<img src="http://info.eecoonline.com/acton/form/13223/0017:d-0001/pgend.gif" width="1" height="1">
				</form>
			';
			break;
	} // END SWITCH : FORM
	
	return $form;
}

//////////////////////////////////////////////////////

//		ACT-ON/GRAVITY FORMS SHORTCODES

//////////////////////////////////////////////////////

//
// Low/Med Voltage Motor Repair Shop Selection and Evaluation Guide
//
add_action('gform_after_submission_12', 'ticr_gf_12_submission', 10, 2);
function ticr_gf_12_submission($entry, $form)
{
	// GENERATE THIS IN THE ACT-ON CONTENT/FORM POST URLS PANEL
	$post_url = "http://info.eecoonline.com/acton/eform/13223/001e/d-ext-0001";
	
	$ao_gf1 = new ActonWordPressConnection;
	
	$ao_gf1->setPostItems("First Name", $entry['1.3']);
	$ao_gf1->setPostItems("Last Name", $entry['1.6']);
	$ao_gf1->setPostItems("Work Email", $entry['2']);
	$ao_gf1->setPostItems("Job Title / Function", $entry['3']);
	$ao_gf1->setPostItems("Company Name", $entry['4']);
	
	$ao_gf1->processConnection($post_url);
}

//
// Low/Med Voltage Motor Testing and Common Standards
//
add_action('gform_after_submission_13', 'ticr_gf_13_submission', 10, 2);
function ticr_gf_13_submission($entry, $form)
{
	// GENERATE THIS IN THE ACT-ON CONTENT/FORM POST URLS PANEL
	$post_url = "http://info.eecoonline.com/acton/eform/13223/001f/d-ext-0001";
	
	$ao_gf1 = new ActonWordPressConnection;
	
	$ao_gf1->setPostItems("First Name", $entry['1.3']);
	$ao_gf1->setPostItems("Last Name", $entry['1.6']);
	$ao_gf1->setPostItems("Work Email", $entry['2']);
	$ao_gf1->setPostItems("Job Title / Function", $entry['3']);
	$ao_gf1->setPostItems("Company Name", $entry['4']);
	
	$ao_gf1->processConnection($post_url);
}

//
// Motor Maintenance and Reliability White Paper
//
add_action('gform_after_submission_14', 'ticr_gf_14_submission', 10, 2);
function ticr_gf_14_submission($entry, $form)
{
	// GENERATE THIS IN THE ACT-ON CONTENT/FORM POST URLS PANEL
	$post_url = "http://info.eecoonline.com/acton/eform/13223/001a/d-ext-0001";
	
	$ao_gf1 = new ActonWordPressConnection;
	
	$ao_gf1->setPostItems("First Name", $entry['1.3']);
	$ao_gf1->setPostItems("Last Name", $entry['1.6']);
	$ao_gf1->setPostItems("Work Email", $entry['2']);
	$ao_gf1->setPostItems("Job Title / Function", $entry['3']);
	$ao_gf1->setPostItems("Company Name", $entry['4']);
	
	$ao_gf1->processConnection($post_url);
}


//
// Motor Maintenance and Reliability White Paper
//
add_action('gform_after_submission_17', 'ticr_gf_17_submission', 10, 2);
function ticr_gf_17_submission($entry, $form)
{
	// GENERATE THIS IN THE ACT-ON CONTENT/FORM POST URLS PANEL
	$post_url = "http://info.eecoonline.com/acton/eform/13223/0046/d-ext-0001";
	
	$ao_gf1 = new ActonWordPressConnection;
	
	$ao_gf1->setPostItems("First Name", $entry['1.3']);
	$ao_gf1->setPostItems("Last Name", $entry['1.6']);
	$ao_gf1->setPostItems("Subscribe to news -", $entry['2.1']);
	$ao_gf1->setPostItems("Subscribe to news -", $entry['2.2']);
	$ao_gf1->setPostItems("Subscribe to news -", $entry['2.3']);
	$ao_gf1->setPostItems("Subscribe to news -", $entry['2.4']);
	
	$ao_gf1->processConnection($post_url);
}


//////////////////////////////////////////////////////

//		ACT-ON/GRAVITY FORMS INTEGRATION CLASS

//////////////////////////////////////////////////////

/**
* Post form submission data to Act-On and convert visitors to known via cURL, allowing no direct touch
* between Act-On and your website vistitor's browser to be necessary
*/
class ActonWordPressConnection
{
	protected $_postItems = array();
	
	protected function getPostItems()
	{
		return $this->_postItems;
	}
	
	/**
	* for setting your form's POST items (key is your form input's name, value is the input value)
	* @param string $key first part of key=value for form field submission (name in name=John)
	* @param string $value latter part of key=value for form field submission (John in name=John)
	*/
	public function setPostItems($key, $value)
	{
		$this->_postItems[$key] = (string)$value;
	}
	
	protected function getDomain($address)
	{
		$pieces = parse_url($address);
		$domain = isset($pieces['host']) ? $pieces['host'] : '';
		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs))
			{ return $regs['domain']; }
	
		return false;
	}
	
	// get IP of website visitor to send to Act-On for location info
	
	protected function getUserIP()
	{
		// check proxy
		
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
		else { $ip = $_SERVER['REMOTE_ADDR']; }
		
		return $ip;
	}
	
	/**
	* process form data for submission to your Act-On external form URL
	* @param string $extPostUrl your external post (Proxy URL) for your Act-On "proxy" form
	*/
	public function processConnection($extPostUrl)
	{
		// get the account ID from $extPostURL
		
		$acctIdWithPath = preg_replace('/^(.*?)eform\//', '', $extPostUrl); // remove extPostUrl string parts up to 'eform/'
		$acctId = explode('/', (string)$acctIdWithPath, 2); // remove parts after the first /, which leaves the acct ID remaining
		$aoCookieName = 'wp' . $acctId[0];
		$aoCookieNameOI = 'ao_optin' . $acctId[0]; // if opt-in cookie is enabled
		if (isset($_COOKIE[$aoCookieName]))
		{
			$aoCookieToSend = new WP_Http_Cookie();
			$aoCookieToSend->name = $aoCookieName;
			$aoCookieToSend->value = $_COOKIE[$aoCookieName];
			$aoCookiesToSend[] = $aoCookieToSend;
			if (isset($_COOKIE[$aoCookieNameOI]))
			{
				$aoCookieToSendOI = new WP_Http_Cookie();
				$aoCookieToSendOI->name = $aoCookieNameOI;
				$aoCookieToSendOI->value = $_COOKIE[$aoCookieNameOI];
				$aoCookiesToSend[] = $aoCookieToSendOI;
			}
			
			$this->setPostItems('_ipaddr', $this->getUserIP()); // Act-On accepts manually defined IPs if using field name '_ipaddr'
			$fields = http_build_query($this->getPostItems()); // encode post items into query-string
			$request = wp_remote_get($extPostUrl . '?' . $fields, array( 'cookies' => $aoCookiesToSend ));
			$aoResponseCookie = explode(";", (string)$request["headers"]["set-cookie"]);
			foreach($aoResponseCookie as $key => & $value)
			{
				$splitAtEquals = explode('=', (string)$value);
				$newKey = $splitAtEquals[0]; // set array keys to named keys (wpXXXX, Version, Domain, Max-Age, Expires, Path)
				$aoResponseCookie[$newKey] = $value;
				$newValue = preg_replace('/^(.*?)=/', '', $value);
				$value = $newValue;
			}
			
			setrawcookie($aoCookieName, $aoResponseCookie[$aoCookieName], time() + 86400 * 365, "/", $this->getDomain($extPostUrl));
		}
	}
} // END ACT-ON/GRAVITY FORMS INTEGRATION CLASS


?>