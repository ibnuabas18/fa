<?php
#die('Error 342, Check your browser immediately');
		
			require('fpdf/tanpapage.php');
					include_once( APPPATH."libraries/translate_currency.php"); 
			extract(PopulateForm());
			$pdf=new PDF('P','mm','A4');
						$voucher = $this->db->query("select voucher from db_glheader where gl_id = '$id'")->row()->voucher;
						$data = $this->db->query("sp_cetakjurnalvoucherall2 '".$id."'")
							 ->result();
							 
							 	$rows = $this->db->query("sp_cetakjurnalvoucherall '".$id."'")
							 ->row();
			//var_dump($data);
							 
			$pdf->SetMargins(2,10,2);
			$pdf->AliasNbPages();	
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',12);
			$pdf->setFillColor(222,222,222);
			#HEAD
			#HEADER CONTENT
			//$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
				
			#CETAK TANGGAL
				#$tgl  = date("d-m-Y");
			#TANGGAL CETAK
				
			#	$pdf->Cell(10,4,$tgl,0,0,'L');
			
				#Header
			#$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
			$pdf->SetX(25);
				
			// Start diatas tabel
			
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(110,5,'PT. BAKRIE SWASAKTI UTAMAxx',10,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(25,5,'Voucher No.',10,0,'L');
			$pdf->Cell(2,5,':',10,0,'L');
			$pdf->Cell(30,5.5,$rows->doc_no,10,0,'L');
			$pdf->Ln(3);
			
			$pdf->SetFont('Arial','',7);
			$pdf->SetX(25);
			$pdf->Cell(110,5,'Epiwalk 6th Floor',10,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(25,5,'Voucher Date',10,0,'L');
			$pdf->Cell(2,5,':',10,0,'L');
			$pdf->Cell(30,5.5,indo_date($rows->doc_date),10,0,'L');
			$pdf->Ln(3);
			$pdf->SetFont('Arial','',7);
			
			$pdf->SetX(25);
			$pdf->Cell(100,5,'Jl. HR. Rasuna Said - Kuningan',10,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(25,5,'',10,0,'L');
			$pdf->Cell(2,5,'',10,0,'L');
			$pdf->Cell(30,5,'',10,0,'L');
			$pdf->Ln(3);
			
			$pdf->SetX(25);
			$pdf->Cell(100,5,'Jakarta Selatan (12960)',10,0,'L');
			$pdf->SetFont('Arial','',7);
			
			$pdf->Ln(3);
			
			$pdf->SetX(25);
			$pdf->Cell(100,5,'Telp : (021) 830-5011 Fax : (021) 830-5012',10,0,'L');
			$pdf->SetFont('Arial','',7);
			
			$pdf->Ln(3);
			
			$pdf->SetX(25);
			$pdf->Cell(100,5,'NPWP : 021.672.152.2-011.00',10,0,'L');
			$pdf->SetFont('Arial','',7);
				
			
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',11);
			$pdf->SetX(25);
			$pdf->Cell(110,5,'JOURNAL VOUCHER',10,0,'L');
			//$pdf->SetFont('Arial','',6);
			// $pdf->Cell(25,5,'AP No.',10,0,'L');
			// $pdf->Cell(2,5,':',10,0,'L');
			// $pdf->SetFont('Arial','B',6);
			// $pdf->Cell(30,4,$rows->inv_no,1,0,'L');
			$pdf->Ln(5);
			
			$pdf->SetFont('Arial','',9);
			
			// $pdf->SetX(10);
			//$pdf->Cell(20,5,'DESCRIPTION',10,0,'L');
			//$pdf->Cell(4,5,':',10,0,'L');
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(59,4,'',1,0,'L');
			// $pdf->Cell(42,4,'',10,0,'L');
			// $pdf->Cell(25,5,'DESCRIPTION',10,0,'L');
			// $pdf->Cell(2,5,':',10,0,'L');
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(30,5,$rows->desc,1,0,'L');
			 // $pdf->Ln(5);
			
			$pdf->SetX(10);
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(20,5,'Paid to',10,0,'L');
			// $pdf->Cell(4,5,':',10,0,'L');
			// $pdf->SetFont('Arial','B',6);
			// $pdf->Cell(59,4,$rows->nm_supplier,1,0,'L');
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(42,4,'',10,0,'L');
			// $pdf->Cell(25,5,'AP Due Date',10,0,'L');
			// $pdf->Cell(2,5,':',10,0,'L');
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(30,4,$rows->doc_date,1,0,'L');
			// $pdf->Ln(5);
			
			// $pdf->SetX(10);
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(20,5,'Address',10,0,'L');
			// $pdf->Cell(4,5,':',10,0,'L');
			// $pdf->Cell(158,12,$rows->alamat,1,0,'L');
			// $pdf->Ln(13);
			
			// $pdf->SetX(10);
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(20,5,'AMOUNT',10,0,'L');
			// $pdf->Cell(4,5,':',10,0,'L');
			// $pdf->Cell(55,5,number_format($rows->trx_amt),1,0,'L');
			// $pdf->Ln(6);
			
			// $t = number_format($rows->trx_amt);
			
			// $pdf->SetX(10);
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(20,5,'TERBILANG',10,0,'L');
			// $pdf->Cell(4,5,':',10,0,'L');
			// $pdf->Cell(158,12,ucwords(toRupiah($rows->trx_amt)),1,0,'L');
			// $pdf->Ln(13);
			
			// $pdf->SetX(10);
			// $pdf->SetFont('Arial','',6);
			// $pdf->Cell(20,5,'REMARK',10,0,'L');
			// $pdf->Cell(4,5,':',10,0,'L');
			// $pdf->Cell(158,12,$rows->descs,1,0,'L');
				// $pdf->Ln(17);
			
			
			
			
			
			
			
			#start Tabel
			$pdf->SetX(10);
		
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(8,5,'No',1,0,'C',1);
			$pdf->Cell(26,5,'COA',1,0,'C',1);
			$pdf->Cell(78,5,'ACCOUNT NAME',1,0,'C',1);
			$pdf->Cell(35,5,'DEBET',1,0,'C',1);
			$pdf->Cell(35,5,'CREDIT',1,0,'C',1);
			$pdf->Ln(5);
			$no = 1;
			$totdb = 0;
            $totcr = 0;
			
			//for($i = 1;$i <= 27; $i++){
			foreach($data as $row){	
			 $totdb = $totdb + $row->debet; 
             $totcr = $totcr + $row->credit;
			
			
			$pdf->SetX(10);
			$pdf->Cell(8,5,$no,1,0,'C',0);
			$pdf->Cell(26,5,$row->acc_no1,1,0,'L',0);
			$pdf->Cell(78,5,$row->acc_name,1,0,'L',0);
			$pdf->Cell(35,5,number_format($row->debet),1,0,'R',0);
			$pdf->Cell(35,5,number_format($row->credit),1,0,'R',0);
			$pdf->Ln(5);	
			$no++;	
				
			}
			
				   $pdf->SetX(10);  
                    $pdf->Cell(8,5,'',10,0,'C',0);
        			$pdf->Cell(26,5,'',10,0,'L',0);
                    $pdf->SetFont('Arial','B',9);
        			$pdf->Cell(78,5,'Total',10,0,'R',0);
        			$pdf->Cell(35,5,number_format($totdb),1,0,'R',0);
        			$pdf->Cell(35,5,number_format($totcr),1,0,'R',0);
			
			$pdf->Ln(7);		
			$pdf->SetX(10); 
			$pdf->Cell(78,5,'Description',10,0,'L',0);
			
			$a = "SELECT voucher as doc_no, trans_date as doc_date, [desc] from db_glheader
					where gl_id= $id";
			$tuto = $this->db->query($a)->row();
			
			$pdf->Ln(7);
			$pdf->SetX(10); 
			$pdf->Cell(78,5,$tuto->desc,10,0,'L',0);
			
			$pdf->Ln(10);
			
			$pdf->SetX(15);
			$pdf->SetFont('Arial','',9);
		
			
			$pdf->SetX(10);
			$pdf->Cell(60.6,10,'Accounting',1,0,'C',0);
			$pdf->Cell(60.6,5,'Checked By',1,0,'C',0);
			$pdf->Cell(60.6,5,'Approved By',1,0,'C',0);
			
			$pdf->Ln(5);
			
			$pdf->SetX(10);
			$pdf->Cell(60.6,10,'',10,0,'C',0);
			$pdf->Cell(60.6,5,'Fin & Acct Dept Head',1,0,'C',0);
			$pdf->Cell(60.6,5,'Finance Controller',1,0,'C',0);
			/*
			$pdf->Cell(36.4,10,'',10,0,'C',0);
			$pdf->Cell(36.4,5,'FINANCE',1,0,'C',0);
			$pdf->Cell(36.4,5,'ACCOUNTING',1,0,'C',0);
			$pdf->Cell(36.4,10,'',10,0,'C',0);		
			$pdf->Cell(36.4,10,'',10,0,'C',0);
			*/
			$pdf->Ln(5);
			
			$pdf->SetX(10);
			$pdf->Cell(60.6,30,'',1,0,'C',0);
			$pdf->Cell(60.6,30,'',1,0,'C',0);
			$pdf->Cell(60.6,30,'',1,0,'C',0);
			
			$pdf->Ln(30);
			
			$pdf->SetX(10);
			$pdf->Cell(60.6,5,'Date. ',1,0,'L',0);
			$pdf->Cell(60.6,5,'Date. ',1,0,'L',0);
			$pdf->Cell(60.6,5,'Date. ',1,0,'L',0);
					
			$pdf->Ln(25);
		
	
	
	
				$pdf->SetFont('Arial','',6);
				$pdf->SetX(180);
				$pdf->Cell(10,4,'Print Date',0,0,'L',0);	
				$pdf->Cell(2,4,':',4,0,'L');
				$pdf->Cell(2,4,date("d-m-Y"),4,0,'L');
			$pdf->Output("hasil.pdf","I");

