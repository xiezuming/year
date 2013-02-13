<script type="text/javascript"
	src="<?php echo base_url('/js/jquery.dataTables.min.js')?>"></script>
<script
	type="text/javascript"
	src="<?php echo base_url('/js/FixedColumns.min.js')?>"></script>
<script
	type="text/javascript" src="<?php echo base_url('/js/jquery-ui.js')?>"></script>

<link
	rel="stylesheet" href="<?php echo base_url('/css/jquery-ui.css')?>">

<?php
$active_query_page = isset($adv_query_condition) && $adv_query_condition!=''?1:0;
?>

<script>
$(function() {
	$("#tabs").tabs({
		 active: <?php echo $active_query_page ?> });
});

function check_query_input()
{
	if ("1" == $('#tabs').tabs("option", "active"))
	{
		if ('' == $('select[name="adv_query_condition"]').val())
		{
			alert("The query condition can not be empty.");
			return false;
		}
	}
return true;
}
</script>

<?php echo form_open('order/', 'onsubmit="return check_query_input();"') ?>
<div
	style="width: 100%; margin-left: auto; margin-right: auto; border: solid 0px #bbb;">
	<div id="tabs" style="height: 100px">
		<ul>
			<li><a href="#tabs-1">Basic Query</a></li>
			<li><a href="#tabs-2">Advanced Query</a></li>
		</ul>
		<div id="tabs-1">
			<label> <?php
			echo 'Please enter ';
			$count = count($query_conditions_fields);
			$i = 0;
			/* @var $query_conditions_field Table_field */
			foreach ($query_conditions_fields as $query_conditions_field)
			{
				$i++;
				echo $query_conditions_field->get_label();
				if ($i == $count - 1)
				{
					echo ' or ';
				}
				else if ($i != $count)
				{
					echo ', ';
				}
			}
			echo ' below:';
			?>
			</label> <br /> <input type="text" name="basic_query_id" size="50"
				value="<?php echo $basic_query_id?>" /> &nbsp;<input type="submit"
				name="basic_query" value="Query" class="btn" />
		</div>
		<div id="tabs-2">
			<label> Please select the query condition: </label> <br />
			<?php echo form_dropdown('adv_query_condition', meta_code_array('adv_query_condition'), $adv_query_condition);?>
			&nbsp; <input type="submit" name="advanced_query" value="Query"
				class="btn" />
		</div>
	</div>
	<?php echo '</form>' ?>

	<table id="ordertable" class="datatable">
		<thead>
			<tr>
				<th>Operation</th>
				<?php 
				/* @var $summery_field Table_field */
				foreach ($summery_fields as $summery_field)
				{
					echo '<th>'.$summery_field->get_label() .'</th>';
				}
				?>
			</tr>
		</thead>
		<tbody>
			<?php 
			if(isset($orders))
			{
				foreach ($orders as $order)
				{
					echo '<tr><td><div class="jsddm"><li><label>Operation</label><ul>';
					/* @var $order_action Order_action */
					foreach ($order_actions as $order_action)
					{
						$action_url = '/order/'.$order_action->get_type().'/'.$order_action->get_name().'/'.$order['id'];
						echo '<li>'.anchor($action_url, $order_action->get_label().'<br/>').'</li>';
					}
					echo '</ul></li></div></td>';
					/* @var $summery_field Table_field */
					foreach ($summery_fields as $summery_field)
					{
						echo '<td>'.$order[$summery_field->get_name()].'</td>';
					}
					echo '</tr>';
				}
	} ?>
		</tbody>

	</table>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	var oTable = $('#ordertable').dataTable( {
		"sScrollY": "300",
		"sScrollX": "100%",
		//"bScrollCollapse": true,
		"sDom": 'lfr<"fixed_height"t>ip',
		//"aoColumns": [{"sWidth":"200"}],
		"bPaginate": false,
		"bLengthChange": false,
		"bFilter": false,
		"bSort": false,
		"bInfo": true
	} );
	new FixedColumns( oTable, {
		"sLeftWidth": 'relative',
		"iLeftWidth": 15
	} );
	
	$('.jsddm > li').bind('mouseover', jsddm_open)
	$('.jsddm > li').bind('mouseout',  jsddm_timer)
} );

document.onclick = jsddm_close;

var timeout    = 500;
var closetimer = 0;
var ddmenuitem = 0;

function jsddm_open()
{
	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').css('visibility', 'visible');
}

function jsddm_close()
{
	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');
}

function jsddm_timer()
{
	closetimer = window.setTimeout(jsddm_close, timeout);
}

function jsddm_canceltimer()
{
	if(closetimer) {
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}
</script>
