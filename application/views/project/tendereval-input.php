<?=link_tag(CSS_PATH.'easyui.css')?>
<?=link_tag(CSS_PATH.'icon.css')?>
<?=link_tag(CSS_PATH.'demo.css')?>
<?#=script('jquery-1.7.2.min.js')?>
<?=script('jquery.easyui.min.js')?>
<?=script('datagrid-detailview.js')?>
<?=script('currency.js')?>	
<?=script('jquery.formx.js')?>


	<style type="text/css">
		form{
			margin:0;
			padding:0;
		}
		.dv-table td{
			border:0;
		}
		.dv-table input{
			border:1px solid #ccc;
		}
	</style>
	

	<script type="text/javascript">
		$(function(){			
			
			$(document).ready(function(){
				
				//alert('tes');
			
				$('#win1').hide();
				$('#win2').hide();
				
			});
			
			
			
			$('.calculate').bind('keyup keypress',function(){
				$(this).val(numToCurr($(this).val()));
			});

		
			//alert(TB_closeWindowButton());
			/*Contractor*/
			$('#dg').datagrid({
				view: detailview,
				detailFormatter:function(index,row){
					return '<div class="ddv"></div>';
				},
				onExpandRow: function(index,row){
					var ddv = $(this).datagrid('getRowDetail',index).find('div.ddv');
					var xref   = $('#mainjob_id').val();
					ddv.panel({
						border:false,
						cache:true,
						href:"<?=site_url('tendereval/show_form')?>/"+xref+"/?index="+index,
						onLoad:function(){
							$('#dg').datagrid('fixDetailRowHeight',index);
							$('#dg').datagrid('selectRow',index);
							$('#dg').datagrid('getRowDetail',index).find('form').form('load',row);
						}
					});
					$('#dg').datagrid('fixDetailRowHeight',index);
				}
			});

			



			$(document).ready(function(){
				$("#txt_refbudget").hide();
			});			
			
			$("#refbudget").change(function(){
				var id = $(this).val();
				$("#refbudget").hide();
				$.getJSON('<?=site_url()?>/tendereval/getdata/' + id,
				function(response){
					//$('#nmbudget').val(response.nmbudget);
					$('#ambudget').val(numToCurr(response.amount));
					$('#mainjob_id').val(response.mainjob_id);
					$('#txt_refbudget').val(response.no_trbgtproj);
					$('#jobnm').val(response.mainjob_desc);
					$('#vendor').val(response.vendor);
				});
				$("#txt_refbudget").show();
			});	
					
			
			
		});

		/*Contractor CRUD*/
		function saveItem(index){
			var row = $('#dg').datagrid('getRows')[index];
			var url = row.isNewRecord ? '<?=site_url('tendereval/save_dg')?>' : '<?=site_url('tendereval/save_dg')?>/'+row.id;
			
			
			
			
			
			
			
			$('#dg').datagrid('getRowDetail',index).find('form').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				
				
				
				
				
				success: function(data){
					data = eval('('+data+')');
					data.isNewRecord = false;
					$('#dg').datagrid('collapseRow',index);
					$('#dg').datagrid('updateRow',{
						index: index,
						row: data
					});
				}
			});
			
			
			
			//$('#win1').show();
			//$('#win2').show();
			
			$.getJSON('<?=site_url()?>tendereval/vendor',
						
			function(query){
				
				
				
				//$('#tendwin').append('<option></option>');
				for(var x=0;x<query.length;x++){
					// berikut adalah cara singkat untuk menambahkan element option pada tag <select>
						//$('#tendwin').append($('<option></option>').val(query[x].id).text(query[x].nama));
						$('#tendwin').append($('<option></option>').val(query[x].id_vendor).text(query[x].nm_supp_gb));
					}
				
				//$('#tendwin').append('<option></option>'); 
				//$('#tendwin').val(query.id_vendor);
			});
			
			
			
			
			
			
		}
		
		function cancelItem(index){
			var row = $('#dg').datagrid('getRows')[index];
			if (row.isNewRecord){
				$('#dg').datagrid('deleteRow',index);
			} else {
				$('#dg').datagrid('collapseRow',index);
			}
		}
		
		function destroyItem(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this Vendor?',function(r){
					if (r){
						var index = $('#dg').datagrid('getRowIndex',row);
						$.post('<?=site_url('tendereval/delete_dg')?>',{id:row.id},function(){
							$('#dg').datagrid('deleteRow',index);
						});
					}
				});
			}
		}
		function destroyItemMr(){
			var row = $('#bgt').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this BQ?',function(r){
					if (r){
						var index = $('#bgt').datagrid('getRowIndex',row);
						$.post('<?=site_url('tendereval/delete_dg')?>',{id:row.id},function(){
							$('#bgt').datagrid('deleteRow',index);
						});
					}
				});
			}
		}
		
		function newItem(){
			$('#dg').datagrid('appendRow',{isNewRecord:true});
			var index = $('#dg').datagrid('getRows').length - 1;
			$('#dg').datagrid('expandRow', index);
			$('#dg').datagrid('selectRow', index);
			$('#tendwin').empty();
		}
		/*End Contractor CRUD*/
		
		
		
	</script>


