<?php
/**
 * Comments js file.
 *
 * Handles javascript stuff related  to comments function
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>
	$(document).ready(function()
	{		
		$(".hide").click(function () {
			$("#submitStatus").hide();
			return false;
		});
	});

	// Check All / Check None
	function CheckAll( id, name )
	{
		$("INPUT[@name='" + name + "'][type='checkbox']").attr('checked', $('#' + id).is(':checked'));
	}

	// Ajax Submission
	function commentAction ( action, confirmAction, comment_id )
	{
		var statusMessage;
		if( !isChecked( "comment" ) && comment_id=='' )
		{ 
			alert('Please select at least one comment.');
		} else {
			var answer = confirm('Are You Sure You Want To ' + confirmAction + "?")
			if (answer){
				// Set Submit Type
				$("#action").attr("value", action);
			
				if (comment_id != '') 
				{
					// Submit Form For Single Item
					$("#comment_single").attr("value", comment_id);
					$("#commentMain").submit();
				}
				else
				{
					// Set Hidden form item to 000 so that it doesn't return server side error for blank value
					$("#comment_single").attr("value", "000");
					// Submit Form For Multiple Items
					$("input[@name='comment_id[]'][@checked]").each(
						function() 
						{
							$("#commentMain").submit();
						}
					);
				}
		
			} else {
				return false;
			}
		}
	}

	//check if a checkbox has been ticked.
	function isChecked( id )
	{
		var checked = $("input[@id="+id+"]:checked").length
	
		if( checked == 0 )
		return false
	
		else 
		return true
	}