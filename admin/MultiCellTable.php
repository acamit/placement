<?php 
class PDF extends FPDF{
        function Header(){
            $this->image('../images/gndu.jpg' , 10 , 6 , 20 , 20);
             $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(60);
            // Title
            $this->Cell(80,10,'Placement Department',0,0,'C');
            $this->Ln(20);
        }
        function Footer(){
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        function FancyTableCompanies($header, $data)
        {
            // Colors, line width and bold font
            $this->SetFillColor(128,128,128);
            $this->SetTextColor(255);
            $this->SetDrawColor(96,96,96    );
            $this->SetLineWidth(.3);
            $this->SetFont('','');
            // Header
            $w = $this->widths;
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = false;
//             for($j=0;$j<100;$j++){
            $i=0;
            foreach($data[0] as $row)
            {
                $this->row(array(number_format($i+1) , $row['company_name'] ,number_format($row['Appeared']) ,number_format($data[1][$i])) , $fill);
                $fill = !$fill;
                $i++;
            }
  //      }
            // Closing line
            $this->Cell(array_sum($w),0,'','T');
        }

        function FancyTable($header, $data)
        {
            // Colors, line width and bold font
            $this->SetFillColor(96,96,96);
            $this->SetTextColor(255);
            $this->SetDrawColor(96,96,96    );
            $this->SetLineWidth(.3);
            $this->SetFont('','');
            
            foreach ($data as $key) {
                //$this->Cell(0 , 7 , $key->year);

                // Header
                $w = $this->widths;
                $this->Ln();
                $this->SetFillColor(96,96,96);
                $this->Cell(array_sum($w),7,$key->year , 1,1,'C' ,true);
                $this->SetFillColor(128,128,128);

                for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
                $this->Ln();

                // Color and font restoration
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                // Data
                $fill = false;
                $i=1;
                foreach($key->data as $row)
                {
                   
                    $this->row(array(number_format($i) , $row->about ,number_format($row->total) ,number_format($row->placed) , number_format($row->percent, 4) ) , $fill);
                    $fill = !$fill;
                    $i++;
                }
                
                // Closing line
                $this->Cell(array_sum($w),0,'','T');
                $this->Cell(0,7 , '' ,0 , 1 );



            }
        }
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data , $fill)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a, $fill);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}
?>