<?php
$attr = array('class' => 'block-content form', 'id' => 'formAdd');
echo form_open(site_url('tendereval/save'), $attr);
$tgl = date('m/d/Y');
?>


<table border="0" width="750px">
	<tr>
		<input  type="hidden" id="mainjob_id" name="mainjob_id"/>
		<input  type="hidden" id="" name=""/>
		<td>Date</td>
		<td colspan="3"><input type="text" name="tgl" value="<?=$tgl;?>" id="date" class="validate[required]" readonly="true" placeholder="" style="width:100px;background-color:#80FFFF"/></td>
	</tr>
	<tr>
		<td>Tender No.</td>
		<td colspan="3"><input type="text" name="no_ten" id="no_ten" style="width:220px;background-color:#80FFFF" value="<?=$no_tender?>" readonly="true"/></td>	
	</tr>
	<tr>
		<td>Budget.reff</td>
		<td colspan="3">
			<input type="text" name="txt_refbudget" id="txt_refbudget" style="width:200px;background-color:#80FFFF"  readonly="true"/>
			<select name="refbudget" id="refbudget" style="width:180px">
				<option value=""></option>
				<?php foreach($refbudget as $row): ?>
				<option value="<?=$row->mainjob_id?>"><?=$row->no_trbgtproj?></option>
				<?php endforeach ?>
			</select>		
		</td>
	</tr>
	<tr>	
		<td>Main job</td>
		<td colspan="3"><input type="text" name="jobnm" id="jobnm" style="width:200px;background-color:#80FFFF" readonly="true"/></td>	</tr>
	</tr>
	<tr>
		<td>Budget.Approved</td>	
		<td><input type="text" name="ambudget" id="ambudget" class="calculate input validate[required]" maxlength="20" readonly="true" style="width:150px;background-color:#80FFFF"/></td>	
		<td id="win1">Tender Winner</td>
		<td id="win2"colspan="3">
			<select name="tendwin" id="tendwin" style="width:120">
					
			</select>
		</td>
	</tr>
	
</table>


<div id="tt" class="easyui-tabs" style="width:900px;height:300px;">
	<!--Contractor -->
	<div title="Tender participant" style="padding:10px;">	
		<table id="dg" title="Tender Participant" style="width:800px;height:250px"
				url="<?=site_url('tendereval/get_participant')?>"
				toolbar="#toolbar" pagination="true"
				fitColumns="true" singleSelect="true">
			<thead>
				<tr>
					<th field="contractor" width="50">Contractor</th>
					<th field="offering" width="50" editor="numberbox">Offering Price</th>
					<th field="nego" width="50" editor="numberbox">Final Nego</th>
					<th field="score" width="50" editor="numberbox">Score</th>
					<th field="remark" width="50">Remark</th>
				</tr>
			</thead>
		</table>
		<div id="toolbar">
			<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newItem()">Add</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyItem()">Delete</a>
		</div>
	</div>
	
	
</div>	


<input type="submit" name="save" id="save" value="Save"/>
<input type="button" name="close" id="close" value="Close"/>
<?=form_close()?>
