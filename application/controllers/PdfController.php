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
       $pdf->SetTitle('Spisak unetih raÄ�unara');
       $pdf->SetSubject('IzveÅ¡taj');
       $pdf->SetKeywords('PDF, raÄ�unari, spisak');
       
       
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
       $naslov = 'SPISAK RAÄŒUNARA';
       $pdf->Write(0, $naslov, '', 0, 'C', true, 0, false, false, 0);
       
       $razmak = "<br />";
       $pdf->writeHTML($razmak, true, false, false, false, '');
       
       $pdf->SetFont('dejavusans', '', 9, '', true);
      
       $sub_tbl_start =
       '<table border="1" cellspacing="0" cellpadding="1" >
		    <tr>
		        <td bgcolor="#cccccc" width="8%" align="center">R.br.</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Naziv</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Tip raÄ�unara</td>
		        <td bgcolor="#cccccc" width="15%" style="text-align: left; vertical-align: middle;">Operativni sistem</td>
		        <td bgcolor="#cccccc" width="15%" align="center">MatiÄ�na ploÄ�a</td>
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
    
    public function spisakKorisnickaAction() {
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender ();
        
        $myMapper = new Application_Model_Mymapper_KorisnickaPodrska();
        $korisnickaPodrska = $myMapper->korisnickaPodrskaSelectKorisnike();
        
        require_once 'tcpdf/tcpdf.php';
        
        $pdf = new tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SpecNazTeam 9815');
        $pdf->SetTitle('Spisak radnika korisniÄ�ke podrÅ¡ke');
        $pdf->SetSubject('IzveÅ¡taj');
        $pdf->SetKeywords('PDF, radnici, spisak');
        
        
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
        $naslov = 'SPISAK RADNIKA KORISNIÄŒKE PODRÅ KE';
        $pdf->Write(0, $naslov, '', 0, 'C', true, 0, false, false, 0);
        
        $razmak = "<br />";
        $pdf->writeHTML($razmak, true, false, false, false, '');
        
        $pdf->SetFont('dejavusans', '', 9, '', true);
        
        $sub_tbl_start =
        '<table border="1" cellspacing="0" cellpadding="1" >
		    <tr>
		        <td bgcolor="#cccccc" width="8%" align="center">R.br.</td>
		        <td bgcolor="#cccccc" width="15%" align="center">KorisniÄ�ko ime</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Ime</td>
		        <td bgcolor="#cccccc" width="15%" style="text-align: left; vertical-align: middle;">Prezime</td>
		        <td bgcolor="#cccccc" width="22%" align="center">e-mail</td>
		        <td bgcolor="#cccccc" width="15%" align="center">Telefon</td>
                <td bgcolor="#cccccc" width="10%" align="center">Rola</td>
		    </tr>';
        $sub_tbl = '';
        foreach($korisnickaPodrska as $i => $row) {            
            $rolaMymapper = new  Application_Model_Mymapper_Rola();
            $rola = $rolaMymapper->rolaSelectByID($row['id_rola']);     
            $i = $i+1 .'.';
            $sub_tbl .=
            '<tr>
		        <td  align="center">'.$i.'</td>
		        <td  align="center">'.$row['username'].'</td>
		        <td  align="center">'.$row['ime'].'</td>
		        <td  align="left">'.$row['prezime'].'</td>
		        <td  align="center">'.$row['email'].'</td>
		        <td  align="center">'.$row['tel'].'</td>
                <td  align="center">'.$rola.'</td>
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
        $pdf->Output('spisak_korisnicka.pdf', 'D');
        
        
    }
    
    
    public function spisakRadniNalogAction() {
        
        $request = $this->getRequest();
        $myMapper = new Application_Model_Mymapper_RadniNalog();        
        $filteriJednako = array();
        $filteriManjeOd = array();
        $filteriVeceOd = array();
        $filteriLike = array();  
        
        $username = $request->getParam('username');
        $kvar = $request->getParam('kvar');
        $racunar = $request->getParam('racunar');
        $odDatuma = $request->getParam('odDatuma');
        $doDatuma = $request->getParam('doDatuma');
        $status = $request->getParam('status');
        $opis = $request->getParam('opis');
        
        if($username != null && $username!= "" && (int)$username != 0){
            $filteriJednako["id_korisnicka"] = $username;
        }
        if($kvar != null && $kvar!= "" && (int)$kvar != 0){
            $filteriJednako["id_kvar"] = $kvar;
        }
        if($racunar != null && $racunar!= "" && (int)$racunar != 0){
            $filteriJednako["id_racunar"] = $racunar;
        }
        if($odDatuma != null && $odDatuma!= ""){
            $filteriVeceOd["vreme_kreiranja"] = $odDatuma;
        }
        if($doDatuma != null && $doDatuma!= ""){
            $filteriManjeOd["vreme_kreiranja"] = $doDatuma;
        }
        if($status != null && $status!= "" && (int)$status != 0){
            $filteriJednako["id_status"] = $status;
        }
        if($opis != null && $opis!= ""){
            $filteriLike["opis_kvara"] = $opis;
        }
        
        $radniNalozi = $myMapper->radniNaloziSelect($filteriJednako,$filteriManjeOd,$filteriVeceOd,$filteriLike,-1);
        
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender ();
        
        require_once 'tcpdf/tcpdf.php';
        
        $pdf = new tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('SpecNazTeam 9815');
        $pdf->SetTitle('Spisak radnih naloga');
        $pdf->SetSubject('IzveÅ¡taj');
        $pdf->SetKeywords('PDF, radni nalozi, spisak');
        
        
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
        $naslov = 'SPISAK RADNIH NALOGA';
        $pdf->Write(0, $naslov, '', 0, 'C', true, 0, false, false, 0);
        
        $razmak = "<br />";
        $pdf->writeHTML($razmak, true, false, false, false, '');
        
        $pdf->SetFont('dejavusans', '', 9, '', true);
        
   
        $sub_tbl_start =
        '<table border="1" cellspacing="0" cellpadding="1" >
		    <tr>
		        <td bgcolor="#cccccc"  align="center">R.br.</td>
		        <td bgcolor="#cccccc"  align="center">Radnik</td>
		        <td bgcolor="#cccccc"  align="center">RaÄ�unar</td>
		        <td bgcolor="#cccccc"  style="text-align: left; vertical-align: middle;">Kvar</td>
		        <td bgcolor="#cccccc"  align="center">Datum kreiranja</td>
		        <td bgcolor="#cccccc"  align="center">Status</td>
                <td bgcolor="#cccccc"  align="center">Opis kvara</td>
                <td bgcolor="#cccccc"  align="center">Datum zavrÅ¡etka</td>
		    </tr>';
        $sub_tbl = '';           
        
        
       
        foreach($radniNalozi as $i => $row) {
                        
            $i = $i+1 .'.';
            $sub_tbl .=
            '<tr>
		        <td  align="center">'.$i.'</td>
		        <td  align="center">'.$row['username'].'</td>
		        <td  align="center">'.$row['naziv'].'</td>
		        <td  align="center">'.$row['kvar'].'</td>
		        <td  align="center">'.$row['vreme_kreiranja'].'</td>
		        <td  align="center">'.$row['status'].'</td>
		        <td  align="center">'.$row['opis_kvara'].'</td>
		        <td  align="center">'.$row['vreme_zavrsetka'].'</td>
		       
		        
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
        
       
        $pdf->writeHTML($table, true, false, false, false, '');
        $pdf->Output('spisak_radnih_naloga.pdf', 'D');
        
        
    }

}



