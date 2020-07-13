<?php
function getTemplateFileURI($str)
{
	if(file_exists(CURRENT_TEMPLATE_DIR . $str))
	{
		return CURRENT_TEMPLATE_DIR . $str;
	}
	return DEFAULT_TEMPLATE_DIR . $str;
}
?>