<?php
/**
	HTMLOffice
	@author: Matteo Lucarno
	@version: 1.0
	@date: 12/10/2015

	This class can extract the first table from a given HTML code and export it to an office format (.xls or .doc)

*/
class HTMLOffice
{
	protected $html = '';
	
	/**
		__construct
		$buffer string the HTML code portion [optional]
		$filename string name of the output file [optional]
		$mode int choose how you want to export (0 => Excel, 1 => Word) [optional]
	*/
	public function __construct($buffer ='',$filename = '',$mode = 0){
		if(!empty($buffer)){
			switch($mode){
				case 0:
					$this->convertToExcel($buffer,$filename);
				break;
				case 1:
					$this->convertToWord($buffer,$filename);
				break;
			}
		}
	}

	/**
		setHTML
		$buffer string HTML code portion

		Set the global HTML for future work.
	*/
	public function setHTML($buffer = ''){
		if(empty($buffer))
			die ('The given HTML can\'t be empty');
		$this->html = $buffer;
	}
	
	/**
		appendHTML
		$buffer string HTML code portion
	
		Append the given code portion to the global HTML for future work. 
	*/
	public function appendHTML($buffer=''){
		if(empty($buffer))
			die ('The given HTML can\'t be empty');
		if(empty($this->html))
			$this->setHTML($buffer);
		else
			$this->html .= $buffer;
	}
	
	/**
		convertToExcel
		$buffer string HTML code portion
		$filename string name of the output file

		return output .xls file on success 
	*/
	public function convertToExcel($buffer='',$filename = ''){
		if(!empty($buffer))
			$this->setHTML($buffer);
		if(empty($this->html))
			die("No HTML code provided");
		if(empty($filename))
			$filename = 'HTMLEXCEL-'.date("d-m-Y-hh-ii").'.xls';
		$hasValidExtension = substr($filename, -3);
		if($hasValidExtension != '.xls')
			$filename .= '.xls';
		header('Content-type: application/excel');
		header('Content-Disposition: attachment; filename='.$filename);
		$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
		<head>
		    <xml>
		        <x:ExcelWorkbook>
		            <x:ExcelWorksheets>
		                <x:ExcelWorksheet>
		                    <x:Name>Sheet 1</x:Name>
		                    <x:WorksheetOptions>
		                        <x:Print>
		                            <x:ValidPrinterInfo/>
		                        </x:Print>
		                    </x:WorksheetOptions>
		                </x:ExcelWorksheet>
		            </x:ExcelWorksheets>
		        </x:ExcelWorkbook>
		    </xml>
		</head>
		
		<body>';
		if(substr($this->html, 0,7) != "<table" || substr($this->html, -8) != "</table>")
			$data .= $this->extractTable();
		else
			$data .= $this->html;
		$data .= '</body></html>';
		echo $data;
	}

	/**
		convertToWord
		$buffer string HTML code portion
		$filename string name of the output file

		return output .doc file on success 
	*/
	public function convertToWord($buffer='',$filename=''){
		if(!empty($buffer))
			$this->setHTML($buffer);
		if(empty($this->html))
			die("No HTML code provided");
		if(empty($filename))
			$filename = 'HTMLWORD-'.date("d-m-Y-hh-ii").'.doc';
		$hasValidExtension = substr($filename, -3);
		if($hasValidExtension != '.doc')
			$filename .= '.doc';
		header('Content-type: application/word');
		header('Content-Disposition: attachment; filename='.$filename);
		$data = '';
		if(substr($this->html, 0,7) != "<table" || substr($this->html, -8) != "</table>")
			$data .= $this->extractTable();
		else
			$data .= $this->html;
		$data .= '</body></html>';
		echo $data;
	}

	/**
		extractTable

		search and extract the first table in the given HTML code

		return string 
	*/
	protected function extractTable(){
		if(empty($this->html))
			die("No HTML code provided");
		$text = " ".$this->html;
        $ini = strpos($text,"<table");
        if ($ini == 0) 
        	die ("No table in given HTML");
        $ini += strlen($start);
        $len = strpos($text,"</table>",$ini) - $ini;
        return "<table>".substr($text,$ini,$len)."</table>";
	}
}
?>