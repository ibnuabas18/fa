<?php

		//doc_no, doc_date, nm_supplier,inv_no, inv_date,due_date,descs, trx_amt, 
		//(trx_amt*10)/100 as PPN, (trx_amt*10)/100 as PPH23
		
			require('fpdf/classreport.php');
			extract(PopulateForm());
			$pdf=new PDF('L','mm','A4');
			
			
						$data = $this->db->query("sp_PaymentAP '".$vendor."','".$checkbox."','".inggris_date($startdate)."','".inggris_date($enddate)."'")
							 ->result();
			
			$pdf->SetMargins(2,10,2);
			$pdf->AliasNbPages();	
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',12);
			$pdf->setFillColor(222,222,222);
			
			#HEAD
			#HEADER CONTENT
				$pt			= "PT. Graha Multi Insani";
				$judul 		= "List Payment AP Vendor";
				$periode	= "Periode";
	
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#TANGGAL CETAK
				$pdf->SetFont('Arial','',6);
				$pdf->SetXY(258,10);
				$pdf->Cell(10,4,'Print Date',0,0,'L',0);	
							
				$pdf->SetXY(268,10);
				$pdf->Cell(2,4,':',4,0,'L');
								
				$pdf->SetXY(269,10);
				$pdf->Cell(10,4,$tgl,0,0,'L');
			
			#Header
				$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
				$pdf->SetFont('Arial','B',18);
	
				$pdf->SetX(25);
				$pdf->Cell(0,10,$pt,20,0,'L');
			
				$pdf->SetFont('Arial','B',12);
				
				$pdf->SetXY(25,16);
				$pdf->Cell(0,10,$judul,20,0,'L');
				$pdf->SetFont('Arial','B',11);
				$pdf->SetXY(25,22);
				$pdf->Cell(0,10,$periode.' : '.$startdate. '  To  '.$enddate,20,0,'L');
		
				$pdf->Ln(10);
				
				$pdf->Cell(0,0,'',1,0,'L');
			
			// Start Isi Tabel
			
			
			$pdf->SetX(6);
			$pdf->SetFont('Arial','B',8);
			$pdf->Ln(4);
			
			$pdf->Cell(8,10,'No',1,0,'C',1);
			$pdf->Cell(50,5,'Payment',1,0,'C',1);
			//$pdf->Cell(15,10,'Unit',1,0,'C',1);
			$pdf->Cell(45,10,'Vendor',1,0,'C',1);
			$pdf->Cell(50,5,'Invoice',1,0,'C',1);
			$pdf->Cell(65,10,'Description',1,0,'C',1);
			$pdf->Cell(25,5,'Amount',1,0,'C',1);
			$pdf->Cell(25,10,'Bank',1,0,'C',1);
			$pdf->Cell(25,10,'Type',1,0,'C',1);
			
			
			$pdf->Ln(5);
			
			$pdf->Cell(8,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'No.',1,0,'C',1);
			$pdf->Cell(25,5,'Date',1,0,'C',1);
			$pdf->Cell(45,5,'',10,0,'L',0);
			$pdf->Cell(25,5,'No.',1,0,'C',1);
			$pdf->Cell(25,5,'Date',1,0,'C',1);
			$pdf->Cell(65,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'(Incl PPN)',1,0,'C',1);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			
			
		
			$pdf->SetFont('Arial','',6);
			
			$i = 1;	
			$no = 1;
			$noo = 0;
			$max = 28;	
			$pdf->Ln(5);
			$tot = 0;
					
			
	//for($i = 1;$i <= 200; $i++){
