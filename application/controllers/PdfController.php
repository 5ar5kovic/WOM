<?php

class PdfController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function spisakRacunaraAction() {
        
       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender ();
       
       $myMapper = new Application_Model_Mymapper_Racunar();
       $racunari = $myMapper->racunarSelect();
       
       require_once 'tcpdf/tcpdf.php';
       
       $pdf = new tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

       $pdf->SetCreator(PDF_CREATOR);
       $pdf->SetAuthor('SpecNazTeam 9815');
       $pdf->SetTitle('Spisak unetih računara');
       $pdf->SetSubject('Izveštaj');
       $pdf->SetKeywords('PDF, računari, spisak');
       
       
       $pdf->SetHeaderData('', 0, "Work Order Management", '');
       $pdf->setHeaderFont(Array('dejavusans', 'I', PDF_FONT_SIZE_MAIN));
       $pdf->setFooterFont(Array('dejavusans', 'I', PDF_FONT_SIZE_DATA));
       $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
       $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
       $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
       $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
       $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
       
       $pdf->AddPage();
       
       $pdf->SetFont('dejavusans', 'B', 16, '', true);
       $naslov = 'SPISAK RAČUNARA';
       $pdf->Write(0, $naslov, '', 0, 'C', true, 0, false, false, 0);
       
       $razmak = "<br />";
       $pdf->writeHTML($razmak, true, false, false, false, '');
       
       $pdf->SetFont('dejavusans', '', 9, '', true);
      
       $sub_tbl_start =
       '<table border="1" cellspacing="0" cellpadding="1" >
		    <tr>
		        <td bgcolor="#cccccc" width="8%" align="center">R.br.</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Naziv</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Tip računara</td>
		        <td bgcolor="#cccccc" width="15%" style="text-align: left; vertical-align: middle;">Operativni sistem</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Matična ploča</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Procesor</td>
                <td bgcolor="#cccccc" width="17%" align="center">Korisnik</td>
		    </tr>';
       $sub_tbl = '';
       foreach($racunari as $i => $row) {
           
           $tipRacunaraMymapper = new  Application_Model_Mymapper_TipRacunara();
           $tipRacunara = $tipRacunaraMymapper->tipRacunaraSelectByID($row['id_tip']);
           
           $operativniSistemMymapper = new Application_Model_Mymapper_OperativniSistem();
           $operativniSistem = $operativniSistemMymapper->operativniSistemSelectByID($row['id_os']);
           
           $maticnaPlocaMymapper = new Application_Model_Mymapper_MaticnaPloca();
           $maticnaPloca = $maticnaPlocaMymapper->maticnaPlocaSelectByID($row['id_mb']);
           
           $procesorMymapper = new Application_Model_Mymapper_Procesor();
           $procesor = $procesorMymapper->procesorSelectByID($row['id_cpu']);
           
           $korisnikMymapper = new Application_Model_Mymapper_Korisnik();
           $korisnik = $korisnikMymapper->korisnikSelectByID($row['id_korisnik']); 
           
           
           $i = $i+1 .'.';
           $sub_tbl .=
           '<tr>
		        <td width="8%" align="center">'.$i.'</td>
		        <td width="15%" align="center">'.$row['naziv'].'</td>
		        <td width="15%" align="center">'.$tipRacunara.'</td>
		        <td width="15%" align="left">'.$operativniSistem.'</td>
		        <td width="15%" align="center">'.$maticnaPloca.'</td>
		        <td width="15%" align="center">'.$procesor.'</td>
                <td width="17%" align="center">'.$korisnik.'</td>
		     </tr>';
       }
       
       $sub_tbl_end = '</table>';
       
       $table =
       '<table>
					<tr>
						<td style="width:3%"></td>
						<td style="width:94%"><table><tr><td>'.$sub_tbl_start.$sub_tbl.$sub_tbl_end.'</td></tr></table></td>
						<td style="width:3%"></td>
					</tr>
				</table>';
       
       
       //$table = "<h1>TEST</h1>";
       $pdf->writeHTML($table, true, false, false, false, '');
       $pdf->Output('spisak_racuara.pdf', 'D');
            
       
    }

}



