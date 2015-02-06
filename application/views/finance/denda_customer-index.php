<?php
$session_id = $this->UserLogin->isLogin();
$level = $session_id['level_id'];
$user = $session_id['username'];
$grid_data = str_replace('"numberFormat"','numberFormat',$grid_data);
$grid_data = str_replace('"cellColumn"','cellColumn',$grid_data);
?>
<script language="javascript" src="<?=base_url()?>assets/js/jquery.numeric.js"></script>
<script language="javascript" src="<?=base_url()?>assets/js/currency.js"></script>
<script language="javascript">
$(function(){
	var grid = generateGrid(<?=$grid_data?>,"<?=site_url($module_url)?>",400,120);
	<?php if($user=="adm.coll"){ ?>
	grid.navButtonAdd('#pager',{
		   caption:"Input Penalty", 
		   buttonicon:"ui-icon-plus", 
		   onClickButton: function(){ 
			 popupForm("<?=site_url($module_url)?>" + '/add/?width='+750+'&height='+650);
		   }, 
		   position:"last"
		})
	.navButtonAdd('#pager',{
		   caption:"Search", 
		   buttonicon:"ui-icon-search", 
		   onClickButton: function(){ 
			 grid.jqGrid('searchGrid');
		   }, 
		   position:"last"
	})				
	<?php
		}elseif($user=="adm.fin"){
	?>
		grid.navButtonAdd('#pager',{
		   caption:"Payment", 
		   buttonicon:"ui-icon-pencil", 
		   onClickButton: function(){ 
			 var id = getSelectedID();
			 if(id){
				 popupForm("<?=site_url($module_url)?>" + '/update_form/' + id + '/?width='+750+'&height='+650);
			 }else{
				 alert('Pilih baris yang ingin dibayarkan');
			 }
		   }, 
		   position:"last"
		})
		
	.navButtonAdd('#pager',{
		   caption:"Search", 
		   buttonicon:"ui-icon-search", 
		   onClickButton: function(){ 
			 grid.jqGrid('searchGrid');
		   }, 
		   position:"last"
	})		
	<?php
	}else{
	?>
    grid.navButtonAdd('#pager',{
		   caption:"Search", 
		   buttonicon:"ui-icon-search", 
		   onClickButton: function(){ 
			 grid.jqGrid('searchGrid');
		   }, 
		   position:"last"
	})
	<?php } ?>
});

function cellColumn(cellVal,opts,element){
	if(element.flag_id == 1)
		var newVal = '<span class="customBg" style="background-color:#C1FFC1">'+cellVal+'</span>';
		else if(element.flag_id == 0)
		var newVal = '<span class="customBg" style="background-color:#FFD5D5">'+cellVal+'</span>';
	else var newVal = cellVal;
	return newVal;
}

function numberFormat(cellVal,opts,element){
	if(element.flag_id == 0)
		var newVal = '<span class="customBg" style="background-color:#FFD5D5">'+numToCurr(element.amount)+'</span>';
	else if(element.flag_id == 1)
		var newVal = '<span class="customBg" style="background-color:#C1FFC1">'+numToCurr(element.amount)+'</span>';
	return newVal;
}

</script>
<style>
.customBg{
	display:block;
	margin-height:-2px;
	margin-left:-2px;
	height: 14px;
	padding: 4px;
}
.customBg2{
	display:block;
	margin-height:-2px;
	margin-left:-2px;
	height: 14px;
	padding: 4px;
}
</style>
<div align="center">
	<table id="mytable" class="scroll"></table>
	<div id="pager"></div>
</div>