foreach($data as $row){	
		$tot = $tot + $row->amount;
		if($noo == $max){ 
			$pdf->AddPage();
			//				
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#HEADER CONTENT
				$pt			= "PT. Graha Multi Insani";
				$judul 		= "List Payment AP Vendor";
				$periode	= "Periode";
				
			#CETAK TANGGAL
				$tgl  = date("d-m-Y");
			#TANGGAL CETAK
				$pdf->SetFont('Arial','',6);
				$pdf->SetXY(258,10);
				$pdf->Cell(10,4,'Print Date',0,0,'L',0);	
							
				$pdf->SetXY(268,10);
				$pdf->Cell(2,4,':',4,0,'L');
								
				$pdf->SetXY(269,10);
				$pdf->Cell(10,4,$tgl,0,0,'L');
			
			#$month1 = date( 'F', mktime(0, 0, 0, $periode1));		
			#$month2 = date( 'F', mktime(0, 0, 0, $periode2));		
					
			#Header
				#$pdf->Image(site_url().'assets/images/bakrie_gmi.JPG',4,8,20);	
				$pdf->SetFont('Arial','B',18);
	
				$pdf->SetX(25);
				$pdf->Cell(0,10,$pt,20,0,'L');
			
				$pdf->SetFont('Arial','B',12);
				
				$pdf->SetXY(25,16);
				$pdf->Cell(0,10,$judul,20,0,'L');
				$pdf->SetFont('Arial','B',11);
				$pdf->SetXY(25,22);
				$pdf->Cell(0,10,$periode.' : '.$startdate. '  To  '.$enddate,20,0,'L');
			
				$pdf->Ln(10);
				
				$pdf->Cell(0,0,'',1,0,'L');
			
			
			$pdf->SetX(2);
			$pdf->SetFont('Arial','B',8);
			$pdf->Ln(4);
			$pdf->Cell(8,10,'No',1,0,'C',1);
			$pdf->Cell(50,5,'Payment',1,0,'C',1);
			//$pdf->Cell(15,10,'Unit',1,0,'C',1);
			$pdf->Cell(45,10,'Vendor',1,0,'C',1);
			$pdf->Cell(50,5,'Invoice',1,0,'C',1);
			$pdf->Cell(65,10,'Description',1,0,'C',1);
			$pdf->Cell(25,10,'Amount',1,0,'C',1);
			$pdf->Cell(25,10,'Bank',1,0,'C',1);
			$pdf->Cell(25,10,'Type',1,0,'C',1);
			
			
			$pdf->Ln(5);
			
			$pdf->Cell(8,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'No.',1,0,'C',1);
			$pdf->Cell(25,5,'Date2',1,0,'C',1);
			$pdf->Cell(45,5,'',10,0,'L',0);
			$pdf->Cell(25,5,'No.',1,0,'C',1);
			$pdf->Cell(25,5,'Date2.',1,0,'C',1);
			$pdf->Cell(65,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'(Incl PPN)',1,0,'C',1);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$noo = 0;
			$pdf->Ln(5);
			
		}
	$a = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa4";
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(8,5,'',1,0,'C',0);
			$pdf->Cell(25,5,$row->voucher,1,0,'C',0);
			$pdf->Cell(25,5,$row->trans_date,1,0,'C',0);
			$pdf->Cell(45,5,$row->nm_supplier,1,0,'L',0);
			$pdf->Cell(25,5,$row->doc_no,1,0,'C',0);
			$pdf->Cell(25,5,$row->doc_date,1,0,'C',0);
			$pdf->Cell(65,5,$row->descs,1,0,'L',0);
			$pdf->Cell(25,5,number_format($row->amount),1,0,'R',0);
			$pdf->Cell(25,5,$row->bank_nm,1,0,'C',0);
			$pdf->Cell(25,5,$row->paidby,1,0,'C',0);
		
			$pdf->Ln(5);		
			$i++;
			$no++;
			$noo++;
		
	}
	
			$pdf->Cell(8,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(45,5,'',10,0,'L',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(65,5,'GRAND TOTAL',1,0,'C',1);
			$pdf->Cell(25,5,number_format($tot),1,0,'R',1);
			$pdf->Cell(25,5,'',10,0,'C',0);
			$pdf->Cell(25,5,'',10,0,'C',0);
			
			$pdf->SetFont('Arial','B',6);
	  	
			
			
		
			$pdf->Output("hasil.pdf","I");	;
	
